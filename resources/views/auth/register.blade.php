@extends('partials.base')

@section('title')
    Sign up for stud-e
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/signup.style.css">
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
    <div class="wrapper__sign-up">
        <a href="/signin" class="link--back"><span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="9.5" viewBox="0 0 15.5 9.5">
  <path id="Shape" d="M4.22,9.28l-4-4L.207,5.267.2,5.261.194,5.254.187,5.246.182,5.24.174,5.231l0,0-.008-.01,0,0L.151,5.2l0,0L.14,5.186l0,0L.13,5.172l0,0L.12,5.157l0-.006L.111,5.142l0-.007,0-.008L.1,5.118l0-.006L.087,5.1l0,0A.751.751,0,0,1,.235,4.2L4.22.22A.75.75,0,0,1,5.28,1.281L2.561,4H14.75a.75.75,0,0,1,0,1.5H2.561L5.28,8.22A.75.75,0,1,1,4.22,9.28Z"/>
</svg>
</span>Go back</a>
        <div class="sign-up__page-1">
            <h1 class="heading--sign-up">Choose an account</h1>
            <div class="card--choice">
                <div class="card__item">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Admin.svg" alt="Admin Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title onboarding-signup__card-title">Admin Account</h2>
                        <p class="card--choice__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>

                </div>

                <div class="card__item">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Teachers.svg" alt="Teacher Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title">Teacher Account</h2>
                        <p class="card--choice__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="card__item">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Student.svg" alt="Student Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title">Student Account</h2>
                        <p class="card--choice__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="line--one-h line"></div>
            <p class="learn-more__txt wrapper__sign-up__learn-more-txt">Not sure which account you want? <a href="#" class="learn-more__link">Click here!</a></p>
        </div>
    </div>
@endsection
