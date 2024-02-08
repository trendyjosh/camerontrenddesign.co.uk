<x-layout>
    <div class="ct-main__hero-heading">
        <img src="{{ asset($project->hero) }}" alt="{{ $project->title }} Image">
        <div class="ct-main__hero-overlay">
            <h1>{{ $project->title }}</h1>
        </div>
    </div>
    <section class="ct-portfolio">
        <div class="ct-portfolio__content">
            @foreach ( $project->content as $content )
            <div class="ct-portfolio__content_item <?= $content->style . " " . $content->size; ?>">
                @if( $content->content != "" )
                    <p>{{ $content->content }}</p>
                @endif
                @if ( $content->source != "" )
                <img src="{{ asset($content->source) }}"
                     alt="{{ $content->caption }}">
                @endif
            </div>
            @endforeach
        </div>

        <div class="ct-portfolio__links">
            @php
            $links = $project->getProjectLinks();
            @endphp
            @isset( $links['previous'] )
            <a href="{{ route('projects.show', $links['previous']->slug) }}"
               class="ct-portfolio__link link-left">
                <span>Previous</span>
                    {{ $links['previous']->title }}
            </a>
            @endisset
            @isset( $links['next'] )
            <a href="{{ route('projects.show', $links['next']->slug) }}" class="ct-portfolio__link link-right">
                <span>Next</span>
                    {{ $links['next']->title }}
            </a>
            @endisset
        </div>
    </section>
</x-layout>
