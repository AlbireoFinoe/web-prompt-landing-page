<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $salesPage->product_name }} - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans min-h-screen py-10">

    @php
        $content = $salesPage->generated_content;
        $theme = $salesPage->theme ?? 'blue';
        
        $themes = [
            'blue' => [
                'bg' => 'from-slate-900 to-slate-800',
                'accent' => 'bg-blue-600',
                'text_accent' => 'text-blue-600',
                'icon_bg' => 'bg-blue-100',
                'button' => 'bg-blue-600 hover:bg-blue-500 shadow-blue-500/50',
                'price_bg' => 'from-blue-600 to-indigo-700',
                'price_text' => 'text-blue-200',
                'price_btn_text' => 'text-blue-700'
            ],
            'dark' => [
                'bg' => 'from-black to-slate-900',
                'accent' => 'bg-slate-800',
                'text_accent' => 'text-slate-800',
                'icon_bg' => 'bg-slate-200',
                'button' => 'bg-slate-900 hover:bg-slate-800 shadow-slate-900/50',
                'price_bg' => 'from-slate-800 to-black',
                'price_text' => 'text-slate-300',
                'price_btn_text' => 'text-slate-900'
            ],
            'orange' => [
                'bg' => 'from-orange-900 to-orange-800',
                'accent' => 'bg-orange-600',
                'text_accent' => 'text-orange-600',
                'icon_bg' => 'bg-orange-100',
                'button' => 'bg-orange-600 hover:bg-orange-500 shadow-orange-500/50',
                'price_bg' => 'from-orange-600 to-red-700',
                'price_text' => 'text-orange-200',
                'price_btn_text' => 'text-orange-700'
            ]
        ];
        $active = $themes[$theme];
    @endphp

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
            @if($content)
                <div class="relative bg-gradient-to-br {{ $active['bg'] }} text-white py-28 px-8 overflow-hidden">
                    <div class="absolute top-0 left-10 w-72 h-72 {{ $active['accent'] }} rounded-full mix-blend-multiply filter blur-[100px] opacity-40"></div>
                    <div class="absolute bottom-0 right-10 w-72 h-72 bg-white rounded-full mix-blend-overlay filter blur-[120px] opacity-20"></div>

                    <div class="relative z-10 max-w-4xl mx-auto text-center">
                        <span class="inline-block py-1 px-3 rounded-full bg-white/10 text-white text-sm font-semibold tracking-wider mb-6 border border-white/20">
                            ✨ PENAWARAN EKSKLUSIF
                        </span>
                        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-8 leading-tight">
                            {{ $content['headline'] ?? 'Headline Utama' }}
                        </h1>
                        <p class="text-xl md:text-2xl text-slate-300 mb-10 font-light leading-relaxed">
                            {{ $content['sub_headline'] ?? 'Sub-headline pendukung.' }}
                        </p>
                        <button class="{{ $active['button'] }} text-white font-bold py-4 px-10 rounded-full transition transform hover:scale-105 text-lg">
                            {{ $content['call_to_action'] ?? 'Beli Sekarang' }}
                        </button>
                    </div>
                </div>

                @if(isset($content['pain_points']) && is_array($content['pain_points']))
                <div class="relative -mt-16 px-8 z-20">
                    <div class="max-w-4xl mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($content['pain_points'] as $pain)
                                <div class="bg-white/90 backdrop-blur-md p-6 rounded-2xl shadow-lg border border-slate-100">
                                    <div class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    </div>
                                    <p class="text-slate-600 font-medium leading-relaxed">"{{ $pain }}"</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="py-24 px-8 md:px-16 max-w-6xl mx-auto">
                    <div class="mb-20 text-center">
                        <h2 class="text-3xl font-bold text-slate-800 mb-6">Mengapa Ini Penting Untuk Anda?</h2>
                        <p class="text-lg md:text-xl text-slate-600 leading-relaxed max-w-3xl mx-auto">
                            {{ $content['description'] ?? 'Deskripsi produk' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 items-start">
                        <div class="lg:col-span-3">
                            <h3 class="text-2xl font-bold text-slate-800 mb-8 flex items-center">
                                <svg class="w-6 h-6 {{ $active['text_accent'] }} mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Fitur & Manfaat Utama
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @if(isset($content['features']) && is_array($content['features']))
                                    @foreach($content['features'] as $feature)
                                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                                            <div class="w-8 h-8 {{ $active['icon_bg'] }} rounded-lg flex items-center justify-center mb-4">
                                                <svg class="w-4 h-4 {{ $active['text_accent'] }}" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <p class="text-slate-700 font-medium">{{ $feature }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-8">
                            @if(isset($content['pricing']))
                            <div class="bg-gradient-to-br {{ $active['price_bg'] }} rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>
                                <h3 class="text-sm font-bold {{ $active['price_text'] }} uppercase tracking-widest mb-4">Investasi Anda</h3>
                                <div class="flex items-baseline gap-2 mb-2">
                                    <span class="text-5xl font-black tracking-tight">{{ $content['pricing']['price'] ?? '' }}</span>
                                </div>
                                <p class="{{ $active['price_text'] }} mb-8 font-medium">{{ $content['pricing']['nb'] ?? '' }}</p>
                                <button class="w-full bg-white {{ $active['price_btn_text'] }} font-bold py-4 px-6 rounded-xl shadow-lg">
                                    {{ $content['call_to_action'] ?? 'Ambil Penawaran' }}
                                </button>
                            </div>
                            @endif

                            @if(isset($content['testimonial']))
                            <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
                                <div class="flex text-yellow-400 mb-4">
                                    @for($i=0; $i<5; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                                <p class="text-slate-700 italic font-medium leading-relaxed mb-6">
                                    "{{ $content['testimonial']['quote'] ?? '' }}"
                                </p>
                                <div class="flex items-center pt-6 border-t border-slate-100">
                                    <div class="w-12 h-12 {{ $active['accent'] }} rounded-full mr-4 flex items-center justify-center text-white font-bold text-lg shadow-inner">
                                        {{ substr($content['testimonial']['name'] ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $content['testimonial']['name'] ?? '' }}</p>
                                        <p class="text-sm text-slate-500">{{ $content['testimonial']['role'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>