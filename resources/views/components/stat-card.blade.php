@props(['label', 'value', 'change' => null, 'up' => true])

<div class="rounded-xl bg-white p-5 shadow-sm">
    <p class="text-sm text-slate-500">{{ $label }}</p>
    <p class="mt-2 text-2xl font-semibold">{{ $value }}</p>
    @if ($change)
        <p class="mt-1 text-xs font-medium {{ $up ? 'text-emerald-600' : 'text-red-600' }}">
            {{ $up ? '▲' : '▼' }} {{ $change }} vs last week
        </p>
    @endif
</div>
