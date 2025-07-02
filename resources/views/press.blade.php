<x-layout>
    <x-hero :page="$page" />
    <section class="ct-article">
        <div class="ct-title">
            <h2>Press Features</h2>
        </div>
        <div class="ct-article__container">
            @foreach($articles as $article)
            <div class="ct-article__item">
                <div class="ct-article__item-image">
                    <img class="increase" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                </div>
                <div class="ct-article__item-text">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->description }}</p>
                </div>
                @if( $article->link )
                <a class="ct-btn" href="{{ $article->link }}">Read more</a>
                @endif
            </div>
            @endforeach
        </div>
    </section>
</x-layout>