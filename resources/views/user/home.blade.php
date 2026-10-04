<x-store-layout title="Everyday things, made to last">

    {{-- Hero --}}
    <section class="overflow-hidden bg-emerald-950 text-white">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-2 lg:py-24">
            <div>
                <p class="mb-4 inline-block rounded-full bg-emerald-900 px-4 py-1 text-sm text-lime-300">Free delivery over Rs 5,000</p>
                <h1 class="font-display text-5xl font-extrabold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl">
                    Everyday things, made to last.
                </h1>
                <p class="mt-6 max-w-lg text-lg text-emerald-100/80">
                    Earbuds, wallets, shoes and bottles chosen for how they feel on day 400, not just day one.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#shop" class="rounded-full bg-lime-300 px-7 py-3.5 font-bold text-emerald-950 transition hover:bg-lime-200">Shop the collection</a>
                    <a href="{{ route('product') }}" class="rounded-full border border-emerald-700 px-7 py-3.5 font-semibold hover:bg-emerald-900">See bestseller</a>
                </div>
                <div class="mt-10 flex gap-8 text-sm text-emerald-100/70">
                    <div><p class="font-display text-2xl font-bold text-white">40k+</p>happy customers</div>
                    <div><p class="font-display text-2xl font-bold text-white">4.8★</p>average rating</div>
                    <div><p class="font-display text-2xl font-bold text-white">30 days</p>easy returns</div>
                </div>
            </div>

            <div class="relative grid grid-cols-2 gap-4">
                <div class="flex aspect-[4/5] items-center justify-center rounded-3xl bg-gradient-to-br from-lime-200 to-emerald-300 text-8xl">🎧</div>
                <div class="mt-10 flex aspect-[4/5] items-center justify-center rounded-3xl bg-gradient-to-br from-amber-200 to-orange-300 text-8xl">👜</div>
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 rounded-2xl bg-white px-5 py-3 text-sm text-slate-800 shadow-xl">
                    <span class="font-bold">New:</span> Wireless Earbuds Pro
                </div>
            </div>
        </div>
    </section>

    {{-- Perks --}}
    <section class="mx-auto grid max-w-7xl gap-6 px-4 py-12 sm:grid-cols-3 sm:px-6">
        @foreach ([['🚚', 'Fast delivery', '2–4 days across Pakistan'], ['↩️', '30-day returns', 'Not right? Send it back'], ['🔒', 'Secure payment', 'Card, wallet or cash on delivery']] as [$i, $t, $d])
            <div class="flex items-center gap-4">
                <span class="flex h-12 w-12 items-center justify-center rounded-full bg-lime-100 text-xl">{{ $i }}</span>
                <div><p class="font-bold">{{ $t }}</p><p class="text-sm text-slate-500">{{ $d }}</p></div>
            </div>
        @endforeach
    </section>

    {{-- Categories --}}
    <section id="categories" class="mx-auto max-w-7xl px-4 py-10 sm:px-6">
        <h2 class="font-display text-3xl font-bold tracking-tight">Shop by category</h2>
        <div class="mt-6 grid grid-cols-2 gap-4 md:grid-cols-4">
            @foreach ([['Electronics', '🎧', 'from-sky-200 to-indigo-300'], ['Accessories', '👜', 'from-amber-200 to-orange-300'], ['Footwear', '👟', 'from-rose-200 to-pink-300'], ['Home', '🧴', 'from-lime-200 to-emerald-300']] as [$n, $i, $t])
                <a href="#shop" class="group flex h-40 flex-col justify-between rounded-2xl bg-gradient-to-br {{ $t }} p-5">
                    <span class="text-4xl transition group-hover:scale-110">{{ $i }}</span>
                    <span class="font-display text-lg font-bold text-slate-900">{{ $n }}</span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Featured products --}}
    <section id="shop" class="mx-auto max-w-7xl px-4 py-14 sm:px-6">
        <div class="flex items-end justify-between">
            <h2 class="font-display text-3xl font-bold tracking-tight">Bestsellers</h2>
            <a href="#" class="text-sm font-semibold text-emerald-800 hover:underline">View all</a>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-x-5 gap-y-10 lg:grid-cols-4">
            <x-product-card name="Wireless Earbuds" price="8,999" icon="🎧" tone="from-sky-200 to-indigo-300" tag="Bestseller" />
            <x-product-card name="Leather Wallet" price="2,500" icon="👛" tone="from-amber-200 to-orange-300" rating="4.9" />
            <x-product-card name="Running Shoes" price="11,200" icon="👟" tone="from-rose-200 to-pink-300" tag="New" rating="4.7" />
            <x-product-card name="Steel Bottle" price="1,450" icon="🧴" tone="from-lime-200 to-emerald-300" rating="4.8" />
        </div>
    </section>

    {{-- Promo banner --}}
    <section class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex flex-col items-start justify-between gap-6 rounded-3xl bg-lime-300 p-8 sm:flex-row sm:items-center sm:p-12">
            <div>
                <h2 class="font-display text-3xl font-extrabold text-emerald-950 sm:text-4xl">10% off your first order</h2>
                <p class="mt-2 text-emerald-900">Use code <span class="rounded bg-white px-2 py-0.5 font-bold">WELCOME10</span> at checkout.</p>
            </div>
            <a href="{{ route('checkout') }}" class="rounded-full bg-emerald-950 px-7 py-3.5 font-bold text-lime-300 hover:bg-emerald-900">Go to checkout</a>
        </div>
    </section>

    {{-- Reviews --}}
    <section id="reviews" class="mx-auto max-w-7xl px-4 py-20 sm:px-6">
        <h2 class="font-display text-3xl font-bold tracking-tight">What customers say</h2>
        <div class="mt-8 grid gap-5 md:grid-cols-3">
            @foreach ([
                ['Bilal A.', 'Lahore', 'The earbuds still hold a full day of charge after six months. Packaging was lovely too.'],
                ['Sana G.', 'Islamabad', 'Ordered on Monday, wallet arrived Wednesday. The leather smells and feels great.'],
                ['Hina N.', 'Peshawar', 'Sizing on the shoes was spot on, and returns were painless when I wanted a different colour.'],
            ] as [$n, $c, $q])
                <figure class="rounded-2xl bg-white p-6 shadow-sm">
                    <p class="text-lime-500">★★★★★</p>
                    <blockquote class="mt-3 text-slate-700">{{ $q }}</blockquote>
                    <figcaption class="mt-4 text-sm font-semibold">{{ $n }} <span class="font-normal text-slate-500">· {{ $c }}</span></figcaption>
                </figure>
            @endforeach
        </div>
    </section>

    {{-- Newsletter --}}
    <section class="mx-auto max-w-3xl px-4 text-center sm:px-6">
        <h2 class="font-display text-3xl font-bold tracking-tight">Get new arrivals first</h2>
        <p class="mt-2 text-slate-500">One email a week. No spam, unsubscribe any time.</p>
        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
            <input id="news-email" type="email" name="email" placeholder="you@example.com" class="flex-1 rounded-full border border-slate-300 px-5 py-3 focus:border-emerald-700 focus:outline-none">
            <button id="news-btn" class="rounded-full bg-emerald-950 px-7 py-3 font-bold text-lime-300 hover:bg-emerald-900">Subscribe</button>
        </div>
        <p id="news-msg" class="mt-3 hidden text-sm"></p>
    </section>

    @push('scripts')
    <script>
        $(function () {
            $('#news-btn').on('click', function () {
                const ok = /^\S+@\S+\.\S+$/.test($('#news-email').val());
                $('#news-msg').removeClass('hidden text-red-600 text-emerald-700')
                    .addClass(ok ? 'text-emerald-700' : 'text-red-600')
                    .text(ok ? 'Thanks. You\'re on the list.' : 'Enter a valid email address.');
                if (ok) $('#news-email').val('');
            });
        });
    </script>
    @endpush
</x-store-layout>
