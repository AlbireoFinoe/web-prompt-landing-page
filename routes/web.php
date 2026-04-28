<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SalesPageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Di sinilah kita meletakkan route baru agar terlindungi sistem login (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Fitur Hapus Riwayat
    Route::delete('/sales-page/{salesPage}', [SalesPageController::class, 'destroy'])->name('sales.destroy');

    // Fitur Create, Generate, dan Show harus ada di dalam sini
    Route::get('/sales-page/create', [SalesPageController::class, 'create'])->name('sales.create');
    Route::post('/sales-page/generate', [SalesPageController::class, 'generate'])->name('sales.generate');
    Route::get('/sales-page/{salesPage}', [SalesPageController::class, 'show'])->name('sales.show');
});

Route::get('/sales-page/{salesPage}/download', [SalesPageController::class, 'download'])->name('sales.download');

require __DIR__.'/auth.php';