<x-layout title="Customers">
    <x-page-header title="Customers" subtitle="People who have bought from your store.">
        <button
            class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium hover:bg-slate-50">Export
            CSV</button>
    </x-page-header>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach ([['Bilal Ahmed', 'bilal@example.com', 12, 'Rs 84,200'], ['Sana Gul', 'sana@example.com', 7, 'Rs 51,900'], ['Usman Ali', 'usman@example.com', 3, 'Rs 9,400'], ['Hina Noor', 'hina@example.com', 15, 'Rs 120,300'], ['Zain Malik', 'zain@example.com', 5, 'Rs 33,600'], ['Maryam Shah', 'maryam@example.com', 9, 'Rs 67,000']] as $c)
            <div class="rounded-xl bg-white p-5 shadow-sm">
                <div class="flex items-center gap-3">
                    <span
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-700">
                        {{ collect(explode(' ', $c[0]))->map(fn($n) => $n[0])->join('') }}
                    </span>
                    <div>
                        <p class="font-medium">{{ $c[0] }}</p>
                        <p class="text-sm text-slate-500">{{ $c[1] }}</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between border-t border-slate-100 pt-4 text-sm">
                    <span class="text-slate-500">{{ $c[2] }} orders</span>
                    <span class="font-medium">{{ $c[3] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
