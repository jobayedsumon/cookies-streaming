<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cookie Streaming</title>

    <link rel="icon" href="{{ asset('img/CookieLogoWhite.jpg') }}" />

    <meta charset="UTF-8" />
    <meta name="language" content="en-US" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>
<body>

@yield('content')

@if(!request()->get('webView'))
<!--ADDITIONAL-->
<div class="overlay"></div>
<section class="social_icons">
    <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
    <a href="#" title="Instagram"><i class="fa fa-instagram"></i></a>
    <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
</section>
<a href="https://play.google.com/store/apps/details?id=com.cookies.streaming" class="google_play fixed_flex" title="Play store">
    <img src="https://i.postimg.cc/sgXYMXYR/g-play.png" alt="" />
    <strong>
        <h6>Download now on</h6>
        <h3>Play Store</h3>
    </strong>
</a>
@endif


<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
