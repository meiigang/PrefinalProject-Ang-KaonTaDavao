@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center">
        <div class="flex items-center gap-2 rounded-2xl border border-orange-200 bg-white p-2 shadow-lg">
            @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                    class="inline-flex min-h-10 cursor-not-allowed items-center rounded-xl bg-stone-100 px-4 text-sm font-bold text-stone-400">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="inline-flex min-h-10 items-center rounded-xl bg-orange-100 px-4 text-sm font-bold text-orange-900 transition hover:bg-orange-500 hover:text-white">
                    Previous
                </a>
            @endif

            <div class="hidden items-center gap-1 sm:flex">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="inline-flex h-10 w-10 items-center justify-center text-sm font-bold text-stone-400">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-orange-500 text-sm font-black text-white shadow-md">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-sm font-bold text-stone-700 transition hover:bg-orange-100 hover:text-orange-900"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            <span class="px-2 text-sm font-bold text-stone-500 sm:hidden">
                {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="inline-flex min-h-10 items-center rounded-xl bg-orange-500 px-4 text-sm font-bold text-white shadow-md transition hover:bg-red-500">
                    Next
                </a>
            @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}"
                    class="inline-flex min-h-10 cursor-not-allowed items-center rounded-xl bg-stone-100 px-4 text-sm font-bold text-stone-400">
                    Next
                </span>
            @endif
        </div>
    </nav>
@endif
