<x-layout>
    <x-hero :page="$page" />
    <section class="ct-services">
        <div class="ct-image">
            <div id="pencilimage">
                <img src="{{ asset('media/pencils.jpg') }}" alt="Pencil drawing">
            </div>
        </div>
        <div class="ct-text">
            <h2>Initial Meeting</h2>
            <p>This is the first visit to the site, where we meet the client and understand their desires for the garden.</p>
            <h2 style="">Design</h2>
            <p>Following your brief carefully, Cameron creates the design, respecting the architecture of your house and local vernacular.</p>
        </div>
        <div class="ct-text">
            <h2>Perspective Drawings</h2>
            <p>The most useful way to visualise the garden and understand the feeling of the space, is through numerous hand drawn perpective sketches.</p>
        </div>
        <div class="ct-text">
            <h2>Planting Plans</h2>
            <p>Fully specified plans with sought after planting combinations, tailored to your desired pallet.</p>
        </div>
        <div class="ct-text">
            <h2>Build</h2>
            <p id="bottom50">The construction, planting and styling of the garden is closely supervised by Cameron on behalf of the client.</p>
        </div>
        <div class="ct-text">
            <h2>Aftercare</h2>
            <p id="bottom50">Cameron and his highly skilled team of horticulturists offer an aftercare service. This ensures those most crucial, initial years of care are carried out to the design requirements.</p>
        </div>
    </section>
    <section class="section-bottom">
        <div class="ct-image">
            <img src="{{ asset('media/garden_care.jpg') }}" alt="Garden care">
        </div>
    </section>
</x-layout>
