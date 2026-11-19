@if (session('success'))
    <div class="bg-emerald-100 px-4 py-3 text-center font-semibold text-emerald-900">
        {{ session('success') }}
    </div>
@endif
