<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} · Shopdesk</title>

    {{-- CDNs --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-slate-100 text-slate-800 antialiased">
    <div class="flex min-h-screen">
        <x-sidebar />

        {{-- mobile overlay --}}
        <div id="overlay" class="fixed inset-0 z-30 hidden bg-slate-900/50 lg:hidden"></div>

        <div class="flex min-w-0 flex-1 flex-col">
            <x-topbar />
            <main class="flex-1 p-4 sm:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        $(function() {
            // Sidebar toggle (mobile)
            $('#menu-btn, #overlay').on('click', function() {
                $('#sidebar').toggleClass('-translate-x-full');
                $('#overlay').toggleClass('hidden');
            });

            // Dropdowns
            $('[data-dropdown]').on('click', function(e) {
                e.stopPropagation();
                $('#' + $(this).data('dropdown')).toggleClass('hidden');
            });
            $(document).on('click', () => $('.dropdown-menu').addClass('hidden'));
        });
    </script>
    @stack('scripts')
</body>

</html>
