@extends('includes.master')

@section('content')

@if(!request()->get('webView'))
    @include('includes.header')
@endif


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="pageContent" style="{{ request()->get('webView') ? 'margin-top: 5rem': '' }}">
                    <h1 class="text-center fw-bold">About Us</h1>
                    <h6 class="fw-bold text-center">Convert Your Play Balance into real Cash</h6>
                    <p>Cookie is an app Developed for those Users who want to Convert their Google play balance into Real Cash.</p>
                    <h2>About Cookie</h2>
                    <p>Cookie is a Reward Converter App developed by Cookie Software LLC where you can convert your Google play Balance
                        into Real Cash. User have to make  purchases in the app by selecting the amount and then he will be get coins,
                        after that they can withdraw their coins into cash by entering payout details in Withdraw page.</p>

                    <p>We have PayPal and Tether (USD₮ - Binance.com) as Payout Option. We take minimum service charge from our users.
                        If any user is converting his Google play balance into cash then he will be receiving 50% - 65% (According to packages)
                        so our service charge is less than others.</p>

                    <h3>Features</h3>
                    <ul>
                        <li>Neat & Clean UI/UX</li>
                        <p>'Cookie' has neat & clean User Interface so new users can also understand about app's features easily.</p>

                        <li>Multiple Purchasing Options</li>
                        <p>'Cookie' offers various purchasing options.</p>

                        <li>Realtime Notifications</li>
                        <p>'Cookie' delivers Realtime notifications so users can stay up-to-date with all apps services and features.</p>

                        <li>Multiple Features</li>
                        <p>'Cookie' has multiple essential features who makes our App useful for our Users.</p>

                        <li>One Tap Withdrawal</li>
                        <p>'Cookie' has one Tap Withdrawal feature that allow to our users hassle free Withdrawals in a single click.</p>

                        <li>24/7* Customer Support</li>
                        <p>'Cookie' has the best ever customer support Team. You can contact us via Email, Phone Call, Whatsapp or Telegram.</p>

                        <li>Lowest Withdrawal Processing time</li>
                        <p>'Cookie' has the lowest withdrawal processing time (7 - 14 days). Usually we pay in 3 days but sometimes it may takes longer than usual but not more than 14 days.</p>
                    </ul>

                    <h3>Frequently Asked Questions(FAQs)</h3>
                    <ol>
                        <li>
                            <p><strong>Q1. What payment mode are supported?</strong></p>
                            <p>We have PayPal and Tether (USD₮ - Binance.com) as payout option.</p>
                        </li>
                        <li>
                            <p><strong>Q2. Is there any charges for conversion?</strong></p>
                            <p>Please note that Google will charge 30% of your total amount as their ‘transaction fee’. Apart from this we charge 0% – 10% (according your Packages) of your total amount as our service fee. So at last, you will receive 50% – 60% (according your Packages) of the total amount after all deductions.</p>
                        </li>
                        <li>
                            <p><strong>Q3. What if I submit wrong details?</strong></p>
                            <p>We understand that you want to change your payout details. For security reasons, you have to mail to our support from your Registered email ID for any change in payout details.</p>
                        </li>
                    </ol>

                    <h3>Frequently Asked Questions(FAQs) - Part 2</h3>
                    <ol start="4">
                        <li>
                            <p><strong>Q4. How long does it take to receive my payout?</strong></p>
                            <p>We usually pay within 3 days of withdrawal request. But sometimes it may take up to 14 days to process your request.</p>
                        </li>
                        <li>
                            <p><strong>Q5. Is there any referral bonus?</strong></p>
                            <p>Yes, we have a referral bonus. You can earn 100 coins for each successful referral.</p>
                        </li>
                        <li>
                            <p><strong>Q6. Can I withdraw coins without purchasing anything?</strong></p>
                            <p>No, you need to make a purchase to earn coins. Only then you can withdraw coins to real cash.</p>
                        </li>
                        <li>
                            <p><strong>Q7. How secure is my personal and payout information?</strong></p>
                            <p>At Cookie, we take user data privacy and security very seriously. All user information is securely stored and encrypted, and we follow industry-standard practices to safeguard user information. We also do not share any personal information with any third party without the user's consent.</p>
                        </li>
                        <li>
                            <p><strong>Q8. Is Cookie available in all countries?</strong></p>
                            <p>Currently, Cookie is available only in a limited number of countries. You can check the list of supported countries in the app itself. We are working on expanding our reach to more countries in the future.</p>
                        </li>
                        <li>
                            <p><strong>Q9. How can I contact Cookie support?</strong></p>
                            <p>You can contact our customer support team 24/7 via email, phone call, WhatsApp, or Telegram. We are always here to help you with any queries or concerns.</p>
                        </li>
                    </ol>

                    <h3>Conclusion</h3>
                    <p>If you are someone who has unused Google play balance and wants to convert it into real cash, Cookie is the app for you. With its simple and easy-to-use interface, multiple purchasing options, and low service charges, Cookie makes the process of converting Google play balance into real cash hassle-free and convenient. So, download the app today and start earning real cash from your unused Google play balance!</p>


                </section>

            </div>
        </div>
    </div>


@if(!request()->get('webView'))
    @include('includes.footer')
@endif

@endsection



