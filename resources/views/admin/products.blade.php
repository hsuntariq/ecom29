<x-layout title="Products">
    <x-page-header title="Products" subtitle="Manage your catalogue and stock.">
        <button id="add-product-btn"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Add
            product</button>
    </x-page-header>

    <div class="mb-4 flex flex-wrap gap-3">
        <input id="product-filter" type="search" placeholder="Filter by name…"
            class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none sm:w-64">
        <select id="status-filter" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm">
            <option value="">All statuses</option>
            <option>Active</option>
            <option>Draft</option>
            <option>Out of stock</option>
        </select>
    </div>

    <x-table :headings="['Product', 'Category', 'Price', 'Stock', 'Status', '']">
        @foreach ([['Wireless Earbuds', 'Electronics', 'Rs 8,999', 54, 'Active'], ['Leather Wallet', 'Accessories', 'Rs 2,500', 120, 'Active'], ['Running Shoes', 'Footwear', 'Rs 11,200', 0, 'Out of stock'], ['Steel Bottle', 'Home', 'Rs 1,450', 300, 'Active'], ['Canvas Backpack', 'Accessories', 'Rs 4,800', 18, 'Draft']] as $p)
            <tr class="product-row">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-slate-200"></div>
                        <span class="product-name font-medium">{{ $p[0] }}</span>
                    </div>
                </td>
                <td class="px-4 py-3">{{ $p[1] }}</td>
                <td class="px-4 py-3">{{ $p[2] }}</td>
                <td class="px-4 py-3">{{ $p[3] }}</td>
                <td class="product-status px-4 py-3"><x-status-badge :status="$p[4]" /></td>
                <td class="px-4 py-3 text-right">
                    <button class="text-indigo-600 hover:underline">Edit</button>
                    <button class="delete-btn ml-3 text-red-600 hover:underline">Delete</button>
                </td>
            </tr>
        @endforeach
    </x-table>

    {{-- Add product modal --}}
    <div id="product-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 p-4">
        <form id="product-form" method="POST" action="/add-product" enctype="multipart/form-data" novalidate
            class="max-h-[90vh] w-full max-w-lg overflow-y-auto rounded-xl bg-white p-6 shadow-xl">
            @csrf
            <h2 class="mb-4 text-lg font-semibold">Add product</h2>

            <div class="space-y-4">
                <div>
                    <label for="p-name" class="mb-1 block text-sm font-medium">Product name</label>
                    <input id="p-name" type="text" name="name" required placeholder="e.g. Wireless Earbuds"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="p-price" class="mb-1 block text-sm font-medium">Price (Rs)</label>
                        <input id="p-price" type="number" name="price" min="0" step="0.01" required
                            placeholder="0.00"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                    </div>
                    <div>
                        <label for="p-stock" class="mb-1 block text-sm font-medium">Stock</label>
                        <input id="p-stock" type="number" name="stock" min="0" required placeholder="0"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label for="p-description" class="mb-1 block text-sm font-medium">Description</label>
                    <textarea id="p-description" rows="3" name="description" placeholder="Short description"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"></textarea>
                </div>

                {{-- Image --}}
                <div>
                    <span class="mb-1 block text-sm font-medium">Product image</span>
                    <label id="image-drop" for="product-image"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-slate-300 px-4 py-6 text-center text-sm text-slate-500 hover:border-indigo-400 hover:bg-indigo-50">
                        <svg class="mb-2 h-8 w-8 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.6"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16l4-4 4 4 4-6 4 6M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1zm4-12h.01" />
                        </svg>
                        <span class="font-medium text-indigo-600">Choose an image</span>
                        <span class="text-xs">PNG, JPG or WEBP, up to 2 MB</span>
                    </label>
                    <input id="product-image" type="file" name="image" class="hidden">
                    <p id="image-error" class="mt-2 hidden text-xs text-red-600"></p>

                    <div id="image-preview"
                        class="relative mt-3 hidden h-48 overflow-hidden rounded-lg border border-slate-200">
                        <img id="preview-img" src="" alt="Preview" class="h-full w-full object-cover">
                        <button type="button" id="remove-image" aria-label="Remove image"
                            class="absolute right-2 top-2 flex h-7 w-7 items-center justify-center rounded-full bg-slate-900/70 text-white hover:bg-red-600">&times;</button>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <button type="button"
                    class="close-modal rounded-lg px-4 py-2 text-sm hover:bg-slate-100">Cancel</button>
                <button type="submit"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Save
                    product</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            $(function() {
                function applyFilters() {
                    const q = $('#product-filter').val().toLowerCase();
                    const s = $('#status-filter').val();
                    $('.product-row').each(function() {
                        const nameOk = $(this).find('.product-name').text().toLowerCase().includes(q);
                        const statusOk = !s || $(this).find('.product-status').text().trim() === s;
                        $(this).toggle(nameOk && statusOk);
                    });
                }
                $('#product-filter').on('input', applyFilters);
                $('#status-filter').on('change', applyFilters);

                $('#add-product-btn').on('click', () => $('#product-modal').removeClass('hidden').addClass('flex'));

                function clearImage() {
                    $('#product-image').val('');
                    $('#preview-img').attr('src', '');
                    $('#image-preview').addClass('hidden');
                    $('#image-drop').removeClass('hidden');
                    $('#image-error').addClass('hidden');
                }

                function closeModal() {
                    $('#product-modal').addClass('hidden').removeClass('flex');
                    $('#product-form')[0].reset();
                    clearImage();
                }
                $('.close-modal').on('click', closeModal);

                // Single image + preview
                $('#product-image').on('change', function() {
                    const file = this.files[0];
                    if (!file) return;

                    let error = '';
                    if (!file.type.startsWith('image/')) error = 'Please choose an image file.';
                    else if (file.size > 2 * 1024 * 1024) error = 'Image must be 2 MB or smaller.';

                    if (error) {
                        clearImage();
                        $('#image-error').removeClass('hidden').text(error);
                        return;
                    }

                    $('#image-error').addClass('hidden');
                    $('#preview-img').attr('src', URL.createObjectURL(file));
                    $('#image-preview').removeClass('hidden');
                    $('#image-drop').addClass('hidden');
                });

                $('#remove-image').on('click', clearImage);

                // Design-only submit: validate, then close. Remove preventDefault when the backend is ready.


                $('.delete-btn').on('click', function() {
                    if (confirm('Delete this product?')) {
                        $(this).closest('tr').fadeOut(200, function() {
                            $(this).remove();
                        });
                    }
                });
            });
        </script>
    @endpush
</x-layout>
