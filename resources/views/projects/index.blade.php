@extends('layouts.app')
@section('title', 'Portofolio — Luxe Interior')

@section('content')
<div class="pt-20">
    <div class="bg-stone-900 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-8 h-px bg-amber-500"></div>
                <span class="text-amber-400 text-sm tracking-widest uppercase">Karya Kami</span>
            </div>
            <h1 class="font-display text-5xl lg:text-6xl font-light">Portofolio</h1>
        </div>
    </div>

    <div class="bg-white border-b border-stone-100 sticky top-20 z-40">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex gap-8 overflow-x-auto py-4">
            @foreach($categories as $key => $label)
            <a href="{{ route('projects.index', ['category'=>$key]) }}"
               class="filter-btn whitespace-nowrap text-sm tracking-widest uppercase pb-2 border-b-2 transition-colors
               {{ request('category',$key==='all'?'all':'') === $key ? 'border-amber-600 text-amber-600' : 'border-transparent text-stone-500 hover:text-stone-800' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <a href="{{ route('projects.show', $project->slug) }}" class="project-card group block">
                <div class="aspect-[4/3] bg-stone-200 overflow-hidden relative mb-4">
                    {{-- CEK APAKAH ADA GAMBAR DI DATABASE --}}
                    @if($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        {{-- BACKUP TAMPILAN JIKA GAMBAR KOSONG / FILE HILANG --}}
                        <div class="w-full h-full bg-gradient-to-br from-stone-200 to-stone-300 flex items-center justify-center group-hover:scale-105 transition-transform duration-700">
                            <span class="text-5xl">
                                @switch($project->category)
                                    @case('residential') 🏠 @break
                                    @case('commercial') 🏢 @break
                                    @case('hospitality') 🏨 @break
                                    @default 🎨
                                @endswitch
                            </span>
                        </div>
                    @endif
                </div>
                <span class="text-amber-600 text-xs tracking-widest uppercase">{{ ucfirst($project->category) }}</span>
                <h3 class="font-display text-xl font-medium mt-1 mb-1 group-hover:text-amber-700 transition-colors">{{ $project->title }}</h3>
                <p class="text-stone-500 text-sm">{{ $project->location }} · {{ $project->year }}</p>
            </a>
            @empty
            <div class="col-span-3 text-center py-20 text-stone-400">
                <p class="text-4xl mb-4">🔍</p>
                <p>Tidak ada proyek ditemukan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection