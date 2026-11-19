<nav class="bg-slate-950 text-white">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
        <a href="{{ route('home') }}" class="font-bold">Kaon Ta! Davao Ang's Food Guide</a>
        <div class="flex gap-5 text-sm">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('eateries.index') }}">Eateries</a>
            <a href="{{ route('districts.index') }}">Districts</a>
            <a href="{{ route('eateries.create') }}">Add Eatery</a>
        </div>
    </div>
</nav>
