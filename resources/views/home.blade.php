@extends('layouts.app')

@section('title', "Kaon Ta! Davao Ang's Food Guide")

@section('content')
    <div class="overflow-hidden rounded-3xl bg-gradient-to-r from-orange-500 via-amber-400 to-yellow-300 p-7 shadow-xl">
        <p class="text-sm font-extrabold uppercase tracking-[0.25em] text-orange-950/70">Davao food guide</p>
        <h1 class="mt-2 text-4xl font-black tracking-tight text-orange-950">Kaon Ta! Davao</h1>
        <p class="mt-2 max-w-xl text-orange-950/80">Find beloved carinderias, local specialties, and the places worth coming back to.</p>
    </div>

    <div class="mt-6 grid gap-5 md:grid-cols-3">
        <div class="flex items-center justify-between rounded-2xl border border-orange-200 bg-gradient-to-br from-orange-100 to-orange-200 p-6 shadow-md">
            <div>
                <p class="text-sm font-bold uppercase tracking-wider text-orange-800">Eateries</p>
                <strong class="mt-1 block text-4xl font-black text-orange-950">{{ $eateryCount }}</strong>
            </div>
            <span class="rounded-full bg-orange-500 px-4 py-3 text-2xl shadow-sm" aria-hidden="true">🍲</span>
        </div>
        <div class="flex items-center justify-between rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-100 to-yellow-200 p-6 shadow-md">
            <div>
                <p class="text-sm font-bold uppercase tracking-wider text-amber-800">Districts</p>
                <strong class="mt-1 block text-4xl font-black text-amber-950">{{ $districtCount }}</strong>
            </div>
            <span class="rounded-full bg-amber-500 px-4 py-3 text-2xl shadow-sm" aria-hidden="true">📍</span>
        </div>
        <div class="flex items-center justify-between rounded-2xl border border-rose-200 bg-gradient-to-br from-rose-100 to-red-200 p-6 shadow-md">
            <div>
                <p class="text-sm font-bold uppercase tracking-wider text-rose-800">Reviews</p>
                <strong class="mt-1 block text-4xl font-black text-rose-950">{{ $reviewCount }}</strong>
            </div>
            <span class="rounded-full bg-rose-400 px-4 py-3 text-2xl shadow-sm" aria-hidden="true">★</span>
        </div>
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
