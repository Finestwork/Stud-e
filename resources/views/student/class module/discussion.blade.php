@extends('partials.base')

@section('title')
    Discussion - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.discussion.style.css">
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
    <main class="discussion">
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
                                <a href="{{ route('student.discussion', 'classUniqueID') }}" class="sidelinks__links link--active">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members', 'classUniqueID') }}" class="sidelinks__links ">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="discussion__right">
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
                            <div class="discussion__main-container">
                                <div class="forum">
                                    <div class="col-sm-12 col-md-12 col-lrg-8">
                                        <ul class="forum__list-wrapper">
                                            <li class="forum__list-item student">
                                                <div class="forum__thread-starter-img-wrapper">
                                                    <div class="forum__thread-starter-img">
                                                        <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                    </div>
                                                    <span class="forum__thread-starter-position">Student</span>
                                                </div>
                                                <div class="forum__thread-starter-description-wrapper">
                                                    <h2 class="forum__thread-starter-topic"><a href="{{ route('student.forum', 'discussionUniqueID') }}" class="forum__thread-starter-topic-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis hic inventore nisi nobisr?</a></h2>
                                                    <p class="forum__thread-starter-date-info">Posted 3 days ago by <a href="#" class="forum__thread-starter-name">Juan Dela Cruz</a></p>
                                                    <div class="forum__thread-starter-xtra-wrapper">
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Eye icon.svg" alt="Icon for counting of views" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">2 views</span>
                                                        </div>
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Comment icon.svg" alt="Icon for counting of replies" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">1 Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="forum__list-item teacher">
                                                <div class="forum__thread-starter-img-wrapper">
                                                    <div class="forum__thread-starter-img">
                                                        <img src="/assets/imgs/test images/professor.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                    </div>
                                                    <span class="forum__thread-starter-position">Teacher</span>
                                                </div>
                                                <div class="forum__thread-starter-description-wrapper">
                                                    <h2 class="forum__thread-starter-topic"><a href="{{ route('student.forum', 'discussionUniqueID') }}" class="forum__thread-starter-topic-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis hic inventore nisi nobisr?</a></h2>
                                                    <p class="forum__thread-starter-date-info">Posted 3 days ago by your <a href="#" class="forum__thread-starter-name">teacher</a></p>
                                                    <div class="forum__thread-starter-xtra-wrapper">
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Eye icon.svg" alt="Icon for counting of views" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">2 views</span>
                                                        </div>
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Comment icon.svg" alt="Icon for counting of replies" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">1 Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="forum__list-item student">
                                                <div class="forum__thread-starter-img-wrapper">
                                                    <div class="forum__thread-starter-img">
                                                        <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                    </div>
                                                    <span class="forum__thread-starter-position">Student</span>
                                                </div>
                                                <div class="forum__thread-starter-description-wrapper">
                                                    <h2 class="forum__thread-starter-topic"><a href="{{ route('student.forum', 'discussionUniqueID') }}" class="forum__thread-starter-topic-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis hic inventore nisi nobisr?</a></h2>
                                                    <p class="forum__thread-starter-date-info">Posted 3 days ago by <a href="#" class="forum__thread-starter-name">Juan Dela Cruz</a></p>
                                                    <div class="forum__thread-starter-xtra-wrapper">
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Eye icon.svg" alt="Icon for counting of views" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">2 views</span>
                                                        </div>
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Comment icon.svg" alt="Icon for counting of replies" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">1 Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="forum__list-item student">
                                                <div class="forum__thread-starter-img-wrapper">
                                                    <div class="forum__thread-starter-img">
                                                        <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                    </div>
                                                    <span class="forum__thread-starter-position">Student</span>
                                                </div>
                                                <div class="forum__thread-starter-description-wrapper">
                                                    <h2 class="forum__thread-starter-topic"><a href="{{ route('student.forum', 'discussionUniqueID') }}" class="forum__thread-starter-topic-link">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid debitis hic inventore nisi nobisr?</a></h2>
                                                    <p class="forum__thread-starter-date-info">Posted 3 days ago by <a href="#" class="forum__thread-starter-name">Juan Dela Cruz</a></p>
                                                    <div class="forum__thread-starter-xtra-wrapper">
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Eye icon.svg" alt="Icon for counting of views" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">2 views</span>
                                                        </div>
                                                        <div class="forum__thread-starter-xtra">
                                                            <div class="forum__thread-starter-xtra__icon-box">
                                                                <img src="/assets/svgs/icons/Comment icon.svg" alt="Icon for counting of replies" class="img-fluid">
                                                            </div>
                                                            <span class="forum__thread-starter-xtra__icon-label">1 Reply</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lrg-4 forum__right">
                                        <div class="forum__side-wrapper">
                                            <h2 class="forum__side-label">Welcome to discussion board</h2>
                                            <p class="forum__side-txt">Got concerns? You can start a class discussion here.</p>
                                            <button href="#" class="bttn bttn--tertiary--ghost forum__bttn">Start a thread</button>
                                        </div>
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
    <script src="/assets/js/modules/student/student.discussion.js"></script>
@endsection
