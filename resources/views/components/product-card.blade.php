@props(['name', 'price', 'icon' => '🎧', 'tone' => 'from-lime-200 to-emerald-300', 'tag' => null, 'rating' => '4.8'])

<div class="group">
    {{-- Replace this block with <img src="..." class="h-full w-full object-cover"> --}}
    <a href="{{ route('product') }}" class="relative flex aspect-[4/5] items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-br {{ $tone }}">
        <span class="text-7xl transition group-hover:scale-110">{{ $icon }}</span>
        @if ($tag)
            <span class="absolute left-3 top-3 rounded-full bg-white px-3 py-1 text-xs font-bold text-emerald-950">{{ $tag }}</span>
        @endif
    </a>
    <div class="mt-3 flex items-start justify-between gap-2">
        <div>
            <a href="{{ route('product') }}" class="font-semibold hover:underline">{{ $name }}</a>
            <p class="text-sm text-slate-500">★ {{ $rating }}</p>
        </div>
        <p class="font-bold">Rs {{ $price }}</p>
    </div>
    <button class="add-to-cart mt-3 w-full rounded-full border border-emerald-950 py-2 text-sm font-semibold text-emerald-950 transition hover:bg-emerald-950 hover:text-lime-300">
        Add to cart
    </button>
</div>
