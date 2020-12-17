@extends('partials.base')

@section('title')
    Members - {{ $classrooms[0]->classroom_name }}
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/classroom.members.style.css">
@endsection

@section('cs-js')
    <script type="text/javascript">
        let classUrl = '{{ $classrooms[0]->classroom_unique_url }}';
    </script>
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
@endsection


@section('body-content')
    @include('partials.navbar_box_shadow')
    @include('student.optional partials.fixed_independent_sidebar')
    <main class="member">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <div class="classroom__link-wrapper">
                            <div class="classroom__link-scrollbar">
                                <div class="classroom__links-container">
                                    @foreach($classrooms as $classroom)
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.schedule', $classroom->classroom_unique_url) }}" class="classroom__links">Schedule</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="#" class="classroom__links">Modules</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links ">Tasks</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links">Discussion</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.member', $classroom->classroom_unique_url) }}" class="classroom__links link--active">Members</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="member__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('teacher.classroom') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">{{ $classrooms[0]->classroom_name }}</span>
                                </div>
                            </div>
                            <div class="member__bttn-controls">
                                <button type="button" class="bttn member__bttn member__bttn--active js-bttn-accepted">Accepted</button>
                                <button type="button" class="bttn member__bttn js-bttn-request">Request</button>
                                <button type="button" class="bttn member__bttn js-bttn-blocked">Blocked</button>
                            </div>
                            @if(count($students) === 0)
                                <div class="member__empty">
                                    @include('teacher.optional partials.empty_list')
                                </div>
                            @else
                                <div class="member__empty" style="display: none;">
                                    @include('teacher.optional partials.empty_list')
                                </div>
                                <div class="member__main-container">
                                    <div class="member__labels">
                                        <p class="member__labels-txt">Name</p>
                                        <p class="member__labels-txt">Date of join</p>
                                    </div>
                                    <ul class="member__lists">
                                        @foreach($students as $student)
                                            <li class="member__list">
                                                <div class="member__list-left">
                                                    <div class="member__list-img">
                                                        <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                                    </div>
                                                    <div class="member__list-info">
                                                        <p class="member__list-name">{{ ucfirst($student[0]->f_name) . ' ' . ucfirst($student[0]->l_name) }}</p>
                                                        <p class="member__list-position">Student</p>
                                                    </div>
                                                </div>
                                                <!-- VIEWING OF PROFILE PAGE WILL BE AVAILABLE AFTER FIXING THE PROFILE PAGE -->
                                                <div class="member__list-right">
                                                    <p class="member__list-right-p">{{ date('F j, Y',strtotime($student[0]->created_at)) }}</p>
                                                    <button class="bttn member__bttn--option">
                                                        <span class="member__bttn--option__circle circle-1"></span>
                                                        <span class="member__bttn--option__circle circle-2"></span>
                                                        <span class="member__bttn--option__circle circle-3"></span>
                                                    </button>
                                                    <div class="member__option-panel">
                                                        <button class="member__panel-bttn">Remove Student</button>
                                                        <button class="member__panel-bttn">Block Student</button>
                                                        <a href="#" class="member__panel-bttn">View Profile</a>
                                                    </div>
                                                    {{--                                                <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>--}}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="loader-box">
                                <div class="loader"></div>
                                <p class="loader__text">Please wait while we set things up for you!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup__bg popup--hidden">
            <div class="popup__q-container">
                <div class="popup__txt-container">
                    <p class="popup__message">Are you sure?</p>
                    <div class="popup__bttn-box">
                        <button class="popup__yes bttn">Yes</button>
                        <button class="popup__no bttn">No</button>
                    </div>
                </div>
                <div class="popup__loader-container">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                    <p class="popup__loading-message">Please wait, We are just getting things ready.</p>
                </div>
                <div class="popup__error-message">
                    <p class="popup__error-txt">Bummer! Something went wrong please try again later.</p>
                    <button class="popup__error-bttn bttn" type="button">Okay, I understand</button>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/teacher/classroom/member.js"></script>
@endsection
