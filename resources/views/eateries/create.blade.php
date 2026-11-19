@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Add Eatery</h1>
    <form method="POST" action="{{ route('eateries.store') }}" class="mt-6 rounded-xl bg-white p-6 shadow">
        @csrf
        @include('eateries._form')
        <button type="submit" class="mt-6 rounded bg-amber-500 px-5 py-2 font-semibold">Add Eatery</button>
    </form>
@endsection
