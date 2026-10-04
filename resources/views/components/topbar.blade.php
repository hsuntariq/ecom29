<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6">
    <div class="flex items-center gap-3">
        <button id="menu-btn" class="rounded-md p-2 text-slate-600 hover:bg-slate-100 lg:hidden" aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <input type="search" placeholder="Search products, orders…"
            class="hidden w-72 rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none sm:block">
    </div>

    <div class="relative">
        <button data-dropdown="user-menu" class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-slate-100">
            <span
                class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-700">AK</span>
            <span class="hidden text-sm font-medium sm:block">Ayesha Khan</span>
        </button>
        <div id="user-menu"
            class="dropdown-menu absolute right-0 mt-2 hidden w-44 rounded-lg border border-slate-200 bg-white py-1 text-sm shadow-lg">
            <a href="#" class="block px-4 py-2 hover:bg-slate-50">Profile</a>
            <a href="#" class="block px-4 py-2 hover:bg-slate-50">Settings</a>
            <a href="#" class="block px-4 py-2 text-red-600 hover:bg-slate-50">Sign out</a>
        </div>
    </div>
</header>
