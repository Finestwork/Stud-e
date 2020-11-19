@extends('partials.base')
@section('title')
    Sign in | Welcome to Stud-e
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/login.style.css">
@endsection

@section('body-content')
<div class="container">
    <div class="row">
        <div class="col-lrg-5 disp-lrg-only">
            <div class="banner--logo__wrapper">
                <div class="banner--logo__upper-part">
                    <div class="banner--w-logo__box">
                        <img src="/assets/svgs/logo.svg" alt="Website's logo" class="img-fluid">
                    </div>
                    <p>Stud-e</p>
                </div>
                <div class="banner--logo__upper-part">
                    <p>Photo by <a href="https://unsplash.com/@siora18?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Siora Photography</a> on <a href="https://unsplash.com/s/photos/study?utm_source=unsplash&am
p;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></p>
                </div>
            </div>
        </div>
        <div class="col-lrg-7">
            <div class="sign-in__description">
                <h1 class="sign-in__title">We love communication!</h1>
                <p class="sign-in__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aut debitis delectus eligendi eveniet facere.</p>
            </div>
            <div class="form--primary">
                <form action="{{ route('signin') }}" method="POST">
                    @csrf
                    <div class="form--primary__group">
                        <label for="emailTxt" class="form--primary__n-lbl">Enter your email: </label>
                        <input type="email" id="emailTxt" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form--primary__group">
                        <a href="#" class="form--primary__forgot-pw">Forgot password?</a>
                        <label for="passwordTxt" class="form--primary__n-lbl">Enter your Password: </label>
                        <input type="password" id="passwordTxt" placeholder="Enter your password" name="password">
                    </div>
                    <div class="form--primary__group--check">
                        <input type="checkbox" id="rememberMe" name="rememberMe" value="rememberMe">
                        <label for="rememberMe" class="form--primary__r-lbl">Remember me?</label>
                    </div>
                    <input type="submit" value="Sign in" class="form--primary__bttn">
                </form>
            </div>
            <p>Don't have an account? <a href="/signup">Signup here!</a></p>
        </div>
    </div>
</div>
@endsection
