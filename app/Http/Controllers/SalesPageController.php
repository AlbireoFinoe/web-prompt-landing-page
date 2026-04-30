<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\SalesPage;

class SalesPageController extends Controller
{
    public function create()
    {
        return view('sales-pages.create');
    }

    public function generate(Request $request)
    {
        // 1. Validasi input (Tambah validasi theme)
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'theme' => 'required|in:blue,dark,orange', 
        ]);

$prompt = "You are a world-class marketing copywriter. Your task is to design highly persuasive sales page content.
        Product Data:
        Name: " . $request->product_name . "
        Description & Key Features: " . $request->product_description . "
        
        IMPORTANT: You MUST write all the generated content strictly in ENGLISH. Do not use Indonesian.
        
        Analyze the data above, then generate the output ONLY in pure JSON format with exactly this structure:
        {
            \"headline\": \"...\",
            \"sub_headline\": \"...\",
            \"pain_points\": [\"...\", \"...\", \"...\"],
            \"description\": \"...\",
            \"features\": [\"...\", \"...\", \"...\", \"...\"],
            \"testimonial\": {\"quote\": \"...\", \"name\": \"...\", \"role\": \"...\"},
            \"pricing\": {\"price\": \"...\", \"nb\": \"...\"},
            \"call_to_action\": \"...\"
        }";

        $response = Http::withToken(env('GROQ_API_KEY'))
            ->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.1-8b-instant',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful expert in copywriting. Output only raw valid JSON in English.'],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7
            ]);

        $aiText = $response->json('choices.0.message.content');
        if (!$aiText) dd('Gagal menghubungi Groq API', $response->json());

        preg_match('/\{[\s\S]*\}/', $aiText, $matches);
        $decodedData = json_decode($matches[0] ?? '', true);

        // 5. Simpan ke Database (Termasuk Simpan Theme)
        $salesPage = SalesPage::create([
            'user_id' => Auth::id(),
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'theme' => $request->theme, // Simpan pilihan tema
            'generated_content' => $decodedData,
        ]);

        return redirect()->route('sales.show', $salesPage->id);
    }

    public function show(SalesPage $salesPage)
    {
        return view('sales-pages.show', compact('salesPage'));
    }

    // METHOD BARU: Export ke HTML
    public function download(SalesPage $salesPage)
    {
        if ($salesPage->user_id !== Auth::id()) abort(403);

        // Render view khusus export menjadi string HTML
        $htmlContent = view('sales-pages.export', compact('salesPage'))->render();

        $filename = 'sales-page-' . str()->slug($salesPage->product_name) . '.html';

        return response()->streamDownload(function () use ($htmlContent) {
            echo $htmlContent;
        }, $filename);
    }

    public function index()
    {
        $pages = SalesPage::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('pages'));
    }

    public function destroy(SalesPage $salesPage)
    {
        if ($salesPage->user_id === Auth::id()) $salesPage->delete();
        return back();
    }
}