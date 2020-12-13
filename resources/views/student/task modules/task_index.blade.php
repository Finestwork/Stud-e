@extends('partials.base')

@section('title')
    Task - Welcome to your classroom!
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.home_task.style.css">
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
    <div class="task-home">
        <div class="container--main">
            <div class="task-home__banner">
                <div class="banner">
                    <div class="banner__img-box">
                        <img src="/assets/illustration/Task banner illustration.svg" alt="An illustration for class banner" class="img-fluid">
                    </div>
                    <div class="banner__description">
                        <h1 class="banner__title">Tasks</h1>
                        <p class="banner__txt">Some notes here....</p>
                    </div>
                </div>
            </div>
            <div class="task-home__container">
                <div class="task-home__top-controls">
                    <button type="button" class="bttn js-control-bttn js-control-assigned task-home__top-bttn bttn--active">Assigned</button>
                    <button type="button" class="bttn js-control-bttn js-control-pending task-home__top-bttn">Pending</button>
                    <button type="button" class="bttn js-control-bttn js-control-missed task-home__top-bttn">Missed</button>
                    <button type="button" class="bttn js-control-bttn js-control-done task-home__top-bttn">Done</button>
                    <div class="task-home__line-indicator"></div>
                </div>
                <div class="task-home__task-filters">
                    <div class="selection--primary__group task-home__subject-type task-home__filters-item">
                        <p class="selection--primary__label">Select a type:</p>
                        <div class="selection--primary task-home__selection--primary">
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
                    <!-- AUTO FILL - SUBJECTS -->
                    <div class="selection--primary__group task-home__subject-option task-home__filters-item">
                        <p class="selection--primary__label">Select a subject:</p>
                        <div class="selection--primary task-home__selection--primary">
                            <div class="selection--primary__top js-selection-subject">
                                <span class="selection--primary__txt">All</span>
                                <span class="selection--primary__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                        <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#6583fe"></path>
                                                    </svg>
                                                </span>
                            </div>
                            <ul class="selection--primary__list-container js-selection-subject-item">
                                <li class="selection--primary__list-item">All</li>
                                <li class="selection--primary__list-item">Philosophy of man</li>
                                <li class="selection--primary__list-item">Psychology with Drugs, HIV/AIDS, and SARS Education</li>
                                <li class="selection--primary__list-item">Philosophy of man</li>
                                <li class="selection--primary__list-item">Psychology with Drugs, HIV/AIDS, and SARS Education</li>
                                <li class="selection--primary__list-item">Philosophy of man</li>
                                <li class="selection--primary__list-item">Psychology with Drugs, HIV/AIDS, and SARS Education</li>
                            </ul>
                        </div>
                    </div>
                    <div class="selection--primary__group task-home__filters-item task-home__progress-control-hide">
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
                <div class="grade task-home__grade-container">
                    <div class="grade__labels">
                        <div class="grade__label">
                            <div class="grade__label-icon">
                                <img src="/assets/svgs/shapes/Circle.svg" alt="Icon for labels" class="img-fluid">
                            </div>
                            <p class="grade__label-txt label--exam">Exams</p>
                        </div>
                        <div class="grade__label">
                            <div class="grade__label-icon">
                                <img src="/assets/svgs/shapes/Square.svg" alt="Icon for labels" class="img-fluid">
                            </div>
                            <p class="grade__label-txt label--assignment">Assignments</p>
                        </div>
                        <div class="grade__label">
                            <div class="grade__label-icon">
                                <img src="/assets/svgs/shapes/Rhombus.svg" alt="Icon for labels" class="img-fluid">
                            </div>
                            <p class="grade__label-txt label--quiz">Quizzes</p>
                        </div>
                        <div class="grade__label">
                            <div class="grade__label-icon">
                                <img src="/assets/svgs/shapes/Triangle.svg" alt="Icon for labels" class="img-fluid">
                            </div>
                            <p class="grade__label-txt label--seatwork">Seatworks</p>
                        </div>
                        <div class="grade__label">
                            <div class="grade__label-icon">
                                <img src="/assets/svgs/shapes/Hexagon.svg" alt="Icon for labels" class="img-fluid">
                            </div>
                            <p class="grade__label-txt label--project">Projects</p>
                        </div>
                    </div>
                    <div class="task-home__loader">
                        <div class="loader">
                        </div>
                        <p class="loader__text">Please wait, we are preparing your task</p>
                    </div>
                    <!-- ASSIGNED TABLE -->
                    <div class="grade__table">
                        <!-- POPULATION STARTS HERE -->
                        <div class="grade__content-container task-home__table-container">
                            <h2 class="grade__content-title">This week</h2>
                            <ul class="grade__content-items">
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="{{ route('student.task.page', 'taskID') }}" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="{{ route('student.modules').'#qweqeqwewq' }}" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--rhombus">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Rhombus.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="{{ route('student.task.take', 'taskUniqueID') }}" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="{{ route('student.modules').'#qweqeqwewq' }}" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--square">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Square.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--hexagon">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Hexagon.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--triangle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Triangle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- POPULATION STARTS HERE -->
                        <div class="grade__content-container task-home__table-container">
                            <h2 class="grade__content-title">Next week</h2>
                            <ul class="grade__content-items">
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--rhombus">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Rhombus.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--triangle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Triangle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- POPULATION STARTS HERE -->
                        <div class="grade__content-container task-home__table-container">
                            <h2 class="grade__content-title">Upcoming</h2>
                            <ul class="grade__content-items">
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <!-- COLOR TAGGING STARTS HERE -->
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--circle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Circle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--rhombus">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Rhombus.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                                <li class="grade__content-item item--triangle">
                                    <div class="grade__content-item-left">
                                        <div class="grade__content-item-icon">
                                            <img src="/assets/svgs/shapes/Triangle.svg" alt="test" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="grade__content-item-right">
                                        <p class="grade__content-txt">
                                            <a href="#" class="grade__content-link-1">What is the difference between physics and metaphysics?</a>
                                            <a href="#" class="grade__content-link-2">Psychology with Drugs, HIV/AIDS, and SARS Education</a>
                                        </p>
                                        <p class="grade__date">Due date will be on December 05, 2020</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- PENDING TABLE -->
                    <div class="task-home__pending">
                        <div class="pending-scroll-bar">
                            <table class="table--pending">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Topic</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Starting Date</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Turned in</th>
                                        <th scope="col">Graded</th>
                                        <th scope="col">Score</th>
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
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="table__row-head">
                                            <a href="#" class="table__link">What is the difference between physics and metaphysics?</a>
                                        </th>
                                        <td><a href="#" class="table__link">Different branches of science</a></td>
                                        <td class="table__type">Assignment</td>
                                        <td class="table__start-date">November 7, 2020 (5:00 PM)</td>
                                        <td class="table__duedate">December 7, 2020 (12:00 PM)</td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__icon">
                                            <div class="table__checkbox">
                                                <img src="/assets/svgs/icons/Check default.svg" alt="An icon for this table" class="img-fluid">
                                            </div></td>
                                        <td class="table__tba">TBA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- MISSED TABLE -->
                    <div class="task-home__missed">
                        <div class="missed-scroll-bar">
                            <table class="table--missed">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Topic</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Starting Date</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Score</th>
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
                                        <td class="table__tba">F</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- DONE TABLE -->
                    <div class="task-home__done">
                        <div class="done-scroll-bar">
                            <table class="table--done">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Topic</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Starting Date</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Score</th>
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
                                        <td class="table__tba">F</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/student/task/main.js"></script>
@endsection
