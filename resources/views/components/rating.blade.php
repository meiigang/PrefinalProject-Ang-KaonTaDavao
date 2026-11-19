@props(['rating'])

<span aria-label="{{ $rating }} out of 5 stars" class="tracking-wide text-amber-500">
    @for ($star = 1; $star <= 5; $star++)
        {{ $star <= round($rating) ? '★' : '☆' }}
    @endfor
</span>
