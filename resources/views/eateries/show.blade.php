@extends('layouts.app')

@section('content')
    <article>
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold">{{ $eatery->name }}</h1>
                <p class="mt-2">
                    <a href="{{ route('districts.show', $eatery->district) }}" class="underline">
                        {{ $eatery->district->name }}
                    </a>
                </p>
                @if (! $eatery->is_open)
                    <span class="mt-2 inline-block rounded-full bg-slate-200 px-3 py-1 text-sm font-semibold">Closed</span>
                @endif
            </div>
            <div class="flex gap-2">
                <a href="{{ route('eateries.edit', $eatery) }}" class="rounded bg-amber-500 px-4 py-2 font-semibold">Edit</a>
                <form method="POST" action="{{ route('eateries.destroy', $eatery) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded bg-red-600 px-4 py-2 font-semibold text-white">Delete</button>
                </form>
            </div>
        </div>

        <div class="mt-6 grid gap-6 md:grid-cols-2">
            <section class="rounded-xl bg-white p-5 shadow">
                <h2 class="text-xl font-bold">Details</h2>
                <p class="mt-3">{{ $eatery->address }}</p>
                <p class="mt-2">{{ $eatery->specialty }}</p>
                <div class="mt-3 flex flex-wrap gap-2">
                    @foreach ($eatery->features as $feature)
                        <a href="{{ route('eateries.index', ['feature' => $feature->name]) }}" class="rounded-full bg-amber-100 px-3 py-1 text-sm">
                            {{ $feature->name }}
                        </a>
                    @endforeach
                </div>
            </section>

            @if ($eatery->permit)
                <section class="rounded-xl bg-white p-5 shadow">
                    <h2 class="text-xl font-bold">Permit</h2>
                    <p class="mt-3">{{ $eatery->permit->permit_no }}</p>
                    <p>Expires {{ $eatery->permit->expires_on->format('F j, Y') }}</p>
                    @if ($eatery->permit->expires_on->isBefore(today()))
                        <p class="mt-2 font-bold text-red-600">Permit expired</p>
                    @endif
                </section>
            @endif
        </div>

        <section class="mt-8">
            <h2 class="text-2xl font-bold">Dishes</h2>
            <div class="mt-4 grid gap-3 md:grid-cols-2">
                @foreach ($eatery->dishes as $dish)
                    <div class="flex justify-between rounded-xl bg-white p-4 shadow">
                        <div>
                            <strong>{{ $dish->name }}</strong>
                            @if ($dish->is_bestseller)
                                <span class="ml-2 rounded bg-amber-200 px-2 py-1 text-xs font-semibold">Bestseller</span>
                            @endif
                        </div>
                        <span>₱{{ number_format((float) $dish->price, 2) }}</span>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="mt-8">
            <h2 class="text-2xl font-bold">Reviews</h2>
            <div class="mt-4 space-y-4">
                @foreach ($eatery->reviews as $review)
                    <article class="rounded-xl bg-white p-5 shadow">
                        <a href="{{ route('reviewers.show', $review->user) }}" class="font-bold underline">
                            {{ $review->user->name }}
                        </a>
                        <div class="mt-1"><x-rating :rating="$review->rating" /></div>
                        <p class="mt-2">{{ $review->body }}</p>
                        <p class="mt-2 text-sm text-slate-500">{{ $review->created_at->format('F j, Y') }}</p>
                        <form method="POST" action="{{ route('reviews.destroy', $review) }}" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-semibold text-red-600">Delete</button>
                        </form>
                    </article>
                @endforeach
            </div>

            @if ($eatery->is_open)
                <section class="mt-6 rounded-xl bg-white p-5 shadow">
                    <h3 class="text-xl font-bold">Write a Review</h3>
                    <form method="POST" action="{{ route('eateries.reviews.store', $eatery) }}" class="mt-4">
                        @csrf
                        <p class="text-sm text-slate-600">Review form placeholder.</p>
                    </form>
                </section>
            @else
                <p class="mt-6 font-semibold">This eatery is closed. Reviews are paused.</p>
            @endif
        </section>
    </article>
@endsection
