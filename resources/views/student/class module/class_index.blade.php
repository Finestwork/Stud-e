@extends('partials.base')

@section('title')
     Welcome to your classroom!
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.class.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>

    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
@endsection

@section('body-content')
    @include('partials.navbar')
    @include('student.optional partials.sidebar')
    <div class="container--main">
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lrg-10 mx-auto">
                        <div class="banner class__banner">
                            <div class="banner__img-box">
                                <img src="/assets/illustration/Class banner illustration.svg" alt="An illustration for class banner" class="img-fluid">
                            </div>
                            <div class="banner__description">
                                <h1 class="banner__title">Classroom</h1>
                                <p class="banner__txt">Here's the list of your currently enrolled subjects. You can use the button below to filter your subjects.</p>
                                <div class="option">
                                    <div class="option__top" id="optionBttn">
                                        <p class="option__selected-text">Currently Enrolled</p>
                                        <div class="option__icon-box">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#ffffff"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <ul class="option__selection-container">
                                        <li class="option__select">Currently Enrolled</li>
                                        <li class="option__select">Completed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lrg-12 col-xlrg-12">
                        <div class="class-card__loader">
                            <div class="loader"></div>
                            <p class="loader__text">Please wait while we set things up for you!</p>
                        </div>
                        <div class="current" id="current">
                            <div class="col-sm-12 col-md-12 col-lrg-12">
                                <div class="row">
                                    @if($classrooms)
                                        @foreach($classrooms as $row)
                                            <div class="col-sm-12 col-md-6 col-lrg-6 col-xlrg-4">
                                                  <div class="class-card">
                                                      <div class="class-card__top">
                                                            <div class="class-card__left">
                                                                <!-- IMAGE WILL BE REPLACED AFTER I FX PROFILE PAGE -->
                                                                <div class="class-card__img-border">
                                                                    <div class="class-card__img-box">
                                                                        <img src="/assets/imgs/test images/professor.jpg" alt="Teacher's profile picture" class="adjust-img-js">
                                                                    </div>
                                                                </div>
                                                                <div class="class-card__img-name">Johnny Bravo</div>
                                                                <div class="class-card__img-lbl">Teacher</div>
                                                            </div>
                                                            <div class="class-card__right">
                                                                <p class="class-card__subject">{{ $row[0]['classroom_name'] }}</p>
                                                                <p class="class-card__more-info">{{ $row[0]['classroom_section'] }}</p>
                                                                <a href="{{ route('teacher.home', $row[0]['classroom_unique_url']) }}" class="bttn-link--primary"> View Classroom </a>
                                                            </div>
                                                      </div>
                                                        <p class="class-card__footer">Date created: {{date('F j, Y', strtotime($row[0]['created_at'])) }}</p>
                                                    </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="empty">
                                            <div class="empty__illustration">
                                                <img src="/assets/illustration/Empty list.svg" alt="Illustration for an empty class list" class="img-fluid">
                                            </div>
                                            <h1 class="empty__title">Empty list.</h1>
                                            <p class="empty__txt">Your request to join a classroom was considered but not yet approved.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="completed" id="completed">
                            <div class="col-sm-12 col-md-12 col-lrg-12">
                                <div class="row">
                                    <p>Under construction</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('student.optional partials.enroll')
        </main>
    </div>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    <script src="/assets/js/modules/student/student.class.js"></script>
    <script src="/assets/js/modules/student/popup.code.js"></script>
@endsection
