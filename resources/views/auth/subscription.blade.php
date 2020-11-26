@extends('partials.base')

@section('title')Step 3 - Subscription @endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/subscription.style.css">
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
        <div class="steps">
            <div class="steps__item-wrapper">
                <div class="steps__check-box">
                    <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Progress icon" class="img-fluid">
                </div>
                <span class="steps__message--t">Choosing your account</span>
            </div>
            <div class="steps__line"></div>
            <div class="steps__item-wrapper">
                <div class="steps__check-box">
                    <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Progress icon" class="img-fluid">
                </div>
                <span class="steps__message--b">Verify your email</span>
            </div>
            <div class="steps__line"></div>
            <div class="steps__item-wrapper steps--active">
                <p class="steps__number">3</p>
                <span class="steps__message--t">Subscription</span>
            </div>
        </div>
        <div class="subscription">
            <h1 class="subscription__title"><span class="subscription__title--primary">Flexible</span> Plans</h1>
            <p class="subscription__txt">Choose a plan that works best for you and your class.</p>
            <div class="subscription__bttn-box">
                <button type="button" class="bttn subscription__bttn--teacher subscribe--active">Teacher</button>
                <button type="button" class="bttn subscription__bttn--admin">Admin</button>
            </div>
            <div class="subscription__table-box">
                <div class="pricing-table--secondary">
                    <div class="pricing-table--secondary__top">
                        <div class="pricing-table--secondary__logo-1"></div>
                        <div class="pricing-table--secondary__info">
                            <p class="pricing-table--secondary__title">Free</p>
                            <span class="pricing-table--secondary__price">&#8369;1,500.00</span>
                        </div>
                    </div>
                    <div class="pricing-table--secondary__line"></div>
                    <ul class="pricing-table--secondary__list-wrapper">
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">Admin / Teachers can upload 5 modules per class</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">More Features..</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">More Features..</span>
                        </li>
                    </ul>
                    <button type="button" class="bttn pricing-table--secondary__bttn">Get now</button>
                </div>
                <div class="pricing-table--secondary--colored">
                    <div class="pricing-table--secondary--colored__top">
                        <div class="pricing-table--secondary--colored__logo"></div>
                        <div class="pricing-table--secondary--colored__info">
                            <p class="pricing-table--secondary--colored__title">Basic</p>
                            <span class="pricing-table--secondary--colored__price">&#8369;1,500.00</span>
                        </div>
                    </div>
                    <div class="pricing-table--secondary--colored__line"></div>
                    <ul class="pricing-table--secondary--colored__list-wrapper">
                        <li class="pricing-table--secondary--colored__list-item">
                            <span class="pricing-table--secondary--colored__list-icon">
                                <img src="/assets/svgs/icons/Fat Check-dirty-white.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary--colored__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary--colored__list-icon">
                                <img src="/assets/svgs/icons/Fat Check-dirty-white.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary--colored__list-txt">Admin / Teachers can upload 5 modules per class</span>
                        </li>
                        <li class="pricing-table--secondary--colored__list-item">
                            <span class="pricing-table--secondary--colored__list-icon">
                                <img src="/assets/svgs/icons/Fat Check-dirty-white.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary--colored__list-txt">More Features..</span>
                        </li>
                        <li class="pricing-table--secondary--colored__list-item">
                            <span class="pricing-table--secondary--colored__list-icon">
                                <img src="/assets/svgs/icons/Fat Check-dirty-white.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary--colored__list-txt">More Features..</span>
                        </li>
                    </ul>
                    <button type="button" class="bttn pricing-table--secondary--colored__bttn">Get now</button>
                </div>
                <div class="pricing-table--secondary">
                    <div class="pricing-table--secondary__top">
                        <div class="pricing-table--secondary__logo-2"></div>
                        <div class="pricing-table--secondary__info">
                            <p class="pricing-table--secondary__title">Premium</p>
                            <span class="pricing-table--secondary__price">&#8369;1,500.00</span>
                        </div>
                    </div>
                    <div class="pricing-table--secondary__line"></div>
                    <ul class="pricing-table--secondary__list-wrapper">
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">Admin / Teachers can upload 5 modules per class</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">More Features..</span>
                        </li>
                        <li class="pricing-table--secondary__list-item">
                            <span class="pricing-table--secondary__list-icon">
                                <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                            </span>
                            <span class="pricing-table--secondary__list-txt">More Features..</span>
                        </li>
                    </ul>
                    <button type="button" class="bttn pricing-table--secondary__bttn">Get now</button>
                </div>
            </div>
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







