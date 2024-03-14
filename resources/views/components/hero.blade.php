<div class="ct-main__hero-heading">
    <img src="{{ asset('storage/' . $page->hero) }}" alt="{{ $page->title }} Image">
    <div class="ct-main__hero-overlay">
        <h1>{{ $page->title }}</h1>
        @if($page->sub_title)
            <h2>{{ $page->sub_title }}</h2>
        @endif
    </div>
</div>
