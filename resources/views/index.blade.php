<x-layout>
    <div class="ct-header__hero">
        <img src="{{ asset('media/pink_slide.jpg') }}" alt="Flowers" class="ct-header__hero-image">
        <div class="ct-header__hero-title">
            <h2>Cameron Trend</h2>
            <h1>Garden Design</h1>
            <i class="fa-solid fa-computer-mouse"></i>
        </div>
    </div>
    <section>
        <div class="ct-text">
            <p>Imagine stepping into a garden that feels calm, considered and completely tailored to the way you live.
                Cameron creates modern outdoor spaces that balance beauty with purpose, blending an artistic eye with
                deep horticultural knowledge. Based in Kent and working throughout the South East, his work focuses on
                gardens that enrich daily life, whether that means a quiet retreat after work, a space to entertain or
                planting that brings joy through the seasons.</p>
            <p>Explore Cameron's portfolio to see how thoughtful design can reshape an outdoor space, and feel free to
                get in touch to discuss your own project.</p>
        </div>
    </section>
    <section class="ct-portfolio" id="projects">
        <div class="ct-title">
            <h2>Selected Works</h2>
        </div>
        <div class="ct-portfolio__container">
            @foreach ($projects as $project)
                <a class="ct-portfolio__item" href="{{ route('projects.show', $project->slug) }}">
                    <div class="ct-portfolio__item-image">
                        <img class="increase" src="{{ asset('storage/' . $project->thumb) }}"
                            alt="{{ $project->title }}">
                        <div class="ct-portfolio__item-text">
                            <h3>{{ $project->title }}</h3>
                            @if ($project->sub_title)
                                <h4>{{ $project->sub_title }}</h4>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <section class="ct-testimonials">
        <div class="ct-title">
            <h2>Testimonials</h2>
        </div>
        <div class="ct-testimonials__container">
            <div class="ct-testimonials__item">
                <p class="ct-testimonials__item-text">"Cameron's design helped us turn our dull, green box of a
                    new-build back garden into a stylish, well- composed space we absolutely love to spend time and
                    entertain our guests in. We gave him a detailed, challenging brief on what we were after, and he
                    responded with a proposal that addressed our every single need - resulting in a garden that is
                    absolutely stunning, but at the same practical, low maintenance, great for family life and Sunday
                    barbecues, and that allows us to maximise the sunlight we get throughout the day..."</p>
                <p>Client, South East</p>
            </div>
        </div>
    </section>
    <section class="section-bottom">
        <div class="ct-title">
            <h2>Contact</h2>
        </div>
        <a href="{{ route('page', 'contact') }}" class="ct-btn">
            Get in Touch
        </a>
    </section>
</x-layout>
