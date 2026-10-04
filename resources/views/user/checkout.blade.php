<x-store-layout title="Checkout">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6">
        <h1 class="font-display text-3xl font-extrabold tracking-tight">Checkout</h1>

        <form id="checkout-form" onsubmit="return false" class="mt-8 grid gap-10 lg:grid-cols-5">
            <div class="space-y-8 lg:col-span-3">

                {{-- Contact --}}
                <section class="rounded-2xl bg-white p-6 shadow-sm">
                    <h2 class="mb-4 font-display text-lg font-bold">Contact</h2>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <input name="email" type="email" placeholder="Email" class="field sm:col-span-2">
                        <input name="phone" type="tel" placeholder="Phone number" class="field sm:col-span-2">
                    </div>
                </section>

                {{-- Shipping --}}
                <section class="rounded-2xl bg-white p-6 shadow-sm">
                    <h2 class="mb-4 font-display text-lg font-bold">Delivery address</h2>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <input name="first_name" placeholder="First name" class="field">
                        <input name="last_name" placeholder="Last name" class="field">
                        <input name="address" placeholder="Street address" class="field sm:col-span-2">
                        <input name="city" placeholder="City" class="field">
                        <input name="postal_code" placeholder="Postal code" class="field">
                    </div>
                </section>

                {{-- Payment --}}
                <section class="rounded-2xl bg-white p-6 shadow-sm">
                    <h2 class="mb-4 font-display text-lg font-bold">Payment</h2>
                    <div class="grid gap-3 sm:grid-cols-2">
                        @foreach (['card' => '💳 Credit / debit card', 'jazzcash' => '📱 JazzCash', 'easypaisa' => '📱 Easypaisa', 'cod' => '💵 Cash on delivery'] as $k => $l)
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="{{ $k }}" class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                                <span class="block rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold peer-checked:border-emerald-900 peer-checked:bg-emerald-50">{{ $l }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div data-panel="card" class="mt-5 grid gap-4 sm:grid-cols-2">
                        <input id="card-number" name="card_number" inputmode="numeric" maxlength="19" placeholder="Card number" class="field sm:col-span-2">
                        <input name="card_name" placeholder="Name on card" class="field sm:col-span-2">
                        <input id="card-expiry" name="card_expiry" inputmode="numeric" maxlength="5" placeholder="MM/YY" class="field">
                        <input name="card_cvc" inputmode="numeric" maxlength="4" placeholder="CVC" class="field">
                    </div>
                    <div data-panel="wallet" class="mt-5 hidden">
                        <input name="wallet_number" type="tel" placeholder="Mobile account number" class="field">
                        <p class="mt-2 text-sm text-slate-500">You'll get a prompt on your phone to approve the payment.</p>
                    </div>
                    <p data-panel="cod" class="mt-5 hidden text-sm text-slate-500">Pay in cash when your order arrives. A Rs 150 handling fee may apply.</p>
                </section>
            </div>

            {{-- Summary --}}
            <aside class="lg:col-span-2">
                <div class="sticky top-24 rounded-2xl bg-white p-6 shadow-sm">
                    <h2 class="mb-4 font-display text-lg font-bold">Order summary</h2>

                    @foreach ([['🎧', 'Wireless Earbuds Pro', 'Midnight × 1', 'Rs 8,999', 'from-sky-200 to-indigo-300'], ['👛', 'Leather Wallet', 'Brown × 1', 'Rs 2,500', 'from-amber-200 to-orange-300']] as [$i, $n, $m, $p, $t])
                        <div class="flex items-center gap-3 border-b border-slate-100 py-3">
                            <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br {{ $t }} text-2xl">{{ $i }}</span>
                            <div class="flex-1"><p class="text-sm font-semibold">{{ $n }}</p><p class="text-xs text-slate-500">{{ $m }}</p></div>
                            <p class="text-sm font-semibold">{{ $p }}</p>
                        </div>
                    @endforeach

                    <div class="mt-4 flex gap-2">
                        <input id="promo" name="promo_code" placeholder="Promo code" class="field flex-1">
                        <button type="button" id="promo-btn" class="rounded-xl bg-slate-900 px-4 text-sm font-semibold text-white hover:bg-slate-700">Apply</button>
                    </div>
                    <p id="promo-msg" class="mt-2 hidden text-xs"></p>

                    <dl class="mt-5 space-y-2 text-sm">
                        <div class="flex justify-between"><dt class="text-slate-500">Subtotal</dt><dd id="subtotal">Rs 11,499</dd></div>
                        <div id="discount-row" class="hidden justify-between text-emerald-700"><dt>Discount (10%)</dt><dd id="discount"></dd></div>
                        <div class="flex justify-between"><dt class="text-slate-500">Shipping</dt><dd>Free</dd></div>
                        <div class="flex justify-between border-t border-slate-200 pt-3 text-base font-bold"><dt>Total</dt><dd id="total">Rs 11,499</dd></div>
                    </dl>

                    <button id="place-order" class="mt-6 w-full rounded-full bg-emerald-950 py-4 font-bold text-lime-300 hover:bg-emerald-900">Place order</button>
                    <p class="mt-3 text-center text-xs text-slate-500">🔒 Your payment details are encrypted.</p>
                </div>
            </aside>
        </form>
    </div>

    {{-- Success modal --}}
    <div id="success" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/60 p-4">
        <div class="w-full max-w-sm rounded-3xl bg-white p-8 text-center shadow-2xl">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-lime-200 text-3xl">✓</div>
            <h2 class="mt-4 font-display text-2xl font-extrabold">Order placed</h2>
            <p class="mt-2 text-sm text-slate-500">Thanks! Your order <span id="order-no" class="font-semibold text-slate-800"></span> is confirmed. We'll email you tracking details.</p>
            <a href="{{ route('home') }}" class="mt-6 block rounded-full bg-emerald-950 py-3 font-bold text-lime-300">Continue shopping</a>
        </div>
    </div>

    @push('scripts')
    <style type="text/tailwindcss">
        @layer components {
            .field { @apply w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-emerald-700 focus:outline-none focus:ring-1 focus:ring-emerald-700; }
            .field.invalid { @apply border-red-500; }
        }
    </style>
    <script>
        $(function () {
            const subtotal = 11499;
            let discount = 0;
            const fmt = n => 'Rs ' + n.toLocaleString('en-US');

            function totals() {
                $('#discount-row').toggleClass('hidden flex', false).addClass(discount ? 'flex' : 'hidden');
                $('#discount').text('− ' + fmt(discount));
                $('#total').text(fmt(subtotal - discount));
            }

            // Promo code
            $('#promo-btn').on('click', function () {
                const ok = $('#promo').val().trim().toUpperCase() === 'WELCOME10';
                discount = ok ? Math.round(subtotal * 0.1) : 0;
                $('#promo-msg').removeClass('hidden text-red-600 text-emerald-700')
                    .addClass(ok ? 'text-emerald-700' : 'text-red-600')
                    .text(ok ? 'Code applied.' : 'That code isn\'t valid.');
                totals();
            });

            // Payment method panels
            $('input[name=payment_method]').on('change', function () {
                const v = this.value;
                $('[data-panel]').addClass('hidden');
                $('[data-panel=' + (v === 'card' ? 'card' : v === 'cod' ? 'cod' : 'wallet') + ']').removeClass('hidden');
            });

            // Card formatting
            $('#card-number').on('input', function () {
                this.value = this.value.replace(/\D/g, '').slice(0, 16).replace(/(.{4})/g, '$1 ').trim();
            });
            $('#card-expiry').on('input', function () {
                let v = this.value.replace(/\D/g, '').slice(0, 4);
                this.value = v.length > 2 ? v.slice(0, 2) + '/' + v.slice(2) : v;
            });

            // Place order (basic required check on visible fields)
            $('#place-order').on('click', function () {
                let valid = true;
                $('.field').not('#promo').filter(':visible').each(function () {
                    const empty = !$(this).val().trim();
                    $(this).toggleClass('invalid', empty);
                    if (empty) valid = false;
                });
                if (!valid) { toast('Please fill in the highlighted fields'); return; }

                $('#order-no').text('#N' + Math.floor(10000 + Math.random() * 90000));
                $('#success').removeClass('hidden').addClass('flex');
                localStorage.setItem('nook_cart', '0');
            });
            $('.field').on('input', function () { $(this).removeClass('invalid'); });
        });
    </script>
    @endpush
</x-store-layout>
