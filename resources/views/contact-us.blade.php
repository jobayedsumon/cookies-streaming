@extends('includes.master')

@section('content')

@if(!request()->get('webView'))
    @include('includes.header')
@endif


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="pageContent" style="{{ request()->get('webView') ? 'margin-top: 3rem': '' }}">
                    <h1 class="text-center fw-bold">Contact Us</h1>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-map-marker fa-2x me-3"></i>
                                        <div>
                                            <h5>Address</h5>
                                            <p>The Bookstall, Station Forecourt, Haslett Avenue, Crawley, West Sussex, United Kingdom, RH10 1LY</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-envelope fa-2x me-3"></i>
                                        <div>
                                            <h5>Email</h5>
                                            <p><a href="mailto:rewardsconverter0@gmail.com" class="contactUs">rewardsconverter0@gmail.com</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-phone fa-2x me-3"></i>
                                        <div>
                                            <h5>Phone Number</h5>
                                            <p><a href="tel:+15594069689" class="contactUs"> +15594069689</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-whatsapp fa-2x me-3"></i>
                                        <div>
                                            <h5>WhatsApp</h5>
                                            <p><a href="https://chat.whatsapp.com/BauvDNKzsxSCynYjn18Kb0" class="contactUs">Join Our Group</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-telegram fa-2x me-3"></i>
                                        <div>
                                            <h5>Telegram</h5>
                                            <p><a href="https://t.me/rewardsconverterglobal" class="contactUs">Join Our Channel</a></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


                </section>

            </div>
        </div>
    </div>


@if(!request()->get('webView'))
    @include('includes.footer')
@endif

@endsection



