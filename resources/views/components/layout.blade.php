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
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-69SK90LTJF');
    </script>
</head>
<body>
<div class="container">
    <x-nav :index="isset($index)" />
    {{ $slot }}
    <footer class="footer">
        <div class="foottop">
            <div class="footleft">
                <p><a href="tel:07581647855">07581 647855</a> | <a href="mailto:cameron.trend@gmail.com">cameron.trend@gmail.com</a></p>
            </div>
            <div class="footright">
                <a href="https://www.facebook.com/camerontrendgardendesign" target="_blank"><img src="{{ asset('media/facebook.png') }}" alt=""></a>
                <a href="https://www.pinterest.co.uk/camerontrend/" target="_blank"><img src="{{ asset('media/pinterest.png') }}" alt=""></a>
                <a href="https://www.instagram.com/camerontrenddesign/" target="_blank"><img src="{{ asset('media/insta.png') }}" alt=""></a>
            </div>
        </div>
        <div class="footbottom">
            <p id="copyright">&copy; Cameron Trend 2022 | Designed by <a href="http://www.joshuatrend.co.uk">Joshua Trend</a></p>
        </div>
    </footer>
</div>
</body>
</html>
