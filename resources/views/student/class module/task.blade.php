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
                                <a href="{{ route('student.modules') }}" class="sidelinks__links">Modules</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.tasks') }}" class="sidelinks__links link--active">Tasks</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.discussion') }}" class="sidelinks__links">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members') }}" class="sidelinks__links ">Members</a>
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
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 1C4.55228 1 5 1.44772 5 2V10.1707C6.16519 10.5825 7 11.6938 7 13C7 14.3062 6.16519 15.4175 5 15.8293V22C5 22.5523 4.55228 23 4 23C3.44772 23 3 22.5523 3 22V15.8293C1.83481 15.4175 1 14.3062 1 13C1 11.6938 1.83481 10.5825 3 10.1707V2C3 1.44772 3.44772 1 4 1ZM12 1C12.5523 1 13 1.44772 13 2V5.17071C14.1652 5.58254 15 6.69378 15 8C15 9.30622 14.1652 10.4175 13 10.8293V22C13 22.5523 12.5523 23 12 23C11.4477 23 11 22.5523 11 22V10.8293C9.83481 10.4175 9 9.30622 9 8C9 6.69378 9.83481 5.58254 11 5.17071V2C11 1.44772 11.4477 1 12 1ZM20 1C20.5523 1 21 1.44772 21 2V13.1707C22.1652 13.5825 23 14.6938 23 16C23 17.3062 22.1652 18.4175 21 18.8293V22C21 22.5523 20.5523 23 20 23C19.4477 23 19 22.5523 19 22V18.8293C17.8348 18.4175 17 17.3062 17 16C17 14.6938 17.8348 13.5825 19 13.1707V2C19 1.44772 19.4477 1 20 1ZM12 7C11.4477 7 11 7.44772 11 8C11 8.55228 11.4477 9 12 9C12.5523 9 13 8.55228 13 8C13 7.44772 12.5523 7 12 7ZM4 12C3.44772 12 3 12.4477 3 13C3 13.5523 3.44772 14 4 14C4.55228 14 5 13.5523 5 13C5 12.4477 4.55228 12 4 12ZM20 15C19.4477 15 19 15.4477 19 16C19 16.5523 19.4477 17 20 17C20.5523 17 21 16.5523 21 16C21 15.4477 20.5523 15 20 15Z" fill="#8c93b1"/>
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
                                                    <span class="selection--primary__txt">All</span>
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
                                                    <span class="selection--primary__txt">Assigned</span>
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
                                                        <td><a href="{{ route('student.task.page', 'taskID') }}" class="table__link">Different branches of science</a></td>
                                                        <td class="table__type">Assignment</td>
                                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="table__row-head">
                                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                                        </th>
                                                        <td><a href="{{ route('student.task.page', 'taskID') }}" class="table__link">Different branches of science</a></td>
                                                        <td class="table__type">Quiz</td>
                                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="table__row-head">
                                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                                        </th>
                                                        <td><a href="{{ route('student.task.page', 'taskID') }}" class="table__link">Different branches of science</a></td>
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
