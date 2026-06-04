@extends('layouts.app')

@section('content')
<section class="py-5" style="background-color: #fafafa;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase tracking-wider" style="color: #c5a880; font-size: 14px; font-weight: 600; letter-spacing: 2px;">LAYANAN KAMI</span>
            <h2 class="mt-2" style="font-family: 'Playfair Display', serif; font-size: 36px; color: #1a1a1a;">Solusi Interior Desain</h2>
            <div style="width: 50px; height: 2px; background-color: #c5a880; margin: 20px auto 0;"></div>
        </div>

        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 4px;">
                        <div class="d-flex align-items-start gap-3">
                            <div class="p-3 bg-white shadow-sm rounded mb-3" style="color: #c5a880;">
                                <!-- Icon Box -->
                                <span style="font-size: 24px; font-weight: bold; text-transform: uppercase;">{{ substr($service->icon, 0, 2) }}</span>
                            </div>
                            <div>
                                <h4 style="font-family: 'Playfair Display', serif; color: #222;" class="mb-2">{{ $service->title }}</h4>
                                <p class="text-secondary small mb-3" style="line-height: 1.6;">{{ $service->description }}</p>
                                
                                @if($service->features)
                                    <ul class="list-unstyled row g-2">
                                        @foreach($service->features as $feature)
                                            <li class="col-6 text-muted small d-flex align-items-center gap-2">
                                                <span style="color: #c5a880;">✓</span> {{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada data layanan tersedia.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection