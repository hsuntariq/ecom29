<x-layout title="Dashboard">
    <x-page-header title="Dashboard" subtitle="Here's how your store is doing this week.">
        <button class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Export
            report</button>
    </x-page-header>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <x-stat-card label="Revenue" value="Rs 482,300" change="12.4%" />
        <x-stat-card label="Orders" value="1,284" change="8.1%" />
        <x-stat-card label="Customers" value="3,920" change="3.2%" />
        <x-stat-card label="Refunds" value="14" change="2.0%" :up="false" />
    </div>

    <div class="mt-6 grid gap-6 xl:grid-cols-3">
        <div class="rounded-xl bg-white p-5 shadow-sm xl:col-span-2">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="font-semibold">Sales overview</h2>
                <div class="flex gap-1 text-xs">
                    <button data-range="week"
                        class="range-btn rounded-md bg-indigo-600 px-3 py-1 text-white">Week</button>
                    <button data-range="month" class="range-btn rounded-md bg-slate-100 px-3 py-1">Month</button>
                </div>
            </div>
            <div id="bars" class="flex h-56 items-end gap-3"></div>
            <div id="bar-labels" class="mt-2 flex gap-3 text-center text-xs text-slate-500"></div>
        </div>

        <div class="rounded-xl bg-white p-5 shadow-sm">
            <h2 class="mb-4 font-semibold">Top products</h2>
            <ul class="space-y-4 text-sm">
                @foreach ([['Wireless Earbuds', 214], ['Leather Wallet', 168], ['Running Shoes', 131], ['Steel Bottle', 97]] as [$name, $sold])
                    <li class="flex items-center justify-between">
                        <span>{{ $name }}</span>
                        <span class="font-medium text-slate-500">{{ $sold }} sold</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="mb-3 font-semibold">Recent orders</h2>
        <x-table :headings="['Order', 'Customer', 'Total', 'Status']">
            @foreach ([['#1042', 'Bilal Ahmed', 'Rs 4,500', 'Delivered'], ['#1041', 'Sana Gul', 'Rs 12,990', 'Shipped'], ['#1040', 'Usman Ali', 'Rs 2,300', 'Pending'], ['#1039', 'Hina Noor', 'Rs 7,800', 'Cancelled']] as $o)
                <tr>
                    <td class="px-4 py-3 font-medium">{{ $o[0] }}</td>
                    <td class="px-4 py-3">{{ $o[1] }}</td>
                    <td class="px-4 py-3">{{ $o[2] }}</td>
                    <td class="px-4 py-3"><x-status-badge :status="$o[3]" /></td>
                </tr>
            @endforeach
        </x-table>
    </div>

    @push('scripts')
        <script>
            $(function() {
                const data = {
                    week: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        values: [40, 65, 50, 80, 95, 70, 55]
                    },
                    month: {
                        labels: ['W1', 'W2', 'W3', 'W4'],
                        values: [60, 75, 55, 90]
                    }
                };

                function render(range) {
                    const d = data[range];
                    $('#bars').empty();
                    $('#bar-labels').empty();
                    $.each(d.values, function(i, v) {
                        $('#bars').append(
                            `<div class="flex-1 rounded-t-md bg-indigo-500 transition-all hover:bg-indigo-600" style="height:${v}%" title="${v}k"></div>`
                            );
                        $('#bar-labels').append(`<div class="flex-1">${d.labels[i]}</div>`);
                    });
                }

                $('.range-btn').on('click', function() {
                    $('.range-btn').removeClass('bg-indigo-600 text-white').addClass('bg-slate-100');
                    $(this).addClass('bg-indigo-600 text-white').removeClass('bg-slate-100');
                    render($(this).data('range'));
                });

                render('week');
            });
        </script>
    @endpush
</x-layout>
