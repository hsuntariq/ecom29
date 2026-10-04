<x-layout title="Orders">
    <x-page-header title="Orders" subtitle="Track and fulfil customer orders." />

    <div class="mb-4 flex flex-wrap gap-2">
        @foreach (['All', 'Pending', 'Shipped', 'Delivered', 'Cancelled'] as $i => $tab)
            <button data-tab="{{ $tab }}"
                class="tab-btn rounded-full px-4 py-1.5 text-sm {{ $i === 0 ? 'bg-indigo-600 text-white' : 'bg-white hover:bg-slate-200' }}">
                {{ $tab }}
            </button>
        @endforeach
    </div>

    <x-table :headings="['Order', 'Customer', 'Date', 'Items', 'Total', 'Status']">
        @foreach ([['#1042', 'Bilal Ahmed', '02 Oct 2026', 2, 'Rs 4,500', 'Delivered'], ['#1041', 'Sana Gul', '02 Oct 2026', 1, 'Rs 12,990', 'Shipped'], ['#1040', 'Usman Ali', '01 Oct 2026', 3, 'Rs 2,300', 'Pending'], ['#1039', 'Hina Noor', '30 Sep 2026', 1, 'Rs 7,800', 'Cancelled'], ['#1038', 'Zain Malik', '29 Sep 2026', 4, 'Rs 15,400', 'Delivered']] as $o)
            <tr class="order-row" data-status="{{ $o[5] }}">
                <td class="px-4 py-3 font-medium">{{ $o[0] }}</td>
                <td class="px-4 py-3">{{ $o[1] }}</td>
                <td class="px-4 py-3">{{ $o[2] }}</td>
                <td class="px-4 py-3">{{ $o[3] }}</td>
                <td class="px-4 py-3">{{ $o[4] }}</td>
                <td class="px-4 py-3"><x-status-badge :status="$o[5]" /></td>
            </tr>
        @endforeach
    </x-table>

    @push('scripts')
        <script>
            $(function() {
                $('.tab-btn').on('click', function() {
                    $('.tab-btn').removeClass('bg-indigo-600 text-white').addClass('bg-white');
                    $(this).addClass('bg-indigo-600 text-white').removeClass('bg-white');

                    const tab = $(this).data('tab');
                    $('.order-row').each(function() {
                        $(this).toggle(tab === 'All' || $(this).data('status') === tab);
                    });
                });
            });
        </script>
    @endpush
</x-layout>
