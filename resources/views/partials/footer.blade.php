<footer class="bg-stone-900 text-stone-300 pt-20 pb-8">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 pb-12 border-b border-stone-700">
            <!-- Brand -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-amber-600 rotate-45"></div>
                    <span class="font-display text-xl font-semibold text-white tracking-widest uppercase">Luxe Interior</span>
                </div>
                <p class="text-stone-400 leading-relaxed mb-6 max-w-xs">
                    Studio desain interior premium yang menghadirkan estetika, fungsi, dan emosi dalam setiap ruang yang kami rancang.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 border border-stone-600 flex items-center justify-center hover:border-amber-600 hover:text-amber-600 transition-colors text-sm">IG</a>
                    <a href="#" class="w-10 h-10 border border-stone-600 flex items-center justify-center hover:border-amber-600 hover:text-amber-600 transition-colors text-sm">FB</a>
                    <a href="#" class="w-10 h-10 border border-stone-600 flex items-center justify-center hover:border-amber-600 hover:text-amber-600 transition-colors text-sm">LI</a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-white font-medium tracking-widest uppercase text-sm mb-6">Navigasi</h4>
                <ul class="space-y-3">
                    @foreach([
                        ['route'=>'home','label'=>'Beranda'],
                        ['route'=>'about','label'=>'Tentang Kami'],
                        ['route'=>'services','label'=>'Layanan'],
                        ['route'=>'projects.index','label'=>'Portofolio'],
                        ['route'=>'contact','label'=>'Kontak'],
                    ] as $item)
                    <li><a href="{{ route($item['route']) }}" class="text-stone-400 hover:text-amber-500 transition-colors text-sm">{{ $item['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-medium tracking-widest uppercase text-sm mb-6">Kontak</h4>
                <ul class="space-y-3 text-stone-400 text-sm">
                    <li>📍 Jl. Sudirman No. 123, Jakarta Pusat</li>
                    <li>📞 +62 21 1234 5678</li>
                    <li>✉️ hello@luxeinterior.id</li>
                    <li>🕒 Senin–Jumat, 09.00–18.00 WIB</li>
                </ul>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-stone-500 text-sm">© {{ date('Y') }} Luxe Interior Studio. All rights reserved.</p>
            <p class="text-stone-500 text-sm">Crafted with ❤ in Indonesia</p>
        </div>
    </div>
</footer>