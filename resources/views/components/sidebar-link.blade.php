@props(['href', 'active' => false, 'icon'])

<a href="{{ $href }}"
    class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition {{ $active ? 'bg-indigo-500 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" />
    </svg>
    {{ $slot }}
</a>
