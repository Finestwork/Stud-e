@extends('partials.base')

@section('title')
    Task - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.task.style.css">
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
    <main class="task">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <ul class="sidelinks__links-container">
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.modules', 'classUniqueID') }}" class="sidelinks__links">Modules</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.tasks', 'classUniqueID') }}" class="sidelinks__links link--active">Tasks</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.discussion', 'classUniqueID') }}" class="sidelinks__links">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members', 'classUniqueID') }}" class="sidelinks__links ">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="task__right">
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
                            <div class="col-sm-12 col-lrg-12">
                                <div class="task__main-container">
                                    <div class="task__filter-bttn-container">
                                        <button type="button" class="bttn bttn-filter" id="filterBttn">
                                    <span class="bttn-filter__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25">
                                          <g id="Group_465" data-name="Group 465" transform="translate(-350.5 -564.5)">
                                            <path id="Path-3" data-name="Path" d="M16,20.5V8.666a.5.5,0,0,1,1,0V20.5a.5.5,0,0,1-1,0Zm-8,0V16.715a.5.5,0,1,1,1,0V20.5a.5.5,0,0,1-1,0Zm-8,0V8.5a.5.5,0,0,1,1,0v12a.5.5,0,0,1-1,0Zm8-8.135V.5a.5.5,0,1,1,1,0V12.365a.5.5,0,1,1-1,0ZM0,4.424V.5a.5.5,0,1,1,1,0V4.424a.5.5,0,1,1-1,0Zm16-.239V.5a.5.5,0,1,1,1,0V4.185a.5.5,0,1,1-1,0Z" transform="translate(354.5 567.483)" fill="#0093e1"/>
                                            <path id="Path-4" data-name="Path" d="M11.5,13h-2A1.5,1.5,0,0,1,8,11.5v-2A1.5,1.5,0,0,1,9.5,8h2A1.5,1.5,0,0,1,13,9.5v2A1.5,1.5,0,0,1,11.5,13Zm-2-4a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2a.5.5,0,0,0-.5-.5Zm10-4h-2A1.5,1.5,0,0,1,16,3.5v-2A1.5,1.5,0,0,1,17.5,0h2A1.5,1.5,0,0,1,21,1.5v2A1.5,1.5,0,0,1,19.5,5Zm-2-4a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2a.5.5,0,0,0,.5-.5v-2a.5.5,0,0,0-.5-.5ZM3.5,5h-2A1.5,1.5,0,0,1,0,3.5v-2A1.5,1.5,0,0,1,1.5,0h2A1.5,1.5,0,0,1,5,1.5v2A1.5,1.5,0,0,1,3.5,5Zm-2-4a.5.5,0,0,0-.5.5v2a.5.5,0,0,0,.5.5h2A.5.5,0,0,0,4,3.5v-2A.5.5,0,0,0,3.5,1Z" transform="translate(352.5 571.483)" fill="#52c3ff"/>
                                          </g>
                                        </svg>
                                    </span>
                                            <span class="bttn-filter__txt">Filter</span>
                                        </button>
                                    </div>
                                    <div class="task__filter-container">
                                        <div class="selection--primary__group">
                                            <p class="selection--primary__label">Select a type:</p>
                                            <div class="selection--primary">
                                                <div class="selection--primary__top js-selection-type-task">
                                                    <span class="selection--primary__txt">Assigned</span>
                                                    <span class="selection--primary__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                        <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#6583fe"></path>
                                                    </svg>
                                                </span>
                                                </div>
                                                <ul class="selection--primary__list-container js-selection-type-task-item">
                                                    <li class="selection--primary__list-item">All</li>
                                                    <li class="selection--primary__list-item">Exam</li>
                                                    <li class="selection--primary__list-item">Assignment</li>
                                                    <li class="selection--primary__list-item">Quiz</li>
                                                    <li class="selection--primary__list-item">Seatwork</li>
                                                    <li class="selection--primary__list-item">Project</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="selection--primary__group">
                                            <p class="selection--primary__label">Select a status:</p>
                                            <div class="selection--primary">
                                                <div class="selection--primary__top js-selection-progress">
                                                    <span class="selection--primary__txt">All</span>
                                                    <span class="selection--primary__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                        <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#6583fe"></path>
                                                    </svg>
                                                </span>
                                                </div>
                                                <ul class="selection--primary__list-container js-selection-progress-item">
                                                    <li class="selection--primary__list-item">Assigned</li>
                                                    <li class="selection--primary__list-item">Pending</li>
                                                    <li class="selection--primary__list-item">Missed</li>
                                                    <li class="selection--primary__list-item">Done</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TABLE -->
                                    <!-- TABLE WILL BE FILTERED OUT THROUGH AJAX REQUEST -->
                                    <!-- THIS IS HOW JUST A PROTOTYPE WORKS -->
                                    <div class="task__table-container js-toggle-assigned">
                                        <div class="table__scrollbar" id="js-scrollbar-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Topic</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Starting Date</th>
                                                        <th scope="col">Deadline</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="table__row-head">
                                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                                        </th>
                                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                                        <td class="table__type">Assignment</td>
                                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="table__row-head">
                                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                                        </th>
                                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                                        <td class="table__type">Quiz</td>
                                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="table__row-head">
                                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                                        </th>
                                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                                        <td class="table__type">Project</td>
                                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <script src="/assets/js/modules/student/student.task.js"></script>
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
@endsection
