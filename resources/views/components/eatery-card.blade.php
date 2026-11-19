@props(['eatery'])

@php
    $priceLabels = ['budget' => '₱', 'mid' => '₱₱', 'splurge' => '₱₱₱'];
@endphp

<article class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <div class="flex items-start justify-between gap-3">
        <a href="{{ route('eateries.show', $eatery) }}" class="text-xl font-bold hover:text-amber-700">
            {{ $eatery->name }}
        </a>
        @if (! $eatery->is_open)
            <span class="rounded-full bg-slate-200 px-2 py-1 text-xs font-semibold">Closed</span>
        @endif
    </div>

    <p class="mt-2 text-sm text-slate-600">
        <a href="{{ route('districts.show', $eatery->district) }}" class="hover:underline">
            {{ $eatery->district->name }}
        </a>
        <span class="ml-2 font-semibold">{{ $priceLabels[$eatery->price_range] ?? $eatery->price_range }}</span>
    </p>

    @if ($eatery->specialty)
        <p class="mt-2 text-slate-700">{{ $eatery->specialty }}</p>
    @endif

    <div class="mt-3 flex flex-wrap gap-2">
        @foreach ($eatery->features as $feature)
            <a href="{{ route('eateries.index', ['feature' => $feature->name]) }}" class="rounded-full bg-amber-100 px-2 py-1 text-xs font-semibold text-amber-900">
                {{ $feature->name }}
            </a>
        @endforeach
    </div>

    <div class="mt-4">
        @if ($eatery->reviews_count > 0)
            <span class="font-semibold">{{ number_format((float) $eatery->reviews_avg_rating, 1) }} ★</span>
            <span class="text-sm text-slate-600">
                ({{ $eatery->reviews_count }} {{ Str::plural('review', $eatery->reviews_count) }})
            </span>
        @else
            <span class="text-sm text-slate-600">No reviews yet.</span>
        @endif
    </div>
</article>
