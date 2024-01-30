<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Contemporary Garden</h1>
        </div>
        <div class="gardenfull" style="margin-bottom: 0;">
            <img src="{{ asset('media/contemporary_garden_view_1.jpg') }}" alt="ContGarden">
        </div>
        <div class="maintext">
            <p>The clients approached me seeking a garden that was respectful to the architecture of their house and enhanced a deeper connection to the land it’s on.</p>
        </div>
        <div class="gardenfull">
            <img src="{{ asset('media/contemporary_garden_view_2.jpg') }}" alt="">
        </div>
        <div class="maintext" style="margin-top: 0; margin-bottom: 100px;">
            <p>The layout for the garden echoes the geometry of the barn and the material palette is made up from a majority of locally sourced materials. Limestone quarried less than four miles away will retain planted banks and offer a surface for paths.</p>
        </div>
        <div class="wildlife_split">
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/contemporary_garden_view_3.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/contemporary_garden_view_4.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/contemporary_garden_view_5.jpg') }}">
                </div>
            </div>
            <div class="wildlife_container">
                <div class="wildlife_image">
                    <img src="{{ asset('media/contemporary_garden_view_6.jpg') }}">
                </div>
            </div>
        </div>
        <div class="mainsplit" id="cycle-contain">
            <a href="{{ route('town-garden') }}" class="cycle"><div class="mainsplitl">
                    <h4  class="text-left">Previous</h4>
                    <h2 class="text-left">Town Garden</h2>
                </div></a>
            <a href="{{ route('large-garden') }}" class="cycle"><div class="mainsplitr">
                    <h4 class="text-right">Next</h4>
                    <h2 class="text-right">Large Garden</h2>
                </div></a>
        </div>
    </div>
</x-layout>
