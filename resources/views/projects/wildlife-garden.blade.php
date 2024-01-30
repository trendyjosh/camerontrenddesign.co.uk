<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Wildlife Garden</h1>
        </div>
        <div style="margin-bottom: 50px;" class="gardenfull">
            <img src="{{ asset('media/wildlife_garden_view_1.jpg') }}" alt="WildlifePerspective">
        </div>
        <div class="maintext" style="margin-top: 0;">
            <h2>The Brief</h2>
            <p>This client approached Cameron with the vision of creating a wildlife garden. The garden had to be low maintenance and offer opportunities to introduce wildlife to the space.</p>
            <p style="margin: 20px 0;">With a busy lifestyle and limited time to enjoy the garden, the views from the house were crucial for the design. Existing mature trees swamped the garden and obscured the view. The design offers a winding wildflower meadow that entices and reveals the tranquil landscape beyond.</p>
        </div>
        <div class="gardenfull" style="margin-bottom: 0;">
            <h2>Finished Perspectives</h2>
        </div>
        <div class="wildlife_split">
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/wildlife_garden_view_2.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/wildlife_garden_view_3.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/wildlife_garden_view_4.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/wildlife_garden_perspective.jpg') }}">
                </div>
            </div>
        </div>
        <div class="mainsplit" id="cycle-contain">
            <a href="{{ route('town-garden') }}" class="cycle"><div class="mainsplitr">
                    <h4 class="text-right">Next</h4>
                    <h2 class="text-right">Town Garden</h2>
                </div></a>
        </div>
    </div>
</x-layout>
