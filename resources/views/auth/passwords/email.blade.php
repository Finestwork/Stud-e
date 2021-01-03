@extends('partials.base')
@section('title')
    Verify your email
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/login.style.css">
@endsection

@section('body-content')
    <div class="wrapper d-only-lrg-flex">
        <div class="password-reset__banner disp-lrg-only">
            <div class="sign-in__bg"></div>
            <div class="password-reset__banner--inner">
                <p>Photo by <a class="sign-in__link" href="https://unsplash.com/@siora18?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Siora Photography</a> on <a class="sign-in__link" href="https://unsplash.com/s/photos/study?utm_source=unsplash&am
p;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank">Unsplash</a></p>
            </div>
        </div>
        <div class="sign-in__logo">
            <div class="sign-in__logo-box">
                <img src="/assets/svgs/logo.svg" alt="Website's logo" class="img-fluid">
            </div>
            <p class="sign-in__logo-txt">Stud-e</p>
            <div class="sign-in__logo-circle"></div>
        </div>
        <div class="sign-in__left d-only-lrg-flex">
            <div class="sign-in__left--inner">
                <div class="sign-in__form-wrapper">
                    <p class="sign-in__registration-txt cs-margin-bottom">Already have an account? <a href="/signin" class="sign-in__registration-link">Click here to sign in.</a></p>
                    @include('partials.flash message.error')
                    <p class="sign-in__email-success js-txt-notif"></p>
                    <div class="form--primary">
                        <form action="@$werefdaqwe@!@#$%" method="POST">
                            @csrf
                            <div class="form--primary__group">
                                <label for="emailTxt" class="form--primary__n-lbl">Enter your Email: </label>
                                <input type="text" id="emailTxt" placeholder="Enter your email" name="emailTxt">
                            </div>
                            <input type="submit" value="Resend Email" class="form--primary__bttn" id="resendEmailBttn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="/assets/js/modules/resend.email.js"></script>
@endsection
