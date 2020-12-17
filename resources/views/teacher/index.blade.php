@extends('partials.base')

@section('title')
    Welcome to stud-e
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/home.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/caleandar.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>

@endsection

@section('body-content')
    @include('partials.navbar')
    @include('teacher.optional partials.sidebar-primary')
    <div class="container--main">
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lrg-8">
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
                            <a href="#" class="teachers-note__view-all teachers-note__read-more-link">View all announcements</a>
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
                    <div class="col-sm-12 col-md-5 col-lrg-4">
                        <div class="calendar" id="calendar">
                        </div>
                        <div class="task">
                            <div class="task__top">
                                <h2 class="task__title">Tasks</h2>
                                <a href="#" class="bttn-link--default task__bttn-link">View all tasks</a>
                            </div>
                            <ul class="task__item-container">
                                <span class="task__notif"></span> <!-- IF THERE'S AN ACTIVE TASK -->
                                <li class="task__item">
                                    <span class="task__item-top">
                                        <span class="task__item-lbl">Exam</span>
                                        <span class="task__item-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <ul class="task__item-bottom">
                                        <li class="task__link-item">
                                            <a href="#" class="task__link">
                                                <span class="task__link-lbl">Philosophy of man</span>
                                                <span class="task__link-ctr">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="task__item-container">
                                <span class="task__notif"></span> <!-- IF THERE'S AN ACTIVE TASK -->
                                <li class="task__item">
                                    <span class="task__item-top">
                                        <span class="task__item-lbl">Quiz</span>
                                        <span class="task__item-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <ul class="task__item-bottom">
                                        <li class="task__link-item">
                                            <a href="#" class="task__link">
                                                <span class="task__link-lbl">Philosophy of man</span>
                                                <span class="task__link-ctr">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="task__item-container">
                                <span class="task__notif"></span> <!-- IF THERE'S AN ACTIVE TASK -->
                                <li class="task__item">
                                    <span class="task__item-top">
                                        <span class="task__item-lbl">Seatwork</span>
                                        <span class="task__item-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <ul class="task__item-bottom">
                                        <li class="task__link-item">
                                            <a href="#" class="task__link">
                                                <span class="task__link-lbl">Philosophy of man</span>
                                                <span class="task__link-ctr">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="task__item-container">
                                <span class="task__notif"></span> <!-- IF THERE'S AN ACTIVE TASK -->
                                <li class="task__item">
                                    <span class="task__item-top">
                                        <span class="task__item-lbl">Assignment</span>
                                        <span class="task__item-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <ul class="task__item-bottom">
                                        <li class="task__link-item">
                                            <a href="#" class="task__link">
                                                <span class="task__link-lbl">Philosophy of man</span>
                                                <span class="task__link-ctr">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="task__item-container">
                                <span class="task__notif"></span> <!-- IF THERE'S AN ACTIVE TASK -->
                                <li class="task__item">
                                    <span class="task__item-top">
                                        <span class="task__item-lbl">Project</span>
                                        <span class="task__item-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"></path>
                                            </svg>
                                        </span>
                                    </span>
                                    <ul class="task__item-bottom">
                                        <li class="task__link-item">
                                            <a href="#" class="task__link">
                                                <span class="task__link-lbl">Philosophy of man</span>
                                                <span class="task__link-ctr">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    <script src="/assets/js/helpers/calendar.js"></script>
    <script src="/assets/js/helpers/tasks.js"></script>
    <script src="/assets/js/modules/teacher/home.js"></script>
@endsection
