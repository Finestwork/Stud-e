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
p;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></p>
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
                    <h1 class="sign-in__title">We love communication!</h1>
                    <p class="sign-in__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut debitis delectus eligendi eveniet facere.</p>
                </div>
                <div class="form--primary">
                    <form action="{{ route('signin') }}" method="POST">
                        @csrf
                        <div class="form--primary__group">
                            <label for="emailTxt" class="form--primary__n-lbl">Enter your email: </label>
                            <input type="email" id="emailTxt" placeholder="Enter your email" name="email" autocomplete="off">
                        </div>
                        <div class="form--primary__group">
                            <a href="#" class="form--primary__forgot-pw">Forgot password?</a>
                            <label for="passwordTxt" class="form--primary__n-lbl">Enter your Password: </label>
                            <input type="password" id="passwordTxt" placeholder="Enter your password" name="password">
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
                <div class="line--one-h sign-in__line"></div>
                <p class="sign-in__registration-txt">Don't have an account? <a href="/signup" class="sign-in__registration-link">Signup here!</a></p>
            </div>
        </div>
    </div>
@endsection
