<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Large Garden</h1>
        </div>
        <div class="gardenfull">
            <img src="{{ asset('media/large_garden.jpg') }}" alt="LargeGarden">
        </div>
        <div class="gardensplit">
            <div class="gardensplitl">
                <h2>Master Plan</h2>
                <p>A 5 acre site in Kent, this is a garden of intrinsic landscapes and rustic, organic structure. The garden takes inspiration from the architectural features of the house. These features can be found within the structural hedging and geometrical layout of the paths and meadows.</p>
            </div>
            <div class="gardensplitr">
                <img src="{{ asset('media/large_garden_mp.jpg') }}" alt="MasterPlan">
            </div>
        </div>
        <div class="gardensplit">
            <div class="gardensplitl">
                <img src="{{ asset('media/perspective.jpg') }}" alt="Perspective">
            </div>
            <div class="gardensplitr">
                <h2>Perspectives</h2>
                <p>The Walled Garden is the main feature of this garden. The undulations and level changes of the existing walls ensure a cohesive design throughout the garden and structure. A long narrow pool in the centre of the garden provides a reflective surface, bringing light down to the floor plane. The multi stem apple tree is reflected in the pool and is best viewed sitting at the opposite end of the garden.</p>
            </div>
        </div>
        <div class="gardenfull">
            <h2>The Site</h2>
            <img src="{{ asset('media/large_garden_view.JPG') }}" alt="LargeView">
        </div>
        <div class="mainsplit" id="cycle-contain">
            <a href="{{ route('barn-conversion') }}" class="cycle"><div class="mainsplitl">
                    <h4 class=" text-left">Previous</h4>
                    <h2 class="text-left">Contemporary Garden</h2>
                </div></a>
            <a href="{{ route('small-garden') }}" class="cycle"><div class="mainsplitr">
                    <h4 class="text-right">Next</h4>
                    <h2 class="text-right">Small Garden</h2>
                </div></a>
        </div>
    </div>
</x-layout>
