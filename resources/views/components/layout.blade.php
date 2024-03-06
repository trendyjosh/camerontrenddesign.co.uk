<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cameron Trend</title>
    @vite('resources/js/app.js')
    <link rel="icon" href="images/logo_thumbnail.png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-69SK90LTJF"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b931dfc04a.js" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-69SK90LTJF');
    </script>
</head>
<body>
<main class="container">
    <x-nav :index="isset($index)" />
    {{ $slot }}
    <footer class="ct-footer">
        <div class="ct-footer__contact">
            <div class="contact-info">
                <a href="tel:07581647855">07581 647855</a><span> | </span><a href="mailto:cameron.trend@gmail.com">cameron.trend@gmail.com</a>
            </div>
            <div class="contact-info">
                <a href="https://www.facebook.com/camerontrendgardendesign" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.pinterest.co.uk/camerontrend/" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                <a href="https://www.instagram.com/camerontrenddesign/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="ct-footer__copyright">
            <span>&copy; Cameron Trend {{ date('Y') }} | Designed by <a href="http://www.joshuatrend.co.uk">Joshua Trend</a></span>
        </div>
    </footer>
</main>
</body>
</html>
