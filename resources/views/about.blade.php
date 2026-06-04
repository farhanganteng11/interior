@extends('layouts.app')

@section('content')
<section class="py-5" style="background-color: #fdfdfd;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase tracking-wider" style="color: #c5a880; font-size: 14px; font-weight: 600; letter-spacing: 2px;">TENTANG KAMI</span>
            <h2 class="mt-2" style="font-family: 'Playfair Display', serif; font-size: 36px; color: #1a1a1a;">Tim Profesional Kami</h2>
            <div style="width: 50px; height: 2px; background-color: #c5a880; margin: 20px auto 0;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($team as $member)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 4px; transition: transform 0.3s;">
<img src="{{ asset('storage/' . $member->photo) }}"
     alt="{{ $member->name }}"
     class="rounded-circle mx-auto d-block mb-4"
     style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #f1f1f1;">
                        <h4 style="font-family: 'Playfair Display', serif; color: #222; font-size: 20px;" class="mb-1">{{ $member->name }}</h4>
                        <p class="text-muted small text-uppercase tracking-wide mb-3" style="color: #c5a880 !important; font-weight: 500;">{{ $member->position }}</p>
                        <p class="card-text text-secondary px-2" style="font-size: 14px; line-height: 1.6;">{{ $member->bio }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada data anggota tim.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection