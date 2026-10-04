<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Nook' }} · Nook</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;700;800&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- CDNs --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: {
            display: ['"Bricolage Grotesque"', 'sans-serif'],
            sans: ['"DM Sans"', 'sans-serif'],
        } } } }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased">
    <x-store-navbar />

    <main>{{ $slot }}</main>

    <x-store-footer />

    {{-- Toast --}}
    <div id="toast" class="pointer-events-none fixed bottom-6 left-1/2 z-50 -translate-x-1/2 translate-y-20 rounded-full bg-emerald-950 px-5 py-3 text-sm font-medium text-lime-300 opacity-0 shadow-lg transition-all duration-300"></div>

    <script>
        $(function () {
            let count = parseInt(localStorage.getItem('nook_cart') || '0');
            const setCount = n => {
                count = n;
                localStorage.setItem('nook_cart', n);
                $('.cart-count').text(n).toggleClass('hidden', n === 0);
            };
            setCount(count);

            window.toast = function (msg) {
                $('#toast').text(msg).removeClass('translate-y-20 opacity-0');
                setTimeout(() => $('#toast').addClass('translate-y-20 opacity-0'), 2200);
            };

            $(document).on('click', '.add-to-cart', function (e) {
                e.preventDefault();
                setCount(count + (parseInt($(this).attr('data-qty')) || 1));
                toast('Added to your cart');
            });

            $('#nav-toggle').on('click', () => $('#mobile-nav').toggleClass('hidden'));
        });
    </script>
    @stack('scripts')
</body>
</html>
