@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Districts</h1>
    <div class="mt-6 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($districts as $district)
            <a href="{{ route('districts.show', $district) }}" class="rounded-xl bg-white p-5 shadow">
                <strong>{{ $district->name }}</strong>
                <span class="text-slate-600">({{ $district->eateries_count }} eateries)</span>
            </a>
        @endforeach
    </div>
@endsection
