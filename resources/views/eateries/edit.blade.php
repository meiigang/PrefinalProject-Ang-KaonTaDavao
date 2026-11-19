@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Edit Eatery</h1>
    <form method="POST" action="{{ route('eateries.update', $eatery) }}" class="mt-6 rounded-xl bg-white p-6 shadow">
        @csrf
        @method('PUT')
        @include('eateries._form')
        <button type="submit" class="mt-6 rounded bg-amber-500 px-5 py-2 font-semibold">Update Eatery</button>
    </form>
@endsection
