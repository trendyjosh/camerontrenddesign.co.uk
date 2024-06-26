<header @class([ 'ct-header' , 'scrolled-up'=> !$error ])>
    <input type="checkbox" name="burger" id="burger" class="ct-burger__input">
    <nav class="ct-nav">
        <div class="ct-nav__logo">
            <a href="{{ route('landing') }}" aria-label="Home page">
                <x-logo />
            </a>
        </div>
        <label for="burger" class="ct-burger__container">
            <div class="ct-burger">
                <span class="ct-burger__bar"></span>
                <span class="ct-burger__bar"></span>
                <span class="ct-burger__bar"></span>
                <span class="ct-burger__bar"></span>
            </div>
        </label>
        <ul class="ct-nav__list">
            <li class="ct-nav__list-item">
                <a href="{{ route('page', 'about') }}" class="menu menu-top">About</a>
            </li>
            <li class="ct-nav__list-item">
                <a href="{{ route('landing') }}#projects" class="menu menu-top">Portfolio</a>
            </li>
            <li class="ct-nav__list-item">
                <a href="{{ route('page', 'services') }}" class="menu menu-top">Services</a>
            </li>
            {{-- <li class="ct-nav__list-item">
                <a href="{{ route('instagram') }}" class="menu menu-top">Instagram</a>
            </li> --}}
            <li class="ct-nav__list-item">
                <a href="{{ route('page', 'contact') }}" class="menu menu-top">Contact</a>
            </li>
        </ul>
    </nav>
</header>
<script type="text/javascript">
    window.onscroll = () => {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementsByClassName("ct-header")[0].classList.remove("scrolled-up");
        } else {
            document.getElementsByClassName("ct-header")[0].classList.add("scrolled-up");
        }
    }
</script>