@extends('layouts.app')
@section('title', 'Kontak — Luxe Interior')

@section('content')
<div class="pt-20">
    <div class="bg-stone-900 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-8 h-px bg-amber-500"></div>
                <span class="text-amber-400 text-sm tracking-widest uppercase">Hubungi Kami</span>
            </div>
            <h1 class="font-display text-5xl lg:text-6xl font-light">Mari Berkolaborasi</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <!-- Info -->
            <div class="lg:col-span-1">
                <h2 class="font-display text-2xl font-light mb-8">Informasi Kontak</h2>
                @foreach([
                    ['icon'=>'📍','label'=>'Alamat','value'=>'Jl. Sudirman No. 123, Jakarta Pusat 10220'],
                    ['icon'=>'📞','label'=>'Telepon','value'=>'+62 21 1234 5678'],
                    ['icon'=>'✉️','label'=>'Email','value'=>'hello@luxeinterior.id'],
                    ['icon'=>'🕒','label'=>'Jam Kerja','value'=>'Senin–Jumat, 09.00–18.00 WIB'],
                ] as $info)
                <div class="flex gap-4 mb-6">
                    <span class="text-2xl mt-1">{{ $info['icon'] }}</span>
                    <div>
                        <div class="text-xs tracking-widest uppercase text-stone-500 mb-1">{{ $info['label'] }}</div>
                        <div class="text-stone-700">{{ $info['value'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Form -->
            <div class="lg:col-span-2">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 mb-8">
                    ✅ {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs tracking-widest uppercase text-stone-500 mb-2">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full border border-stone-200 focus:border-amber-500 outline-none px-4 py-3 bg-transparent text-sm transition-colors @error('name') border-red-400 @enderror">
                            @error('name')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-xs tracking-widest uppercase text-stone-500 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full border border-stone-200 focus:border-amber-500 outline-none px-4 py-3 bg-transparent text-sm transition-colors @error('email') border-red-400 @enderror">
                            @error('email')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs tracking-widest uppercase text-stone-500 mb-2">Nomor Telepon</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   class="w-full border border-stone-200 focus:border-amber-500 outline-none px-4 py-3 bg-transparent text-sm transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs tracking-widest uppercase text-stone-500 mb-2">Subjek *</label>
                            <select name="subject" required class="w-full border border-stone-200 focus:border-amber-500 outline-none px-4 py-3 bg-transparent text-sm transition-colors">
                                <option value="">— Pilih Subjek —</option>
                                <option value="Konsultasi Desain" {{ old('subject')==='Konsultasi Desain'?'selected':'' }}>Konsultasi Desain</option>
                                <option value="Penawaran Proyek" {{ old('subject')==='Penawaran Proyek'?'selected':'' }}>Penawaran Proyek</option>
                                <option value="Informasi Layanan" {{ old('subject')==='Informasi Layanan'?'selected':'' }}>Informasi Layanan</option>
                                <option value="Lainnya" {{ old('subject')==='Lainnya'?'selected':'' }}>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs tracking-widest uppercase text-stone-500 mb-2">Pesan *</label>
                        <textarea name="message" rows="6" required
                                  class="w-full border border-stone-200 focus:border-amber-500 outline-none px-4 py-3 bg-transparent text-sm transition-colors resize-none @error('message') border-red-400 @enderror"
                                  placeholder="Ceritakan tentang proyek atau kebutuhan desain Anda...">{{ old('message') }}</textarea>
                        @error('message')<span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection