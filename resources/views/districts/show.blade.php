@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">{{ $district->name }}</h1>
    <p class="mt-2 text-slate-600">
        {{ $district->reviews_count }} {{ Str::plural('review', $district->reviews_count) }} in {{ $district->name }}
    </p>
    <div class="mt-6 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($district->eateries as $eatery)
            <x-eatery-card :eatery="$eatery" />
        @endforeach
    </div>
@endsection
