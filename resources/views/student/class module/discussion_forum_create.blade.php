@extends('partials.base')

@section('title')
    Create discussion - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.discussion.board.style.css">
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
    <main class="discussion-board">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <ul class="sidelinks__links-container">
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.modules') }}" class="sidelinks__links">Modules</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.tasks') }}" class="sidelinks__links">Tasks</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.discussion') }}" class="sidelinks__links link--active">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members') }}" class="sidelinks__links ">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="discussion-board__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('classroom.index') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <a href="{{ route('student.discussion', 'classUniqueID') }}" class="breadcrumbs__link">Discussion board</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">Creating your own discussion</span>
                                </div>
                            </div>
                            <div class="discussion-board__main-container">
                                <div class="discussion-board__top-line teacher-line"></div>
                                <div class="discussion-board__create-container">
                                    <form>
                                        @csrf
                                        <div class="discussion-board__title-area">
                                            <label class="discussion-board__label" for="titleTxt">Title</label>
                                            <input type="text" class="discussion-board__title-textarea" id="titleTxt" placeholder="Place your title here">
                                        </div>
                                        <div class="discussion-board__body-area">
                                            <label class="discussion-board__label" for="bodyTxt">Message</label>
                                            <textarea type="text" class="discussion-board__body-textarea" id="bodyTxt" placeholder="Place your message here"></textarea>
                                        </div>
                                        <button type="submit" class="bttn bttn--primary--small discussion-board__form-bttn">Submit your reply</button>
                                    </form>
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
    <script src="/assets/js/libraries/scrolltosmooth.min.js"></script>
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/student/student.discussion.board.js"></script>
@endsection
