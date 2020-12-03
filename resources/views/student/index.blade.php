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
                    </div>
                    <div class="col-sm-12 col-md-4 col-lrg-4">
                        <div class="black"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>






@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    {{--    <script src="/assets/js/modules/student/student.index.js"></script>--}}
@endsection
