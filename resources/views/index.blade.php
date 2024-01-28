<x-layout :index="true">
    <div id="main_image" class="resize" style="background-image:url({{ asset('media/pink_slide.jpg') }}); background-size:cover;">
        <div class="centered">
            <h1 id="resize_text_small">Cameron Trend</h1>
            <h1 id="resize_text">Garden Design</h1>
        </div>
        <svg class="arrows logo-white">
            <path d="M0 40 L30 72 L60 40"></path>
        </svg>
    </div>
    <div class="main">
        <div class="maintext">
            <p style="margin-top: 30px">Cameron Trend Design is a garden and landscape design practice based in Kent, covering the South East.</p>
            <p style="margin-top: 30px">With over 8 years’ horticultural experience, Cameron has gained an in-depth knowledge of plants, outdoor spaces and how they impact our modern-day, busy lifestyles. Combining his creative passion for art and horticulture he creates bespoke designs tailored to his clients and their requirements.</p>
            <p style="margin-top: 30px">All aspects of garden and landscape design are covered; from small planting schemes, to full scale garden estate plans, following the process through to tender.</p>
            <p style="margin-top: 30px">Please take your time to look through the website. Do not hesitate to contact Cameron for further enquiries.</p>
        </div>
        <div class="fullwb" style="border-top-style: solid; border-width: thin;"  id="projects">
            <h1 style="margin-bottom: 0;">Current Projects</h1>
        </div>
        <div class="testflex">
            <div class="testitem">
                <a href="wildlife_garden.php"><div class="testcontain">
                        <img class="increase" src="{{ asset('media/wildlife_garden_thumbnail.jpg') }}" alt="WildlifeGarden">
                        <div class="text"><h3>Wildlife Garden</h3><small>Kent</small></div>
                    </div></a>
            </div>
            <div class="testitem">
                <a href="town_garden.php"><div class="testcontain">
                        <img class="increase" src="{{ asset('media/town_garden_thumbnail.jpg') }}" alt="SuburbanGarden">
                        <div class="text"><h3>Town Garden</h3><small>South East London</small></div>
                    </div></a>
            </div>
            <div class="testitem">
                <a href="barn_conversion.php"><div class="testcontain">
                        <img class="increase" src="{{ asset('media/contemporary_garden_thumbnail.png') }}" alt="ContemporaryGarden">
                        <div class="text"><h3>Contemporary Garden</h3><small>Kent</small></div>
                    </div></a>
            </div>
            <div class="testitem">
                <a href="large_garden.php"><div class="testcontain">
                        <img class="increase" src="{{ asset('media/large_garden_thumbnail.jpg') }}" alt="LargeGarden">
                        <div class="text"><h3>Large Garden</h3><small>Kent</small></div>
                    </div></a>
            </div>
            <div class="testitem">
                <a href="small_garden.php"><div class="testcontain">
                        <img class="increase" src="{{ asset('media/small_garden_thumbnail.jpg') }}" alt="TownGarden">
                        <div class="text"><h3>Small Garden</h3><small>Kent</small></div>
                    </div></a>
            </div>
        </div>
        <div class="fullwb" style="border-top-style: solid; border-width: thin;">
            <h1 style="margin-bottom: 0;">Testimonials</h1>
        </div>
        <div class="maintext">
            <p style="font-style: italic;">"Cameron instinctively understood what had to be done in a particular small awkward area of my garden.

                He soon realised what I liked and I was included in the whole process of the design from start to finish and it changed regularly!

                I was shown many virtual images of the finished area until I was happy.

                He ordered quality plants and planted them when he said he would.

                They look good and I am looking forward to seeing them mature.

                I would highly recommend him."</p>
            <p style="margin-top: 30px">Client, Tonbridge</p>
        </div>
        <div class="fullwb" style="border-top-style: solid; border-width: thin;">
            <a href="contact.php"><h1>Contact</h1></a>
        </div>
        <div class="mainfull" style="height: 100px;">
            <a href="contact.php"><h2>Get in Touch</h2></a>
        </div>
    </div>
    <script type="text/javascript">
        window.onresize = window.onload = function() {
            if (screen.width > 1100){
                window.onscroll = function() {scrollFunction()};
                document.querySelector(".topnav").classList.remove("topnav-down");
                document.querySelectorAll(".menu").forEach(a=>a.classList.add("menu-top"));
            } else {
                window.onscroll = function() {smallScrollFunction()};
            }
        }

        function smallScrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.querySelectorAll(".menu").forEach(a=>a.classList.remove("menu-top"));
                document.querySelector(".topnav").classList.add("topnav-down");
            } else {
                document.querySelectorAll(".menu").forEach(a=>a.classList.add("menu-top"));
                document.querySelector(".topnav").classList.remove("topnav-down");
            }
        }

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("main_image").classList.add("main-image-small");
                document.querySelectorAll(".menu").forEach(a=>a.classList.remove("menu-top"));
                document.querySelector(".topnav").classList.add("topnav-down");
            } else {
                document.getElementById("main_image").classList.remove("main-image-small");
                document.querySelectorAll(".menu").forEach(a=>a.classList.add("menu-top"));
                document.querySelector(".topnav").classList.remove("topnav-down");
            }
        }
    </script>
</x-layout>
