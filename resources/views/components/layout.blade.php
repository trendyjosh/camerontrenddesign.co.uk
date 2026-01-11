<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cameron Trend</title>
    <meta name="description" content="Garden and landscape design practice based in Kent, creating bespoke designs tailored to each client and their unique requirements.">
    @vite('resources/js/site.js')
    <link rel="icon" href="{{ asset('media/favicon.ico') }}">
    <!-- Font Awesome icons -->
    <script src="https://kit.fontawesome.com/b931dfc04a.js" crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-69SK90LTJF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-69SK90LTJF');
    </script>
</head>
<body>
<main class="container">
    <x-nav :error="isset($error)" />
    {{ $slot }}
    <footer class="ct-footer">
        <div class="ct-footer__contact">
            <div class="contact-info">
                <a href="tel:{{ $site_phone }}">{{ $site_phone }}</a><span> | </span><a href="mailto:{{ $site_email }}">{{ $site_email }}</a>
            </div>
            <div class="contact-info">
                @if ($site_facebook)
                    <a href="{{ $site_facebook }}" target="_blank" aria-label="Facebook page"><i class="fa-brands fa-facebook"></i></a>
                @endif
                @if ($site_pinterest)
                    <a href="{{ $site_pinterest }}" target="_blank" aria-label="Pinterest page"><i class="fa-brands fa-pinterest"></i></a>
                @endif
                @if ($site_linkedin)
                    <a href="{{ $site_linkedin }}" target="_blank" aria-label="LinkedIn page"><i class="fa-brands fa-linkedin"></i></a>
                @endif
                @if ($site_instagram)
                    <a href="{{ $site_instagram }}" target="_blank" aria-label="Instagram page"><i class="fa-brands fa-instagram"></i></a>
                @endif
            </div>
        </div>
        <div class="ct-footer__copyright">
            <span>&copy; Cameron Trend {{ date('Y') }} | Designed by <a href="http://www.joshuatrend.co.uk">Joshua Trend</a></span>
        </div>
    </footer>
</main>
</body>
</html>
