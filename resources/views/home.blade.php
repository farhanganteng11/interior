@extends('layouts.app')
@section('title', 'Luxe Interior — Premium Design Studio Indonesia')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section relative min-h-screen flex items-center overflow-hidden">
    <div class="hero-bg absolute inset-0 bg-gradient-to-br from-stone-900 via-stone-800 to-amber-950"></div>
    <div class="hero-overlay absolute inset-0" style="background: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"g\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><circle cx=\"10\" cy=\"10\" r=\"0.5\" fill=\"%23ffffff10\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23g)\"/></svg>');"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 lg:py-0">
        <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-8 reveal-up">
                <div class="w-12 h-px bg-amber-500"></div>
                <span class="text-amber-400 text-sm font-medium tracking-widest uppercase">Premium Interior Studio</span>
            </div>
            <h1 class="font-display text-5xl lg:text-7xl xl:text-8xl text-white font-light leading-none mb-8 reveal-up" style="animation-delay:.1s">
                Ruang Yang<br>
                <em class="text-amber-400">Bercerita</em>
            </h1>
            <p class="text-stone-300 text-lg lg:text-xl font-light leading-relaxed mb-12 max-w-xl reveal-up" style="animation-delay:.2s">
                Kami merancang interior yang bukan sekadar indah — tetapi menghadirkan pengalaman, emosi, dan identitas yang kuat di setiap sudut ruangan Anda.
            </p>
            <div class="flex flex-wrap gap-4 reveal-up" style="animation-delay:.3s">
                <a href="{{ route('projects.index') }}" class="btn-primary-lg">Lihat Portofolio</a>
                <a href="{{ route('contact') }}" class="btn-outline-lg">Konsultasi Gratis</a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-stone-400">
        <span class="text-xs tracking-widest uppercase">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-amber-500 to-transparent animate-pulse"></div>
    </div>
</section>

{{-- STATS SECTION --}}
<section class="bg-amber-600 py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['value'=>$stats['projects'].'+'  ,'label'=>'Proyek Selesai'],
                ['value'=>$stats['years'].'+'     ,'label'=>'Tahun Pengalaman'],
                ['value'=>$stats['clients'].'+'   ,'label'=>'Klien Puas'],
                ['value'=>$stats['awards']        ,'label'=>'Penghargaan'],
            ] as $stat)
            <div class="text-center text-white">
                <div class="font-display text-4xl lg:text-5xl font-light mb-2">{{ $stat['value'] }}</div>
                <div class="text-amber-100 text-sm tracking-widest uppercase">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SERVICES SECTION --}}
<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-8 h-px bg-amber-600"></div>
                    <span class="text-amber-600 text-sm tracking-widest uppercase">Yang Kami Lakukan</span>
                </div>
                <h2 class="font-display text-4xl lg:text-5xl font-light">Layanan Kami</h2>
            </div>
            <a href="{{ route('services') }}" class="text-stone-500 hover:text-amber-600 transition-colors text-sm tracking-widest uppercase flex items-center gap-2">
                Semua Layanan <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $i => $service)
            <div class="service-card group p-8 border border-stone-100 hover:border-amber-200 hover:bg-amber-50 transition-all duration-300 cursor-default">
                <div class="w-12 h-12 bg-stone-100 group-hover:bg-amber-100 flex items-center justify-center mb-6 transition-colors">
                    <span class="text-2xl">
                        @switch($service->icon)
                            @case('home') 🏠 @break
                            @case('building') 🏢 @break
                            @case('star') ⭐ @break
                            @case('refresh') 🔄 @break
                            @default 🎨
                        @endswitch
                    </span>
                </div>
                <h3 class="font-display text-xl font-medium mb-3">{{ $service->title }}</h3>
                <p class="text-stone-500 text-sm leading-relaxed">{{ Str::limit($service->description, 100) }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section class="py-24 lg:py-32 bg-stone-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-8 h-px bg-amber-600"></div>
                    <span class="text-amber-600 text-sm tracking-widest uppercase">Karya Terbaik</span>
                </div>
                <h2 class="font-display text-4xl lg:text-5xl font-light">Portofolio Pilihan</h2>
            </div>
            <a href="{{ route('projects.index') }}" class="text-stone-500 hover:text-amber-600 transition-colors text-sm tracking-widest uppercase flex items-center gap-2">
                Lihat Semua <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProjects as $project)
            <a href="{{ asset($project->thumbnail) }}" target="_blank">
                <div class="aspect-[4/3] bg-stone-200 overflow-hidden relative">
 @if($project->thumbnail)
    <img src="{{ asset('storage/' . $project->thumbnail) }}"
         alt="{{ $project->title }}"
         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="position-relative overflow-hidden">
    <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
