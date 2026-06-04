<nav class="navbar fixed top-0 w-full z-50 transition-all duration-500" id="mainNav">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 bg-amber-600 rotate-45"></div>
                <span class="font-display text-xl font-semibold tracking-widest uppercase">Luxe Interior</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-10">
                @foreach([
                    ['route'=>'home','label'=>'Beranda'],
                    ['route'=>'about','label'=>'Tentang Kami'],
                    ['route'=>'services','label'=>'Layanan'],
                   ['route'=>'projects.index','label'=>'Portofolio'],
                    ['route'=>'contact','label'=>'Kontak'],
                ] as $item)
                <a href="{{ route($item['route']) }}"
                   class="nav-link text-sm font-medium tracking-widest uppercase transition-colors {{ request()->routeIs($item['route']) ? 'text-amber-600' : '' }}">
                    {{ $item['label'] }}
                </a>
                @endforeach
            </div>

            <!-- CTA Button -->
            <a href="{{ route('contact') }}" class="hidden lg:block btn-primary">
                Konsultasi Gratis
            </a>

            <!-- Mobile Toggle -->
            <button id="mobileToggle" class="lg:hidden p-2">
                <span class="block w-6 h-0.5 bg-current mb-1.5 transition-all" id="bar1"></span>
                <span class="block w-6 h-0.5 bg-current mb-1.5 transition-all" id="bar2"></span>
                <span class="block w-4 h-0.5 bg-current transition-all" id="bar3"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="lg:hidden hidden bg-white border-t border-stone-100 px-6 py-6">
        @foreach([
            ['route'=>'home','label'=>'Beranda'],
            ['route'=>'about','label'=>'Tentang Kami'],
            ['route'=>'services','label'=>'Layanan'],
            ['route'=>'projects.index','label'=>'Portofolio'],
            ['route'=>'contact','label'=>'Kontak'],
        ] as $item)
        <a href="{{ route($item['route']) }}" class="block py-3 text-sm font-medium tracking-widest uppercase border-b border-stone-100">
            {{ $item['label'] }}
        </a>
        @endforeach
        <a href="{{ route('contact') }}" class="mt-4 block text-center btn-primary">Konsultasi Gratis</a>
    </div>
</nav>