<header class="header">
    <div @class(["topnav", "topnav-down" => !$index]) id="topNav">
        @isset($index)
            <a href="{{ route('landing') }}" style="float:left"><img id="logo-white" class="logo logo-white" src="{{ asset('media/white-logo.png') }}" alt="CamLogo"><img id="logo-black" class="logo-black logo" src="{{ asset('media/New-Logo-Branding2.svg') }}" alt="CamLogo"></a>
            <a class="logo-black" href="{{ route('landing') }}" style="float:left" id="cameron"><img src="{{ asset('media/New-Logo-Branding1.svg') }}" alt="CamTitle" class="title"></a>
            <a class="logo-white" href="{{ route('landing') }}" style="float:left" id="cameron2"><img src="{{ asset('media/white-text.png') }}" alt="CamTitle" class="title"></a>
        @else
            <a href="{{ route('landing') }}" style="float:left"><img src="{{ asset('media/New-Logo-Branding2.svg') }}" alt="CamLogo" class="logo"></a>
            <a href="{{ route('landing') }}" style="float:left" id="cameron"><img src="{{ asset('media/New-Logo-Branding1.svg') }}" alt="CamTitle" class="title"></a>
        @endisset
        <a href="{{ route('contact') }}" class="menu" id="contactlink">Contact</a>
        <!-- <a href="instagram.php" class="menu">Instagram</a> -->
        <a href="{{ route('services') }}" class="menu">Services</a>
        <a href="{{ route('landing') }}#projects" class="menu">Portfolio</a>
        <a href="{{ route('about') }}" class="menu">About</a>
        <a href="javascript:void(0);" class="icon" onclick="dropDown()"><img src="{{ asset('media/bars.png') }}"></a>
    </div>
</header>
<script type="text/javascript">
    function dropDown() {
        var navstate = document.getElementById("topNav");
        if (navstate.classList.contains("responsive")) {
            navstate.classList.remove("responsive");
        } else {
            navstate.classList.add("responsive");
        }
    }
</script>
