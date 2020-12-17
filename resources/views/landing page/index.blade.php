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
                        <a href="/signup" class="ghost--header__signup-bttn bttn--primary--ghost">Sign up</a>
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
                            <a href="{{ route('login') }}" class="ghost--header__nav-link">Sign in</a>
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
                            <p class="ghost--header__main-content__bottom">Micro-learn your way through your courses like a champ.
                                Choose options from Admin, Teacher or Student sign-up.
                                See what fits you below.
                            </p>
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
            <h2 class="heading--secondary">What do we offer?</h2>
            <p class="paragraph--heading mt-1 mb-3">Simple, we provide you with online services for your educational needs. Distance learning has never been easier. Try our Micro-learning platform today for your team, student or just your self. Improve your skills today with Stud-E.</p>
            <div class="card--primary">
                <div class="row">
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 1.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Sign-up as Admin</h3>
                        <p class="card--primary__txt">Do you need to arrange a team of educators/instructors to
                            conduct and distribute resources and for a course or a special training program for your school or organization? Then Admin profile is perfect for you.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 2.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Sign-up as a Teacher</h3>
                        <p class="card--primary__txt">If you already have a team/class code join as a teacher and start setting up your class. If you are an indipendent educator feel free to sign up just as you are (yes,everyone is welcome here) and start uploading your lessons for your class. What are you waiting for click here, Master Yoda.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 3.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Sign-up as a Student</h3>
                        <p class="card--primary__txt">If you have a team/class code from your admin or teacher, better put that here and set up your notes, reviewers and coordinate with your teacher/instructors to sharpen your skills. You have a bright future young one.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 4.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Organize your tasks to increase your productivity</h3>
                        <p class="card--primary__txt">Nothing says task complete like a good, clean and specific course list. Micro-Learning wants you to master each topic carefully. Take your time dear.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 5.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Learn at your own pace</h3>
                        <p class="card--primary__txt">Are you working hard for your future, don't sweat it. Micro-Learning has you covered. Courses have been strategically taylored to fit your convenience, allowing you to complete your tasks.</p>
                    </div>
                    <div class="col-md-3 col-lrg-4 card--primary__container">
                        <div class="card--primary__img-box">
                            <img src="/assets/svgs/card 6.svg" alt="Card's Image Box" class="img-fluid">
                        </div>
                        <h3 class="card--primary__title">Reasonable Prices</h3>
                        <p class="card--primary__txt">Wether you wanna try our services out or you want to be a teacher or an admin for your team, features and rates are transparent so you know what you are getting. #worthit.</p>
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
                                <span class="pricing-table__list-txt">Admin can create 15 teachers, 15 classrooms for each teachers and a maximum of 30 students per classroom</span>
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
                                <span class="pricing-table__list-txt">Upload grades </span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Post status updates for you and your students</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Set homework reminders</span>
                            </li>
                            <li class="pricing-table__list">
                           <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Post your weekly activities in an organized manner</span>
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
                                <span class="pricing-table--colored__list-txt">Admin can create 20(change mo na lang if wrongung number) teachers, 20 classrooms for each teachers and a maximum of 30 students per classroom</span>
                            </li>
                            <li class="pricing-table--colored__list">
                               <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Admin / Teachers can upload 10 modules per class</span>
                            </li>
                            <li class="pricing-table--colored__list">
                               <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Download Records and scores of your class</span>
                            </li>
                            <li class="pricing-table--colored__list">
                               <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Enable game reviewers for your class</span>
                            </li>
                            <li class="pricing-table--colored__list">
                               <span class="pricing-table--colored__icon">
                               <img src="/assets/svgs/icons/Fat Check-white.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table--colored__list-txt">Organize your weekly task for each class you have</span>
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
                                <span class="pricing-table__list-txt">
                                    Admin can create unlimited teachers, classrooms for each teachers and a maximum of 60 students per classroom
                                </span>
                            </li>
                            <li class="pricing-table__list">
                               <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">
                                    Admin / Teachers can upload unlimited modules per class
                                </span>
                            </li>
                            <li class="pricing-table__list">
                               <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Download Records and scores of your class</span>
                            </li>
                            <li class="pricing-table__list">
                               <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Enable game reviewers for your class</span>
                            </li>
                            <li class="pricing-table__list">
                               <span class="pricing-table__icon">
                               <img src="/assets/svgs/icons/Fat Check.svg" alt="Table Icon" class="img-fluid">
                           </span>
                                <span class="pricing-table__list-txt">Organize your weekly task for each class you have</span>
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
            <p class="paragraph--heading mt-1 mb-5">We are simple, fast and easy, everything you want in order to have a quick access to a Micro-Learning Platform. So if you are independent, or if you have a team with you, spend time with us, choose a platform that wants you to have an easy time learning.</p>
            <div class="illustration">
                <div class="row">
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-1">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 1.svg" alt="First Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">Organized.</h3>
                                <p class="illustration__txt">Organized and easy to track buttons for your classes/batches/students to be set up.
                                    User friendly website interface is faster and more efficient for you and for me and the entire human race.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 md-f-order-first">
                        <div class="illustration__card illustration__card--color-2">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 2.svg" alt="Second Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">User friendly.</h3>
                                <p class="illustration__txt">Learn in a safe community, all classmates are listed for you and your teachers, feel free to browse around the community and get assistance from people you know who is part of the class. Lessons are sharable inside the platform, co create quizes, reviewers and get a study buddy to make sure that your Micro-Learning experience is fun and interactive. You go braniac.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-1">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 3.svg" alt="Third Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">Time management.</h3>
                                <p class="illustration__txt">Learn at your own pace at your own time, sure there is a deadline, but you still get to work, and do your usual stuff, the aim of micro learning is to provide you small chunks of information you may be able to digest, so you can learn efficiently. Take your lessons where ever you may be.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lrg-12 col-xlrg-12 ">
                        <div class="illustration__card illustration__card--color-2">
                            <div class="illustration__img-box">
                                <img src="/assets/svgs/Banner 4.svg" alt="Fourth Banner Image of Illustration Section" class="img-fluid">
                            </div>
                            <div class="illustration__description">
                                <h3 class="illustration__title">Start now!</h3>
                                <p class="illustration__txt">You can monitor your progress, from start to finish. Your goal is our goal. You can take the reviewers first, create a quiz then take the scheduled exams, assignments or quizzes online, you know what they say right? Practice makes perfect.You can now create a reviewer wherever you are. Making your academic plans easier for you to achieve.</p>
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
