@extends('partials.base')

@section('title')Step 2 - Verify your email @endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/verify_email.css">
@endsection



@section('body-content')
    <div class="navbar__logo-only">
        <div class="navbar__inner">
            <div class="navbar__logo-box">
                <img src="/assets/svgs/logo.svg" alt="Website's logo" class="img-fluid">
            </div>
            <p class="navbar__logo-txt">Stud-e</p>
            <div class="navbar__logo-circle"></div>
        </div>
    </div>
    <div class="container">
        <div class="verify">
            <div class="steps">
                <div class="steps__item-wrapper">
                    <div class="steps__check-box">
                        <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Progress icon" class="img-fluid">
                    </div>
                    <span class="steps__message--t">Choosing your account</span>
                </div>
                <div class="steps__line"></div>
                <div class="steps__item-wrapper steps--active">
                    <p class="steps__number">2</p>
                    <span class="steps__message--b">Verify your email</span>
                </div>
                <div class="steps__line"></div>
                <div class="steps__item-wrapper">
                    <p class="steps__number">3</p>
                    <span class="steps__message--t">Subscription</span>
                </div>
            </div>

            <h1 class="verify__title">Almost there!</h1>
            <p class="verify__main-txt">Hey there {{ ucfirst($user->f_name) }}! You just need to verify your email to at least complete the registration.</p>

            <div class="verify__illustration">
                <img src="/assets/illustration/signup/email.svg" alt="Website's illustration" class="img-fluid">
            </div>
            <p class="verify__sub-txt">An email has been sent to <span class="verify__email">{{ $user->email }}</span> with a link to verify your account. If you have not received the email after a few minutes, Please check your spam folder. Thank you.</p>
            <button type="button" class="bttn bttn--tertiary--ghost verify__bttn js-resend-link">Resend link</button>
            <script>
                let classLink = '{{$user->verification_url}}'
            </script>
        </div>
    </div>

    <footer class="footer--secondary">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lrg-6">
                        <div class="footer--secondary__upper">
                            <a href="#home" class="footer--secondary__link">Terms & Agreement</a>
                            <a href="#" class="footer--secondary__link">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lrg-6">
                        <div class="footer--secondary__bottom">
                            <p class="footer--secondary__mssg"><a href="/" class="footer--secondary__link">&copy; Stud-e 2020, All rights reserved.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('script')
    <script src="/assets/js/modules/verify.js"></script>
@endsection
