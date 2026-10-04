<x-store-layout title="Wireless Earbuds Pro">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
        <nav class="mb-6 text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:underline">Home</a> / Electronics / <span class="text-slate-800">Wireless Earbuds Pro</span>
        </nav>

        <div class="grid gap-10 lg:grid-cols-2">
            {{-- Gallery (swap gradients for <img> tags) --}}
            <div>
                <div id="main-image" class="flex aspect-square items-center justify-center rounded-3xl bg-gradient-to-br from-sky-200 to-indigo-300 text-[9rem]">🎧</div>
                <div class="mt-4 grid grid-cols-4 gap-3">
                    @foreach ([['🎧', 'from-sky-200 to-indigo-300'], ['🔋', 'from-lime-200 to-emerald-300'], ['📦', 'from-amber-200 to-orange-300'], ['🎵', 'from-rose-200 to-pink-300']] as $i => [$icon, $tone])
                        <button type="button" data-icon="{{ $icon }}" data-tone="{{ $tone }}"
                                class="thumb flex aspect-square items-center justify-center rounded-xl bg-gradient-to-br {{ $tone }} text-3xl ring-2 {{ $i === 0 ? 'ring-emerald-900' : 'ring-transparent' }}">{{ $icon }}</button>
                    @endforeach
                </div>
            </div>

            {{-- Details --}}
            <div>
                <p class="text-sm font-semibold text-emerald-800">Electronics</p>
                <h1 class="mt-1 font-display text-4xl font-extrabold tracking-tight">Wireless Earbuds Pro</h1>
                <p class="mt-2 text-sm text-slate-500"><span class="text-lime-500">★★★★★</span> 4.8 · 214 reviews</p>

                <p class="mt-5 flex items-baseline gap-3">
                    <span class="font-display text-3xl font-bold">Rs 8,999</span>
                    <span class="text-slate-400 line-through">Rs 11,500</span>
                    <span class="rounded-full bg-lime-200 px-2.5 py-0.5 text-xs font-bold text-emerald-900">Save 22%</span>
                </p>
                <p class="mt-5 max-w-prose text-slate-600">Active noise cancelling, 32 hours of battery with the case, and a fit that stays put on a run. Pairs with two devices at once.</p>

                <form onsubmit="return false" class="mt-8 space-y-6">
                    <div>
                        <p class="mb-2 text-sm font-semibold">Colour: <span id="color-name" class="font-normal text-slate-500">Midnight</span></p>
                        <div class="flex gap-3">
                            @foreach ([['Midnight', 'bg-slate-900'], ['Mist', 'bg-slate-300'], ['Lime', 'bg-lime-300']] as $i => [$n, $c])
                                <label class="cursor-pointer">
                                    <input type="radio" name="color" value="{{ $n }}" class="peer sr-only" {{ $i === 0 ? 'checked' : '' }}>
                                    <span class="color-opt block h-9 w-9 rounded-full {{ $c }} ring-2 ring-offset-2 ring-transparent peer-checked:ring-emerald-900"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center rounded-full border border-slate-300">
                            <button type="button" id="qty-minus" class="h-11 w-11 text-xl hover:text-emerald-800" aria-label="Decrease">−</button>
                            <input id="qty" name="quantity" type="text" value="1" readonly class="w-10 bg-transparent text-center font-semibold">
                            <button type="button" id="qty-plus" class="h-11 w-11 text-xl hover:text-emerald-800" aria-label="Increase">+</button>
                        </div>
                        <button id="add-btn" data-qty="1" class="add-to-cart flex-1 rounded-full bg-emerald-950 px-8 py-3.5 font-bold text-lime-300 hover:bg-emerald-900">Add to cart</button>
                    </div>
                    <a href="{{ route('checkout') }}" class="block rounded-full border border-emerald-950 py-3.5 text-center font-bold text-emerald-950 hover:bg-emerald-50">Buy now</a>
                </form>

                <ul class="mt-8 space-y-2 text-sm text-slate-600">
                    <li>🚚 Free delivery over Rs 5,000</li>
                    <li>↩️ 30-day returns</li>
                    <li>🛡️ 1-year warranty</li>
                </ul>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="mt-16">
            <div class="flex gap-6 border-b border-slate-200">
                @foreach (['description' => 'Description', 'specs' => 'Specifications', 'shipping' => 'Shipping'] as $k => $l)
                    <button data-tab="{{ $k }}" class="tab-btn -mb-px border-b-2 py-3 font-semibold {{ $loop->first ? 'border-emerald-900 text-emerald-900' : 'border-transparent text-slate-500' }}">{{ $l }}</button>
                @endforeach
            </div>
            <div class="max-w-3xl py-6 text-slate-600">
                <div data-panel="description">Built for commutes, workouts and long calls. Four microphones keep your voice clear, and the case charges fully in under two hours.</div>
                <div data-panel="specs" class="hidden">
                    <dl class="grid grid-cols-2 gap-y-2 text-sm">
                        <dt class="font-semibold">Battery</dt><dd>8 h earbuds, 32 h with case</dd>
                        <dt class="font-semibold">Bluetooth</dt><dd>5.3</dd>
                        <dt class="font-semibold">Water resistance</dt><dd>IPX4</dd>
                        <dt class="font-semibold">Weight</dt><dd>5 g per earbud</dd>
                    </dl>
                </div>
                <div data-panel="shipping" class="hidden">Orders ship within 24 hours. Delivery takes 2–4 working days. Cash on delivery is available in major cities.</div>
            </div>
        </div>

        {{-- Related --}}
        <h2 class="mt-12 font-display text-2xl font-bold">You may also like</h2>
        <div class="mt-6 grid grid-cols-2 gap-x-5 gap-y-10 lg:grid-cols-4">
            <x-product-card name="Leather Wallet" price="2,500" icon="👛" tone="from-amber-200 to-orange-300" rating="4.9" />
            <x-product-card name="Running Shoes" price="11,200" icon="👟" tone="from-rose-200 to-pink-300" />
            <x-product-card name="Steel Bottle" price="1,450" icon="🧴" tone="from-lime-200 to-emerald-300" />
            <x-product-card name="Canvas Backpack" price="4,800" icon="🎒" tone="from-teal-200 to-cyan-300" tag="New" />
        </div>
    </div>

    @push('scripts')
    <script>
        $(function () {
            // Gallery
            $('.thumb').on('click', function () {
                $('.thumb').removeClass('ring-emerald-900').addClass('ring-transparent');
                $(this).addClass('ring-emerald-900').removeClass('ring-transparent');
                $('#main-image').attr('class',
                    'flex aspect-square items-center justify-center rounded-3xl bg-gradient-to-br text-[9rem] ' + $(this).data('tone'))
                    .text($(this).data('icon'));
            });

            // Colour label
            $('input[name=color]').on('change', function () { $('#color-name').text(this.value); });

            // Quantity
            function setQty(n) {
                n = Math.min(10, Math.max(1, n));
                $('#qty').val(n);
                $('#add-btn').attr('data-qty', n);
            }
            $('#qty-minus').on('click', () => setQty(+$('#qty').val() - 1));
            $('#qty-plus').on('click', () => setQty(+$('#qty').val() + 1));

            // Tabs
            $('.tab-btn').on('click', function () {
                $('.tab-btn').removeClass('border-emerald-900 text-emerald-900').addClass('border-transparent text-slate-500');
                $(this).addClass('border-emerald-900 text-emerald-900').removeClass('border-transparent text-slate-500');
                $('[data-panel]').addClass('hidden');
                $('[data-panel=' + $(this).data('tab') + ']').removeClass('hidden');
            });
        });
    </script>
    @endpush
</x-store-layout>
