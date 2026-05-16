<x-layout>
    <x-hero :page="$page" />
    <section>
        <div class="ct-text">
            <p>Every garden grows through a clear, structured process. This step by step approach lets you explore ideas
                with confidence and ensures the final design looks beautiful and works perfectly for the way you live.
            </p>
        </div>
    </section>
    <section class="ct-services">
        <div class="ct-image">
            <div id="pencilimage">
                <img src="{{ asset('media/pencils.jpg') }}" alt="Pencil drawing">
            </div>
        </div>
        <div class="ct-text">
            <h2>1. Consultation</h2>
            <p>We begin on site, walking the space together and discussing how you want to use it. This helps shape a
                clear brief and ensures the design feels personal, practical and connected to its surroundings.</p>
            <h2>2. Concept Design</h2>
            <p>Early sketches outline how the garden flows and where key features sit. These ideas guide our next
                conversation, where we refine the layout, materials, timescales and budget.</p>
        </div>
        <div class="ct-text">
            <h2>3. Visualisation</h2>
            <p>A scaled 3D model brings the design to life. Seeing the garden from multiple angles removes uncertainty
                and gives you confidence in how the finished space will look and feel.</p>
        </div>
        <div class="ct-text">
            <h2>4. Masterplan</h2>
            <p>The concept develops into a detailed Masterplan with all the drawings needed for construction, including
                setting out, hard landscaping and bespoke elements such as steps, walls, pergolas or water features.</p>
        </div>
        <div class="ct-text">
            <h2>5. Planting Design</h2>
            <p>A bespoke planting scheme is created to suit your style and the character of the garden. Plants are
                selected for structure, texture and year round interest, ensuring the space matures beautifully.</p>
        </div>
        <div class="ct-text">
            <h2>6. Construction and Delivery</h2>
            <p>Once the design is ready, support can include tendering, contractor selection and ongoing consultation
                during the build. Full project management is available. After completion, maintenance guidance and
                follow up visits help your garden establish and thrive.</p>
        </div>
    </section>
    <section class="section-bottom">
        <div class="ct-image">
            <img src="{{ asset('media/garden_care.jpg') }}" alt="Garden care">
        </div>
    </section>
</x-layout>
