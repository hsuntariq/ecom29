<header class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/80 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6">
        <a href="{{ route('home') }}" class="font-display text-2xl font-extrabold tracking-tight text-emerald-950">
            nook<span class="text-lime-500">.</span>
        </a>

        <nav class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
            <a href="{{ route('home') }}#shop" class="hover:text-emerald-900">Shop</a>
            <a href="{{ route('home') }}#categories" class="hover:text-emerald-900">Categories</a>
            <a href="{{ route('home') }}#reviews" class="hover:text-emerald-900">Reviews</a>
        </nav>

        <div class="flex items-center gap-2">
            <a href="{{ route('checkout') }}" class="relative rounded-full p-2 text-slate-700 hover:bg-slate-100" aria-label="Cart">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h15l-1.5 9h-12L6 6zm0 0L5 3H2M9 20a1 1 0 100-2 1 1 0 000 2zm9 0a1 1 0 100-2 1 1 0 000 2z"/></svg>
                <span class="cart-count absolute -right-0.5 -top-0.5 hidden h-5 min-w-5 items-center justify-center rounded-full bg-lime-400 px-1 text-xs font-bold text-emerald-950">0</span>
            </a>
            <button id="nav-toggle" class="rounded-full p-2 hover:bg-slate-100 md:hidden" aria-label="Menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <nav id="mobile-nav" class="hidden border-t border-slate-200 bg-white px-4 py-3 text-sm font-medium md:hidden">
        <a href="{{ route('home') }}#shop" class="block py-2">Shop</a>
        <a href="{{ route('home') }}#categories" class="block py-2">Categories</a>
        <a href="{{ route('home') }}#reviews" class="block py-2">Reviews</a>
    </nav>
</header>
