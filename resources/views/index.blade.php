<x-layout :index="true">
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
            <p>Cameron Trend Design is a garden and landscape design practice based in Kent, covering the South East.</p>
            <p>With over 8 years’ horticultural experience, Cameron has gained an in-depth knowledge of plants, outdoor spaces and how they impact our modern-day, busy lifestyles. Combining his creative passion for art and horticulture he creates bespoke designs tailored to his clients and their requirements.</p>
            <p>All aspects of garden and landscape design are covered; from small planting schemes, to full scale garden estate plans, following the process through to tender.</p>
            <p>Please take your time to look through the website. Do not hesitate to contact Cameron for further enquiries.</p>
        </div>
    </section>
    <section class="ct-portfolio" id="projects">
        <div class="ct-title">
            <h2>Current Projects</h2>
        </div>
        <div class="ct-portfolio__container">
            @foreach($projects as $project)
            <a class="ct-portfolio__item" href="{{ route('projects.show', $project->slug) }}">
                <div class="ct-portfolio__item-image">
                    <img class="increase" src="images/thumbs/{{ $project->thumb }}" alt="{{ $project->title }}">
                    <div class="ct-portfolio__item-text">
                        <h3>{{ $project->title }}</h3>
                        <h4>Kent</h4>
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
                <p class="ct-testimonials__item-text">"Cameron instinctively understood what had to be done in a particular small awkward area of my garden. He soon realised what I liked and I was included in the whole process of the design from start to finish and it changed regularly! I was shown many virtual images of the finished area until I was happy. He ordered quality plants and planted them when he said he would. They look good and I am looking forward to seeing them mature. I would highly recommend him."</p>
                <p>Client, Tonbridge</p>
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
