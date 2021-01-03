@extends('partials.base')
@section('title')
    Reset your password
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
                    @include('partials.flash message.error')
                    <p class="sign-in__email-success js-txt-notif"></p>
                    <div class="form--primary">
                        <script>
                            let token = '{{$url}}';
                        </script>
                        <form action="/verify-password-reset/{{ $url }}" method="POST">
                            @csrf
                            <div class="form--primary__group">
                                <label for="passwordTxt" class="form--primary__n-lbl">Enter your Password: </label>
                                <input type="password" id="passwordTxt" placeholder="Enter your password" name="passwordTxt">
                                <i class="form--primary__icon-pw js-toggle-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 17.997 10.805">
                                        <path id="Fill_1159" data-name="Fill 1159" d="M9,10.8A10.585,10.585,0,0,1,3.377,9.232,11.5,11.5,0,0,1,.427,6.616a1.944,1.944,0,0,1,0-2.426,11.488,11.488,0,0,1,2.95-2.617A10.584,10.584,0,0,1,9,0a10.586,10.586,0,0,1,5.624,1.573,11.472,11.472,0,0,1,2.95,2.617,1.944,1.944,0,0,1,0,2.426,11.479,11.479,0,0,1-2.95,2.616A10.587,10.587,0,0,1,9,10.8ZM9,1.544a9.3,9.3,0,0,0-7.364,3.6.391.391,0,0,0,0,.509A9.3,9.3,0,0,0,9,9.261a9.3,9.3,0,0,0,7.364-3.6.391.391,0,0,0,0-.509A9.3,9.3,0,0,0,9,1.544ZM9,8.49A3.087,3.087,0,1,1,12.087,5.4,3.09,3.09,0,0,1,9,8.49ZM9,3.859A1.544,1.544,0,1,0,10.543,5.4,1.545,1.545,0,0,0,9,3.859Z" transform="translate(-0.001)"/>
                                    </svg>
                                </i>
                            </div>
                            <div class="form--primary__group">
                                <label for="confirmTxt" class="form--primary__n-lbl">Confirm your Password: </label>
                                <input type="password" id="confirmTxt" placeholder="Confirm your password" name="confirmTxt">
                                <i class="form--primary__icon-pw js-toggle-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 17.997 10.805">
                                        <path id="Fill_1159" data-name="Fill 1159" d="M9,10.8A10.585,10.585,0,0,1,3.377,9.232,11.5,11.5,0,0,1,.427,6.616a1.944,1.944,0,0,1,0-2.426,11.488,11.488,0,0,1,2.95-2.617A10.584,10.584,0,0,1,9,0a10.586,10.586,0,0,1,5.624,1.573,11.472,11.472,0,0,1,2.95,2.617,1.944,1.944,0,0,1,0,2.426,11.479,11.479,0,0,1-2.95,2.616A10.587,10.587,0,0,1,9,10.8ZM9,1.544a9.3,9.3,0,0,0-7.364,3.6.391.391,0,0,0,0,.509A9.3,9.3,0,0,0,9,9.261a9.3,9.3,0,0,0,7.364-3.6.391.391,0,0,0,0-.509A9.3,9.3,0,0,0,9,1.544ZM9,8.49A3.087,3.087,0,1,1,12.087,5.4,3.09,3.09,0,0,1,9,8.49ZM9,3.859A1.544,1.544,0,1,0,10.543,5.4,1.545,1.545,0,0,0,9,3.859Z" transform="translate(-0.001)"/>
                                    </svg>
                                </i>
                            </div>
                            <input type="submit" value="Reset password" class="form--primary__bttn" id="resetPasswordBttn">
                        </form>
                    </div>
                </div>
                <div class="line--one-h sign-in__line"></div>
                <p class="sign-in__registration-txt">Already have an account? <a href="/signin" class="sign-in__registration-link">Signin here!</a></p>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="/assets/js/modules/password.reset.js"></script>
@endsection

