<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Town Garden</h1>
        </div>
        <div class="gardenfull">
            <img src="{{ asset('media/town_garden.jpg') }}" alt="SuburbanGarden">
        </div>
        <div class="gardensplit">
            <div class="gardensplitl">
                <h2>Master Plan</h2>
                <p>This is a garden of dappled shade and quiet contemplation. The garden respects the existing architecture of the house and the patio areas. The main feature of this garden are the multiple vistas that have been created, connecting various areas together. The shade cast by the canopy of the trees help keep this a cool space in the hot summer months. The structure of the lawn eliminates the existing harsh angles of the garden, providing a design that flows throughout.</p>
                <p>Found within this garden are three distinctive level changes. Each level change provides a separate purpose. This concept echoes the functional rooms of the house.</p>
            </div>
            <div class="gardensplitr">
                <img src="{{ asset('media/town_garden_mp.jpg') }}" alt="SuburbanMasterPlan">
            </div>
        </div>
        <div class="maintext" style="margin-top: 0; margin-bottom: 100px;">
            <p>Grounding you in the present, a gentle trickling of the water feature compliments background noise, evoking a sense of tranquillity. When viewing the garden from the living room, this feature sits prominently. The steps leading up to the garden frame this as a centrepiece captivating you with immense intrigue. </p>
        </div>
        <div class="gardenfull">
            <h2>The Site</h2>
            <img src="{{ asset('media/town_garden_view.jpg') }}" alt="TownView">
        </div>
        <div class="mainsplit" id="cycle-contain">
            <a href="{{ route('wildlife-garden') }}" class="cycle"><div class="mainsplitl">
                    <h4 class="text-left">Previous</h4>
                    <h2 class="text-left">Wildlife Garden</h2>
                </div></a>
            <a href="{{ route('barn-conversion') }}" class="cycle"><div class="mainsplitr">
                    <h4 class="text-right">Next</h4>
                    <h2 class="text-right">Contemporary Garden</h2>
                </div></a>
        </div>
    </div>
</x-layout>
