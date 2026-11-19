@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Eateries</h1>

    <form method="GET" action="{{ route('eateries.index') }}" class="mt-6 grid gap-3 rounded-xl bg-white p-4 shadow md:grid-cols-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Name or specialty" class="rounded border p-2">
        <select name="district" class="rounded border p-2">
            <option value="">All districts</option>
            @foreach ($districts as $district)
                <option value="{{ $district->id }}" @selected(request('district') == $district->id)>{{ $district->name }}</option>
            @endforeach
        </select>
        <select name="feature" class="rounded border p-2">
            <option value="">All features</option>
            @foreach ($features as $feature)
                <option value="{{ $feature->name }}" @selected(request('feature') == $feature->name)>{{ $feature->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="rounded bg-amber-500 px-4 py-2 font-semibold">Filter</button>
    </form>

    <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($eateries as $eatery)
            <x-eatery-card :eatery="$eatery" />
        @empty
            <p class="col-span-full">No eateries match your filters.</p>
        @endforelse
    </div>
    @if ($eateries->hasPages())
        <div class="mt-10 flex flex-col items-center gap-4 border-t border-orange-200 pt-6">
            {{ $eateries->onEachSide(1)->links() }}
        </div>
    @endif
@endsection
