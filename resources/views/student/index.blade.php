@extends('partials.base')

@section('title')
    Welcome to stud-e
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.home.style.css">
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
    @include('student.optinal partials.sidebar')

    <div class="container--main">
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lrg-8">
                        <section class="schedule">
                            <div class="schedule__top">
                                <div class="schedule__left">
                                    <h1 class="schedule__title-lbl">Today's schedule</h1>
                                    <h2 class="schedule__date-lbl">Today - 03, December 2020</h2>
                                </div>
                                <a href="/student/schedules" class="bttn-link--default schedule__view-link">View schedule</a>
                            </div>
                            <ul class="schedule__item-wrapper">
                                <li class="schedule__item-lbl">
                                    <span class="schedule__lbl-subject">Subject name</span>
                                    <span class="schedule__lbl-teacher">Teacher</span>
                                    <span class="schedule__lbl-day">Day</span>
                                    <span class="schedule__lbl-time">Time</span>
                                </li>
                                <li class="schedule__item">
                                    <a href="/class/1231321321" class="schedule__item-link">
                                        <span class="schedule__item-subject">Philosophy of man</span>
                                        <span class="schedule__item-teacher">Juan Dela Cruz</span>
                                        <span class="schedule__item-day">Monday / Thursday</span>
                                        <span class="schedule__item-time">1:00pm - 2:00pm</span>
                                    </a>
                                </li>
                                <li class="schedule__item">
                                    <a href="/class/1231321321" class="schedule__item-link">
                                        <span class="schedule__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                        <span class="schedule__item-teacher">Juan Dela Cruz</span>
                                        <span class="schedule__item-day">Monday / Thursday</span>
                                        <span class="schedule__item-time">1:00pm - 2:00pm</span>
                                    </a>
                                </li>
                            </ul>
                        </section>
                        <div class="teachers-note">
                            <div class="teachers-note__top">
                                <div class="teachers-note__illustration-box">
                                    <img src="/assets/illustration/Announcements.svg" alt="Illustration for teacher's note" class="img-fluid">
                                </div>
                                <h1 class="teachers-note__title">Announcements</h1>
                            </div>
                            <div class="teachers-note__scrollbar" id="teachersNoteScrollbar">
                                <ul class="teachers-note__item-wrapper">
                                    <li class="teachers-note__item">
                                    <span class="teachers-note__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="test" class="adjust-img-js">
                                        </span>
                                        <span class="teachers-note__teacher-description">
                                            <h2 class="teachers-note__teacher-name">Juan Dela Cruz</h2>
                                            <p class="teachers-note__teacher-mssg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam commodi, consectetur cumert .......</p>
                                            <a href="#" class="bttn--link-read-more">Read more</a>
                                        </span>
                                    </li>
                                    <li class="teachers-note__item">
                                    <span class="teachers-note__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="test" class="img-fluid">
                                        </span>
                                        <span class="teachers-note__teacher-description">
                                            <h2 class="teachers-note__teacher-name">Juan Dela Cruz</h2>
                                            <p class="teachers-note__teacher-mssg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam commodi, consectetur cumert .......</p>
                                            <a href="#" class="bttn--link-read-more">Read more</a>
                                        </span>
                                    </li>
                                    <li class="teachers-note__item">
                                    <span class="teachers-note__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="test" class="img-fluid">
                                        </span>
                                        <span class="teachers-note__teacher-description">
                                            <h2 class="teachers-note__teacher-name">Juan Dela Cruz</h2>
                                            <p class="teachers-note__teacher-mssg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam commodi, consectetur cumert .......</p>
                                            <a href="#" class="bttn--link-read-more">Read more</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="teachers-note__view-all teachers-note__read-more-link">View all notifications</a>
                        </div>
                        <section class="enrolled-subjects">
                            <div class="enrolled-subjects__top">
                                <div class="enrolled-subjects__left">
                                    <h1 class="enrolled-subjects__title-lbl">Currently Enrolled Subjects</h1>
                                    <h2 class="enrolled-subjects__date-lbl">Still thinking about what should be the title, watcha think guys?</h2>
                                </div>
                            </div>
                            <div class="enrolled-subjects-scrollbar">
                                <ul class="schedule__item-wrapper">
                                    <li class="enrolled-subjects__item-lbl">
                                        <span class="enrolled-subjects__lbl-subject">Subject name</span>
                                        <span class="enrolled-subjects__lbl-teacher">Teacher</span>
                                        <span class="enrolled-subjects__lbl-day">Day</span>
                                        <span class="enrolled-subjects__lbl-time">Time</span>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Philosophy of man</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Philosophy of man</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Philosophy of man</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Philosophy of man</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Philosophy of man</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                    <li class="enrolled-subjects__item">
                                        <a href="/class/1231321321" class="enrolled-subjects__item-link">
                                            <span class="enrolled-subjects__item-subject">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                            <span class="enrolled-subjects__item-teacher">Juan Dela Cruz</span>
                                            <span class="enrolled-subjects__item-day">Monday / Thursday</span>
                                            <span class="enrolled-subjects__item-time">1:00pm - 2:00pm</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="enrolled-subjects__view-all">View all subjects</a>
                        </section>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lrg-4">
                        <div class="calendar"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>






@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    <script src="/assets/js/modules/student/student.index.js"></script>
@endsection
