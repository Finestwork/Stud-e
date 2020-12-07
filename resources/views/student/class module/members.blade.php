@extends('partials.base')

@section('title')
   Members - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.member.style.css">
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
    <main class="member">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <ul class="sidelinks__links-container">
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.modules', 'classUniqueID') }}" class="sidelinks__links">Modules</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.tasks', 'classUniqueID') }}" class="sidelinks__links">Tasks</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.discussion', 'classUniqueID') }}" class="sidelinks__links">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members', 'classUniqueID') }}" class="sidelinks__links link--active">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="member__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('student.class') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                </div>
                            </div>
                            <div class="member__main-container">
                                <div class="member__labels">
                                    <p class="member__labels-txt">Name</p>
                                    <p class="member__labels-txt">Date of join</p>
                                </div>
                                <ul class="member__lists">
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                    <li class="member__list">
                                        <div class="member__list-left">
                                            <div class="member__list-img">
                                                <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                            </div>
                                            <div class="member__list-info">
                                                <p class="member__list-name">Juan Dela Cruz</p>
                                                <p class="member__list-position">Student</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">November 08, 2020</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>
                                    </li>
                                </ul>
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
    <script src="/assets/js/modules/student/student.member.js"></script>
@endsection
