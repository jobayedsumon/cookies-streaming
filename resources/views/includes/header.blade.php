<!--NAV-->
<nav>
    <section class="flex_content">
        <strong class="logo fixed_flex">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/CookieLogo.png') }}" alt="Logo" class="img-fluid" />
            </a>

        </strong>
    </section>
    <section class="flex_content">
        <a href="javascript:void(0)" class="ham"><i class="fa fa-bars"></i></a>
    </section>
</nav>


<!--MENU-->
<menu id="menu">
    <a href="javascript:void(0)" class="close"><i class="fa fa-times"></i></a>
    <strong class="fixed_flex logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/CookieLogoFullWhite.png') }}" alt="Logo" class="img-fluid" />
        </a>
    </strong>
    <br>
    <ul>
        <li><a href="#" target="_blank"><i class="fa fa-map-o"></i> Savar, Dhaka, Bangladesh </a></li>
        <li><a href="emailto:cookiestreamingservices@gmail.com"><i class="fa fa-envelope-o"></i> cookiestreamingservices@gmail.com</a></li>
        <li><a href="tel:+8801688007454"><i class="fa fa-headphones"></i> +8801688007454</a></li>
    </ul>
    <br>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about-us') }}">About Us</a></li>
        <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
        <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
        <li class="fixed_flex"><a href="https://play.google.com/store/apps/details?id=com.cookies.streaming" class="btn btn_1 chat_popup">Get our app</a></li>
    </ul>
</menu>
