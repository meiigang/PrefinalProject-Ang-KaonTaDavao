@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">{{ $user->name }}</h1>
    <p class="mt-2 text-slate-600">
        {{ $user->reviews_count }} {{ Str::plural('review', $user->reviews_count) }} written
    </p>
    <div class="mt-6 space-y-4">
        @foreach ($user->reviews as $review)
            <article class="rounded-xl bg-white p-5 shadow">
                <a href="{{ route('eateries.show', $review->eatery) }}" class="font-bold hover:underline">
                    {{ $review->eatery->name }}
                </a>
                <div><x-rating :rating="$review->rating" /></div>
                <p class="mt-2">{{ $review->body }}</p>
            </article>
        @endforeach
    </div>
@endsection
