@extends('partials.base')

@section('title')
    Welcome to Stud-e
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/landing.style.css">
@endsection

@section('body-content')
    <header class="ghost--header" id="home">
        <div class="shape-wrapper">
            <img src="/assets/svgs/shapes/1.svg" alt="Ghost's Header Shape 1" class="shape-1">
            <img src="/assets/svgs/shapes/2.svg" alt="Ghost's Header Shape 2" class="shape-2">
            <img src="/assets/svgs/shapes/3.svg" alt="Ghost's Header Shape 3" class="shape-3">
            <img src="/assets/svgs/shapes/4.svg" alt="Ghost's Header Shape 4" class="shape-4">
            <img src="/assets/svgs/shapes/5.svg" alt="Ghost's Header Shape 5" class="shape-5">
            <img src="/assets/svgs/shapes/6.svg" alt="Ghost's Header Shape 6" class="shape-6">
            <img src="/assets/svgs/shapes/7.svg" alt="Ghost's Header Shape 7" class="shape-7">
            <img src="/assets/svgs/shapes/8.svg" alt="Ghost's Header Shape 8" class="shape-8">
            <img src="/assets/svgs/shapes/9.svg" alt="Ghost's Header Shape 9" class="shape-9">
            <img src="/assets/svgs/shapes/10.svg" alt="Ghost's Header Shape 10 " class="shape-10 ">
            <img src="/assets/svgs/shapes/11.svg" alt="Ghost's Header Shape 11" class="shape-11">
            <img src="/assets/svgs/shapes/12.svg" alt="Ghost's Header Shape 12" class="shape-12">
            <img src="/assets/svgs/shapes/13.svg" alt="Ghost's Header Shape 13" class="shape-13">
            <img src="/assets/svgs/shapes/14.svg" alt="Ghost's Header Shape 14" class="shape-14">
        </div>
        <nav class="ghost--header__nav" id="headerNav">
            <div class="container">
                <div class="ghost--header__nav-flex">
                    <div class="ghost--header__nav-top">
                        <div class="ghost--header__nav-left">
                            <a href="/" class="ghost--header__logo-link">
                                <div class="ghost--header__logo-box">
                                    <img src="/assets/svgs/logo.svg" alt="Site's Logo" class="img-fluid">
                                </div>
                                <span class="ghost--header__logo-txt">Stud-e</span>
                                <span class="ghost--header__logo-circle"></span>
                            </a>
                        </div>
                        <a href="#" class="ghost--header__signup-bttn bttn--primary--ghost">Sign up</a>
                        <button class="bttn ghost--header__hamburger-bttn" id="hamburgerBttn">
                            <span class="ghost--header__hamburger-bttn__line"></span>
                        </button>
                    </div>
                    <ul class="ghost--header__nav__list-container" id="hamburgerCollapse">
                        <li class="ghost--header__nav__list-item">
                            <a href="#home" class="ghost--header__nav-link link--active">Home</a></li>
                        <li class="ghost--header__nav__list-item">
                            <a href="#offer" class="ghost--header__nav-link">What we offer</a></li>
                        <li class="ghost--header__nav__list-item">
                            <a href="#pricing" class="ghost--header__nav-link">Pricing</a></li>
                        <li class="ghost--header__nav__list-item">
                            <a href="#features" class="ghost--header__nav-link">Features</a></li>
                        <li class="ghost--header__nav__list-item">
                            <a href="/signin" class="ghost--header__nav-link">Sign in</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="ghost--header__main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lrg-6 md-flex-grow-1">
                        <div class="ghost--header__main-content--left">
                            <p class="ghost--header__main-content__title--top">Welcome to
                                <span class="ghost--header__main-content__title--top__sub">Stud-e</span>
                            </p>
                            <h1 class="ghost--header__main-content__primary">Your online classroom <span class="ghost--header__main-content__primary--sub">that suits your needs.</span></h1>
                            <p class="ghost--header__main-content__bottom">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dicta eos, ex hic modi qui quod saepe vitae.</p>
                            <a href="#" class="bttn--primary ghost--header__main-content__bttn">Learn more</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-6 sm-flex-grow-1">
                        <div class="ghost--header__main-content--right">
                            <div class="ghost--header__main-content__img-box">
                                <img src="/assets/svgs/landing_banner.jpg" alt="Stud-e Banner" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </header>
    <section class="offer" id="offer">
        <div class="container">
            <div class="shape-wrapper">
                <img src="/assets/svgs/shapes/14.svg" alt="Offer Section Shape 14" class="shape-14">
                <img src="/assets/svgs/shapes/4.svg" alt="Offer Section Shape 4" class="shape-4">
                <img src="/assets/svgs/shapes/5.svg" alt="Offer Section Shape 5" class="shape-5">
                <img src="/assets/svgs/shapes/17.svg" alt="Offer Section Shape 17" class="shape-17">
                <img src="/assets/svgs/shapes/18.svg" alt="Offer Section Shape 18" class="shape-18">
                <img src="/assets/svgs/shapes/19.svg" alt="Offer Section Shape 19" class="shape-19">
                <img src="/assets/svgs/shapes/dot-big.svg" alt="Offer Section Dotted Background" class="shape-dot-big">
            </div>
            <h2 class="heading--secondary mt-4">What do we offer?</h2>
            <p class="paragraph--heading mt-1 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias commodi consectetur, cumque debitis eaque eos error, et eveniet fugiat magni minima mollitia officia officiis quae quod, totam veniam voluptates.</p>
            <div class="card--primary">
                <div class="row">
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 1.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 2.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 3.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 4.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 5.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 6.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">This is a title</h3>
                        <p class="card--primary__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cumque deserunt dicta eaque esse incidunt, maxime mollitia natus nesciunt numquam pariatur quam quis quod saepe suscipit tenetur vitae voluptate.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing-table" id="pricing">
        <div class="shape-wrapper">
            <img src="/assets/svgs/shapes/18.svg" alt="Curvy Background In Price Table" class="shape-16">
        </div>
        <div class="container">
            <h2 class="pricing-table__title heading--secondary">Pricing table</h2>
            <div class="row pricing-table__wrapper">
                <div class="col-md-2 col-lrg-4 col-xlrg-4">
                    <div class="pricing-table__card-wrapper">
                        <div class="pricing-table__top">
                            <h3 class="pricing-table__price-label">FREE</h3>
                            <p class="pricing-table__price mb-1">&#8369;0.00</p>
                        </div>
                        <ul class="pricing-table__list-wrapper mt-2">
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Admin / Teachers can upload 5 modules per class</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">More Features...</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">More Features...</span>
                            </li>
                        </ul>
                        <button type="button" class="bttn pricing-table__bttn">Get now</button>
                    </div>
                </div>
                <div class="col-md-2 col-lrg-4 col-xlrg-4">
                    <div class="pricing-table--colored__card-wrapper table--scaled">
                        <div class="pricing-table--colored--checked"></div>
                        <div class="pricing-table--colored__top">
                            <h3 class="pricing-table--colored__price-label">Basic</h3>
                            <p class="pricing-table--colored__price mb-1">&#8369;1,500.00</p>
                        </div>
                        <ul class="pricing-table--colored__list-wrapper mt-2">
                            <li class="pricing-table--colored__list">
                           <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                            </li>
                            <li class="pricing-table--colored__list">
                           <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Admin / Teachers can upload 5 modules per class</span>
                            </li>
                            <li class="pricing-table--colored__list">
                           <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">More Features...</span>
                            </li>
                            <li class="pricing-table--colored__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">More Features...</span>
                            </li>
                        </ul>
                        <button type="button" class="bttn pricing-table--colored__bttn">Get now</button>
                    </div>
                </div>
                <div class="col-md-2 col-lrg-4 col-xlrg-4">
                    <div class="pricing-table__card-wrapper">
                        <div class="pricing-table__top">
                            <h3 class="pricing-table__price-label">Premium</h3>
                            <p class="pricing-table__price mb-1">&#8369;2,500.00</p>
                        </div>
                        <ul class="pricing-table__list-wrapper mt-2">
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Admin can create 5 teachers, 5 classrooms for each teachers and a maximum of 30 students per classroom</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Admin / Teachers can upload 5 modules per class</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">More Features...</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">More Features...</span>
                            </li>
                        </ul>
                        <button type="button" class="bttn pricing-table__bttn">Get now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features" id="features">
        <div class="container">
            <div class="shape-wrapper">
                <img src="/assets/svgs/shapes/18.svg" alt="Features Background Shape" class="shape-18">
                <img src="/assets/svgs/shapes/19.svg" alt="Features Background Shape" class="shape-19">
                <img src="/assets/svgs/shapes/dot-small.svg" alt="Features Background Shape" class="shape-dot">
            </div>
            <h2 class="heading--secondary mt-5">Why Us?</h2>
            <p class="paragraph--heading mt-1 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias commodi consectetur, cumque debitis eaque eos error, et eveniet fugiat magni minima mollitia officia officiis quae quod, totam veniam voluptates.</p>
            <div class="illustration">
                <div class="row">
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-1">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 1.svg" alt="First Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">This is a title</h3>
                                <p class="illustration__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur distinctio dolorem earum, excepturi hic incidunt ipsa iste laboriosam laborum, maxime minima quod repellendus soluta ullam, ut veritatis vitae voluptatem?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 md-f-order-first">
                        <div class="illustration__card illustration__card--color-2">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 2.svg" alt="Second Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">This is a title</h3>
                                <p class="illustration__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur distinctio dolorem earum, excepturi hic incidunt ipsa iste laboriosam laborum, maxime minima quod repellendus soluta ullam, ut veritatis vitae voluptatem?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-1">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 3.svg" alt="Third Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">This is a title</h3>
                                <p class="illustration__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur distinctio dolorem earum, excepturi hic incidunt ipsa iste laboriosam laborum, maxime minima quod repellendus soluta ullam, ut veritatis vitae voluptatem?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-2">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 4.svg" alt="Fourth Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">This is a title</h3>
                                <p class="illustration__txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consectetur distinctio dolorem earum, excepturi hic incidunt ipsa iste laboriosam laborum, maxime minima quod repellendus soluta ullam, ut veritatis vitae voluptatem?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lrg-4 sm-mx-auto">
                    <a href="#home" class="footer__link">Terms & Agreement</a>
                    <a href="#" class="footer__link">Privacy Policy</a>
                </div>
                <div class="col-md-3 col-lrg-4 sm-mx-auto">
                    <p class="footer__mssg"><a href="/" class="footer__link">&copy; Stud-e 2020, All rights reserved.</a></p>
                </div>
            </div>
        </div>
    </footer>
@endsection




@section('script')
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/libraries/scrolltosmooth.min.js"></script>
    <script src="/assets/js/landing.app.js"></script>
@endsection

