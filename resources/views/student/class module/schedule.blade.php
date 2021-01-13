@extends('partials.base')

@section('title')
    Schedule - {{ $classrooms->classroom_name }}
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.schedule.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
@endsection


@section('body-content')
    @include('partials.navbar_box_shadow')
    @include('student.optional partials.fixed_independent_sidebar')
    <main class="classroom">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <div class="classroom__link-wrapper">
                            <div class="classroom__link-scrollbar">
                                <div class="classroom__links-container">
                                    @if($classrooms->is_classroom_active)
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.schedule', $classrooms->classroom_unique_url) }}" class="classroom__links link--active">Schedule</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{route('classroom.modules', $classrooms->classroom_unique_url)}}" class="classroom__links">Modules</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links ">Tasks</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links">Discussion</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{route('classroom.member', $classrooms->classroom_unique_url)}}" class="classroom__links">Members</a>
                                        </div>
                                    @else
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.schedule', $classrooms->classroom_unique_url) }}" class="classroom__links link--active">Schedule</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="classroom__right">
                            <div class="col-sm-12 col-md-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('classroom.index') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">{{ $classrooms->classroom_name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lrg-12 mt-5">
                                <div class="schedule">
                                    <div class="schedule__line"></div>
                                    @if(!$classrooms->is_classroom_active)
                                        <p class="schedule__inactive-wrapper">
                                        <span class="schedule__inactive-img">
                                            <img src="/assets/svgs/icons/Notif icon.svg" alt="Icon for inactive classroom" class="img-fluid">
                                        </span>
                                        <span class="schedule__inactive-txt">Notice: This classroom is currently inactive.</span></p>
                                    @endif
                                    <h1 class="schedule__title">Schedule</h1>
                                    <div class="schedule__form-group">
                                        <p class="schedule__txt">
                                            <span class="schedule__lbl">Classroom name:</span>
                                            {{ $classrooms->classroom_name }}
                                        </p>
                                    </div>
                                    <div class="schedule__form-group">
                                        <p class="schedule__txt">
                                            <span class="schedule__lbl">Classroom section</span>
                                            {{ $classrooms->classroom_section }}
                                        </p>
                                    </div>
                                    <div class="schedule__form-group">
                                        <p class="schedule__txt">
                                            <span class="schedule__lbl">Classroom description:</span>
                                            {{ $classrooms->classroom_description }}
                                        </p>
                                    </div>
                                    <div class="schedule__form-group">
                                        <p class="schedule__lbl">Classroom schedule: </p>
                                        <div class="schedule__form-wrap">
                                            @foreach($classrooms->classroom_schedule as $sched)
                                                <p class="schedule__default-sched">{{ $sched[0] . ' ' . $sched[1] }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="schedule__form-group">
                                        <p class="schedule__txt">
                                            <span class="schedule__lbl">Classroom code:</span>
                                            {{ $classrooms->class_code }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
@endsection
