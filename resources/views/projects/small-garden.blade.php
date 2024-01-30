<x-layout>
    <div class="main">
        <div class="headingfull">
            <h1>Small Garden</h1>
        </div>
        <div class="gardenfull" style="margin-bottom: 0;">
            <img src="{{ asset('media/small_garden.jpg') }}" alt="TownGarden">
        </div>
        <div class="maintext">
            <p>This is a contemporary garden of journey and gratification. The long directional path draws you into the heart of the space. Slowing your eye down, the continuity of vertical lines, found in the hedges and pergola allow you to enjoy the space for longer.</p>
            <p>A generous dining terrace allows for a multipurpose use of the space – whether that is entertaining guests or reading a novel. The dappled shade casted from the pergola and sheltering trees, provides an escape on a warm summers’ day.</p>
        </div>
        <div class="gardenfull">
            <img src="{{ asset('media/small_garden_mp.png') }}" alt="">
        </div>
        <div class="maintext" style="margin-top: 0; margin-bottom: 100px;">
            <p>Various levels have been enhanced providing a definition in use of space. The differing use of space ensures the usage of the garden is maximized but also functional.</p>
        </div>
        <div class="mainsplit" id="cycle-contain">
            <a href="{{ route('large-garden') }}" class="cycle"><div class="mainsplitl">
                    <h4  class="text-left">Previous</h4>
                    <h2 class="text-left">Large Garden</h2>
                </div></a>
        </div>
    </div>
</x-layout>
