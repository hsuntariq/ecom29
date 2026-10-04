@php
    $links = [
        ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10'],
        [
            'route' => 'products',
            'label' => 'Products',
            'icon' => 'M20 7l-8-4-8 4m16 0v10l-8 4m8-14l-8 4m0 10L4 17V7m8 4v10',
        ],
        [
            'route' => 'orders',
            'label' => 'Orders',
            'icon' =>
                'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 6h14M9 22a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z',
        ],
        [
            'route' => 'customers',
            'label' => 'Customers',
            'icon' =>
                'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 014-4h2a4 4 0 014 4v2zM12 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 100-4',
        ],
    ];
@endphp

<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full transform bg-slate-900 text-slate-300 transition-transform lg:static lg:translate-x-0">
    <div class="flex h-16 items-center gap-2 border-b border-slate-800 px-6">
        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-500 font-bold text-white">S</span>
        <span class="text-lg font-semibold text-white">Shopdesk</span>
    </div>

    <nav class="space-y-1 p-4">
        @foreach ($links as $link)
            <x-sidebar-link :href="route($link['route'])" :active="request()->routeIs($link['route'])" :icon="$link['icon']">
                {{ $link['label'] }}
            </x-sidebar-link>
        @endforeach
    </nav>
</aside>
