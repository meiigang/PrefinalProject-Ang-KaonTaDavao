@extends('layouts.app')

@section('title', "Kaon Ta! Davao Ang's Food Guide")

@section('content')
    <h1 class="text-3xl font-bold">Kaon Ta! Davao</h1>

    <div class="mt-6 grid gap-4 md:grid-cols-3">
        <div class="rounded-xl bg-white p-5 shadow"><strong>{{ $eateryCount }}</strong> Eateries</div>
        <div class="rounded-xl bg-white p-5 shadow"><strong>{{ $districtCount }}</strong> Districts</div>
        <div class="rounded-xl bg-white p-5 shadow"><strong>{{ $reviewCount }}</strong> Reviews</div>
    </div>

    <section class="mt-10">
        <h2 class="text-2xl font-bold">Top Rated</h2>
        <div class="mt-4 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($topEateries as $eatery)
                <x-eatery-card :eatery="$eatery" />
            @endforeach
        </div>
    </section>
@endsection
