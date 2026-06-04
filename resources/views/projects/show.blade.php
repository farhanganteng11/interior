@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container py-4">
        <a href="{{ url('/') }}" class="text-decoration-none text-muted small d-inline-flex align-items-center gap-2 mb-4">
            ← Kembali ke Beranda
        </a>

        <div class="row g-5">
            <div class="col-md-7">
                <div class="shadow-sm rounded overflow-hidden bg-light">
                   <img src="{{ asset('storage/' . $project->thumbnail) }}"
     alt="{{ $project->title }}"
     class="w-full h-full object-cover">
                </div>
            </div>

            <div class="col-md-5">
                <span class="text-uppercase tracking-wider small text-muted" style="color: #c5a880 !important; font-weight: 600;">{{ $project->category }}</span>
                <h1 class="mt-2 mb-4" style="font-family: 'Playfair Display', serif; color: #1a1a1a;">{{ $project->title }}</h1>
                
                <p class="text-secondary mb-4" style="line-height: 1.8;">{{ $project->description }}</p>

                <div class="border-top pt-4">
                    <table class="table table-borderless small text-secondary">
                        <tr>
                            <td class="ps-0 py-2" width="35%"><strong>Lokasi</strong></td>
                            <td class="py-2">: {{ $project->location }}</td>
                        </tr>
                        <tr>
                            <td class="ps-0 py-2"><strong>Tahun Proyek</strong></td>
                            <td class="py-2">: {{ $project->year }}</td>
                        </tr>
                        <tr>
                            <td class="ps-0 py-2"><strong>Luas Area</strong></td>
                            <td class="py-2">: {{ $project->area_sqm }} m²</td>
                        </tr>
                        <tr>
                            <td class="ps-0 py-2"><strong>Klien</strong></td>
                            <td class="py-2">: {{ $project->client_name ?? 'Privat' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection