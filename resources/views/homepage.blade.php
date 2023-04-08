@extends('includes.master')

@section('content')


    @include('includes.header')

    <!--HEADER-->
    <header class="flex">
        <section class="flex_content text-center">
            <article>
                <h1 class="cursive big">Skip the queue<br><strong class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get it <b>today!</b></strong></h1>
                <p class="mt-4">Convert Your Play Balance into real Cash</p>
            </article>
        </section>
        <section class="flex_content">
            <figure><img src="{{ asset('img/home.png') }}" alt="" loading="lazy" class="img-fluid" style="height: 500px" /></figure>
            <figure><img src="{{ asset('img/profile.png') }}" alt="" loading="lazy" class="img-fluid" style="height: 500px" /></figure>

        </section>
    </header>


    <!--MAIN-->
    <main>
        <!--division_1-->
        <div class="divisions division_1 flex">
            <section class="flex_content text-end">
                <figure class="mt-5"><img src="{{ asset('img/login.png') }}" alt="" loading="lazy" class="img-fluid" style="height: 500px; object-fit: contain" /></figure>
            </section>
            <section class="flex_content padding_2x">
                <em class="cursive">How it works?</em>
                <h2 class="title big">Get it easy</h2>
                <span class="bar"></span>
                <p>Cookie is an app Developed for those Users who want to Convert their Google play balance into Real Cash.</p>
                <p>Cookie is a Reward Converter App developed by Cookie Software LLC where you can convert your Google play Balance into Real Cash. User have to make  purchases in the app by selecting the amount and then he will be get coins, after that they can withdraw their coins into cash by entering payout details in Withdraw page.</p>
                <p>We have PayPal and Tether (USD₮ - Binance.com) as Payout Option. We take minimum service charge from our users. If any user is converting his Google play balance into cash then he will be receiving  50% - 65% (According to packages) so our service charge is less than others.</p>
            </section>
        </div>

        <!--division_3-->
        <div class="divisions division_3">
            <article class="flex align-items-center">
                <section class="flex_content padding_2x">
                    <figure class="m-0"><img src="{{ asset('img/store.png') }}" alt="" loading="lazy" class="img-fluid"  /></figure>
                </section>
                <section class="flex_content appDownload">
                    <h3 class="title medium">Try our <b>app!</b></h3>
                    <p>Available on play store</p>
                    <aside class="fixed_flex">
                        <a href="https://play.google.com/store/apps/details?id=com.cookies.streaming" class="fixed_flex">
                            <img src="https://i.postimg.cc/DyjTrjXb/play-store.png" alt="" />
                            <strong>
                                <h5>GET IT ON</h5>
                                <h3>Google play</h3>
                            </strong>
                        </a>
                    </aside>
                </section>
            </article>
        </div>
    </main>


    @include('includes.footer')

@endsection



