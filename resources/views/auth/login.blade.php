@extends('partials.base')
@section('title')
    Sign in to continue
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/login.style.css">
@endsection

@section('body-content')
    <div class="wrapper d-only-lrg-flex">
        <div class="sign-in__banner disp-lrg-only">
            <div class="sign-in__bg"></div>
            <div class="sign-in__banner--inner">
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
                <div class="sign-in__description">
                    <h1 class="sign-in__title">We love learning!</h1>
                    <p class="sign-in__txt">This is an online platform that helps you to lorem ipsum lorem ipsum lorem ipsum</p>
                </div>
                <div class="sign-in__form-wrapper">
                    @include('partials.flash message.error')
                    @if(Session::get('email'))
                        <p class="flash--error">{{ Session::get('email') }}, <a href="#" class="sign-in__resend-email-link">Click here to send email</a></p>
                    @endif
                    <p class="sign-in__email-success js-txt-notif"></p>
                    <div class="form--primary">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form--primary__group">
                                <label for="emailTxt" class="form--primary__n-lbl">Enter your email: </label>
                                <input type="email" id="emailTxt" placeholder="Enter your email" name="emailTxt" autocomplete="off">
                                <i class="form--primary__icon-user"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 18 18">
                                        <path id="Shape" d="M0,9a9,9,0,1,1,9,9A9.01,9.01,0,0,1,0,9Zm9,7.616a7.585,7.585,0,0,0,5.091-1.956,4,4,0,0,0-1.313-.692c-.1-.038-.212-.075-.348-.121l-.356-.12c-1.288-.435-1.868-.786-2.117-1.608a1.745,1.745,0,0,1-.051-.206,2.195,2.195,0,0,1,.128-1.29,1.957,1.957,0,0,1,.544-.734,2.6,2.6,0,0,0,.962-2.119A2.615,2.615,0,0,0,9,5.077,2.587,2.587,0,0,0,6.461,7.77a2.624,2.624,0,0,0,.924,2.1,2.1,2.1,0,0,1,.526.642,2.047,2.047,0,0,1,.183,1.419,1.067,1.067,0,0,1-.041.157c-.218.81-.782,1.157-2.019,1.58l-.411.139c-.16.054-.285.1-.4.141a3.984,3.984,0,0,0-1.311.712A7.586,7.586,0,0,0,9,16.616ZM12.923,7.77a3.99,3.99,0,0,1-1.438,3.163.615.615,0,0,0-.179.235.857.857,0,0,0-.04.486.428.428,0,0,0,.012.051c.071.234.376.418,1.238.71l.355.118c.146.049.263.09.376.13a5.209,5.209,0,0,1,1.787.978,7.616,7.616,0,1,0-12.069,0,5.241,5.241,0,0,1,1.774-.993c.132-.049.268-.1.438-.154l.409-.138c.8-.273,1.081-.447,1.149-.689,0,.006,0-.005.006-.031a.709.709,0,0,0-.054-.48.835.835,0,0,0-.219-.25A4.012,4.012,0,0,1,5.077,7.77,3.969,3.969,0,0,1,9,3.693,4,4,0,0,1,12.923,7.77Z" fill="#141124"/>
                                    </svg>
                                </i>
                            </div>
                            <div class="form--primary__group">
                                <a href="#" class="form--primary__forgot-pw js-forgot-password">Forgot password?</a>
                                <label for="passwordTxt" class="form--primary__n-lbl">Enter your Password: </label>
                                <input type="password" id="passwordTxt" placeholder="Enter your password" name="passwordTxt">
                                <i class="form--primary__icon-pw js-toggle-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 17.997 10.805">
                                        <path id="Fill_1159" data-name="Fill 1159" d="M9,10.8A10.585,10.585,0,0,1,3.377,9.232,11.5,11.5,0,0,1,.427,6.616a1.944,1.944,0,0,1,0-2.426,11.488,11.488,0,0,1,2.95-2.617A10.584,10.584,0,0,1,9,0a10.586,10.586,0,0,1,5.624,1.573,11.472,11.472,0,0,1,2.95,2.617,1.944,1.944,0,0,1,0,2.426,11.479,11.479,0,0,1-2.95,2.616A10.587,10.587,0,0,1,9,10.8ZM9,1.544a9.3,9.3,0,0,0-7.364,3.6.391.391,0,0,0,0,.509A9.3,9.3,0,0,0,9,9.261a9.3,9.3,0,0,0,7.364-3.6.391.391,0,0,0,0-.509A9.3,9.3,0,0,0,9,1.544ZM9,8.49A3.087,3.087,0,1,1,12.087,5.4,3.09,3.09,0,0,1,9,8.49ZM9,3.859A1.544,1.544,0,1,0,10.543,5.4,1.545,1.545,0,0,0,9,3.859Z" transform="translate(-0.001)"/>
                                    </svg>
                                </i>
                            </div>
                            <div class="form--primary__group--check">
                                <input type="checkbox" id="rememberMe" name="rememberMe" value="rememberMe">
                                <label for="rememberMe" class="form--primary__r-lbl">Remember me?</label>
                                <i class="form--primary__check-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 9.428">
                                        <path id="Shape" d="M4.578,10.5a.857.857,0,1,0,1.129,1.29l3.429-3A.857.857,0,0,0,9.16,7.52L1.446.234A.857.857,0,0,0,.269,1.48L7.3,8.119Z" transform="translate(12) rotate(90)"/>
                                    </svg>
                                </i>
                            </div>
                            <input type="submit" value="Sign in" class="form--primary__bttn">
                        </form>
                    </div>
                </div>
                <div class="line--one-h sign-in__line"></div>
                <p class="sign-in__registration-txt">Don't have an account? <a href="/signup" class="sign-in__registration-link">Signup here!</a></p>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="/assets/js/modules/signin.app.js"></script>
@endsection

