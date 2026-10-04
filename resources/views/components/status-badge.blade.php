@props(['status'])

@php
    $map = [
        'Delivered' => 'bg-emerald-100 text-emerald-700',
        'Shipped' => 'bg-blue-100 text-blue-700',
        'Pending' => 'bg-amber-100 text-amber-700',
        'Cancelled' => 'bg-red-100 text-red-700',
        'Active' => 'bg-emerald-100 text-emerald-700',
        'Draft' => 'bg-slate-200 text-slate-600',
        'Out of stock' => 'bg-red-100 text-red-700',
    ];
@endphp

<span
    class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $map[$status] ?? 'bg-slate-100 text-slate-600' }}">{{ $status }}</span>