</div>
                    @endif
                    <div class="absolute inset-0 bg-stone-900/0 group-hover:bg-stone-900/40 transition-all duration-300 flex items-center justify-center">
                        <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity text-sm tracking-widest uppercase">Lihat Detail →</span>
                    </div>
                </div>
                <div class="pt-5">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-amber-600 text-xs tracking-widest uppercase">{{ ucfirst($project->category) }}</span>
                        <span class="text-stone-400 text-xs">{{ $project->year }}</span>
                    </div>
                    <h3 class="font-display text-xl font-medium mb-1">{{ $project->title }}</h3>
                    <p class="text-stone-500 text-sm">{{ $project->location }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="py-24 lg:py-32 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-8 h-px bg-amber-600"></div>
                    <span class="text-amber-600 text-sm tracking-widest uppercase">Tentang Kami</span>
                </div>
                <h2 class="font-display text-4xl lg:text-5xl font-light mb-8 leading-tight">
                    Lebih dari Sekadar<br><em class="text-amber-600">Mendekorasi</em>
                </h2>
                <p class="text-stone-600 leading-relaxed mb-6">
                    Luxe Interior Studio berdiri sejak 2015 dengan satu misi: menghadirkan ruang yang mencerminkan jiwa penghuninya. Kami percaya desain interior yang baik bukan tentang tren, melainkan tentang manusia yang hidup di dalamnya.
                </p>
                <p class="text-stone-600 leading-relaxed mb-10">
                    Dengan tim desainer berpengalaman dan pendekatan yang personal, setiap proyek kami perlakukan sebagai karya seni yang unik — dari konsep pertama hingga sentuhan akhir.
                </p>
                <a href="{{ route('about') }}" class="btn-primary">Kenali Kami</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-square bg-gradient-to-br from-amber-100 to-amber-200 rounded-sm flex items-center justify-center">
                    <span class="text-6xl">🎨</span>
                </div>
                <div class="aspect-square bg-gradient-to-br from-stone-100 to-stone-200 rounded-sm mt-8 flex items-center justify-center">
                    <span class="text-6xl">🏡</span>
                </div>
                <div class="aspect-square bg-gradient-to-br from-stone-100 to-stone-200 rounded-sm flex items-center justify-center">
                    <span class="text-6xl">✏️</span>
                </div>
                <div class="aspect-square bg-gradient-to-br from-amber-100 to-amber-200 rounded-sm mt-8 flex items-center justify-center">
                    <span class="text-6xl">🏆</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TESTIMONIALS --}}
<section class="py-24 lg:py-32 bg-stone-900 text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="w-8 h-px bg-amber-500"></div>
                <span class="text-amber-400 text-sm tracking-widest uppercase">Kata Mereka</span>
                <div class="w-8 h-px bg-amber-500"></div>
            </div>
            <h2 class="font-display text-4xl lg:text-5xl font-light">Kepuasan Klien Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $t)
            <div class="p-8 border border-stone-700 hover:border-amber-600/50 transition-colors">
                <div class="flex gap-1 mb-6">
                    @for($i=0;$i<$t->rating;$i++)<span class="text-amber-500">★</span>@endfor
                </div>
                <p class="text-stone-300 leading-relaxed mb-8 italic">"{{ $t->review }}"</p>
                <div>
                    <div class="font-medium text-white">{{ $t->client_name }}</div>
                    @if($t->client_position)
                    <div class="text-stone-500 text-sm">{{ $t->client_position }}{{ $t->client_company ? ' — '.$t->client_company : '' }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-24 bg-amber-600">
    <div class="max-w-4xl mx-auto px-6 text-center text-white">
        <h2 class="font-display text-4xl lg:text-5xl font-light mb-6">Siap Mewujudkan Ruang Impian Anda?</h2>
        <p class="text-amber-100 text-lg mb-10">Konsultasi pertama gratis. Ceritakan kepada kami tentang proyek Anda.</p>
        <a href="{{ route('contact') }}" class="bg-white text-amber-700 px-10 py-4 font-medium tracking-widest uppercase text-sm hover:bg-stone-100 transition-colors inline-block">
            Mulai Sekarang
        </a>
    </div>
</section>

@endsection