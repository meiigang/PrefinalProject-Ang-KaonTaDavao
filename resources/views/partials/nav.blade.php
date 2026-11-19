<nav class="border-b border-orange-900/10 bg-gradient-to-r from-orange-950 via-red-950 to-amber-950 text-white shadow-lg">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-3">
        <a href="{{ route('home') }}" class="leading-tight">
            <span class="block text-lg font-extrabold tracking-wide">Kaon Ta! Davao</span>
            <span class="block text-sm font-medium text-orange-200">Ang's Food Guide</span>
        </a>
        <div class="flex flex-wrap gap-2 text-sm">
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'bg-orange-400 text-orange-950 shadow-md' : 'bg-white/10 text-white hover:bg-white/20' }} rounded-full px-4 py-2 font-bold transition">
                Home
            </a>
            <a href="{{ route('eateries.index') }}"
                class="{{ request()->routeIs('eateries.index') || request()->routeIs('eateries.show') ? 'bg-amber-400 text-amber-950 shadow-md' : 'bg-white/10 text-white hover:bg-white/20' }} rounded-full px-4 py-2 font-bold transition">
                Eateries
            </a>
            <a href="{{ route('districts.index') }}"
                class="{{ request()->routeIs('districts.*') ? 'bg-yellow-400 text-yellow-950 shadow-md' : 'bg-white/10 text-white hover:bg-white/20' }} rounded-full px-4 py-2 font-bold transition">
                Districts
            </a>
            <a href="{{ route('eateries.create') }}"
                class="{{ request()->routeIs('eateries.create') || request()->routeIs('eateries.edit') ? 'bg-rose-400 text-rose-950 shadow-md' : 'bg-orange-600 text-white hover:bg-orange-500' }} rounded-full px-4 py-2 font-bold transition">
                Add Eatery
            </a>
        </div>
    </div>
</nav>
