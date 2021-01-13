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
    <script src="/assets/js/libraries/caleandar.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script>
        let classrooms = {!! $classrooms !!};
    </script>
@endsection

@section('body-content')
    @include('partials.navbar')
    @include('student.optional partials.sidebar')
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
                                            <p class="teachers-note__teacher-mssg">Please submit your final paper on time to prevent scoring delay.</p>
                                            <a href="#" class="bttn--link-read-more">Read more</a>
                                        </span>
                                    </li>
                                    <li class="teachers-note__item">
                                    <span class="teachers-note__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="test" class="img-fluid">
                                        </span>
                                        <span class="teachers-note__teacher-description">
                                            <h2 class="teachers-note__teacher-name">Juan Dela Cruz</h2>
                                            <p class="teachers-note__teacher-mssg">Hi guys! Your class for Eurythmy will be moved on monday, next week.</p>
                                            <a href="#" class="bttn--link-read-more">Read more</a>
                                        </span>
                                    </li>
                                    <li class="teachers-note__item">
                                    <span class="teachers-note__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="test" class="img-fluid">
                                        </span>
                                        <span class="teachers-note__teacher-description">
                                            <h2 class="teachers-note__teacher-name">Juan Dela Cruz</h2>
                                            <p class="teachers-note__teacher-mssg">Please submit your final paper on time to prevent scoring delay.</p>
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
                                    <h1 class="enrolled-subjects__title-lbl">Currently Enrolled Courses</h1>
                                    <h2 class="enrolled-subjects__date-lbl">Click below to see more information about your course/s.</h2>
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
                                    @if($classrooms->count() !== 0)
                                        @foreach($classrooms as $cl)
                                            <li class="enrolled-subjects__item">
                                                <a href="{{ route('classroom.modules', $cl->classroom_unique_url) }}" class="enrolled-subjects__item-link">
                                                    <span class="enrolled-subjects__item-subject">{{$cl->classroom_name}}</span>
                                                    <span class="enrolled-subjects__item-day">
                                                @foreach(json_decode($cl->classroom_schedule) as $cls)
                                                            {{$cls[0]}}
                                                            @unless($loop->last)
                                                                /
                                                            @endunless
                                                        @endforeach
                                            </span>
                                                    <span class="enrolled-subjects__item-time">
                                                @foreach(json_decode($cl->classroom_schedule) as $cls)
                                                            {{$cls[1]}}
                                                            @unless($loop->last)
                                                                /
                                                            @endunless
                                                        @endforeach
                                            </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <p class="schedule__no-classes">No classes for today.</p>
                                    @endif

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
                        <div class="teachers">
                            <h2 class="teachers__title">Teachers</h2>
                            <div class="teachers__scrollbar">
                                <ul class="teachers__item-container">
                                    <li class="teachers__item prof--active">
                                        <span class="teachers__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your teacher's profile picture" class="adjust-img-js">
                                        </span>
                                        <span class="teachers__description">
                                                <span class="teachers__name">Guil Hernandez</span>
                                                <a href="#" class="teachers__mssg-bttn">Send a message</a>
                                            </span>
                                    </li>
                                    <li class="teachers__item prof--active">
                                        <span class="teachers__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your teacher's profile picture" class="adjust-img-js">
                                        </span>
                                        <span class="teachers__description">
                                                <span class="teachers__name">Guil Hernandez</span>
                                                <a href="#" class="teachers__mssg-bttn">Send a message</a>
                                            </span>
                                    </li>
                                    <li class="teachers__item">
                                        <span class="teachers__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your teacher's profile picture" class="adjust-img-js">
                                        </span>
                                        <span class="teachers__description">
                                                <span class="teachers__name">Guil Hernandez</span>
                                                <a href="#" class="teachers__mssg-bttn">Send a message</a>
                                            </span>
                                    </li>
                                    <li class="teachers__item">
                                        <span class="teachers__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your teacher's profile picture" class="adjust-img-js">
                                        </span>
                                        <span class="teachers__description">
                                                <span class="teachers__name">Guil Hernandez</span>
                                                <a href="#" class="teachers__mssg-bttn">Send a message</a>
                                            </span>
                                    </li>
                                    <li class="teachers__item prof--active">
                                        <span class="teachers__img-box">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your teacher's profile picture" class="adjust-img-js">
                                        </span>
                                        <span class="teachers__description">
                                                <span class="teachers__name">Guil Hernandez</span>
                                                <a href="#" class="teachers__mssg-bttn">Send a message</a>
                                            </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('student.optional partials.enroll')
        </main>
    </div>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    <script src="/assets/js/modules/student/student.index.js"></script>
    <script src="/assets/js/modules/student/popup.code.js"></script>
    <script src="/assets/js/helpers/calendar.js"></script>
    <script src="/assets/js/helpers/tasks.js"></script>
    <script>
        (function fillSchedule(){
            let scheduleItemWrapper = document.querySelector('.schedule__item-wrapper');
            let days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'][new Date().getDay()];
            let isDayFound = false;
            if(classrooms.length !== 0) {
                for (let i = 0; i < classrooms.length; i++) {
                    let parsedSchedule = JSON.parse(classrooms[i].classroom_schedule);
                    if (parsedSchedule.length !== 0) {
                        for (let k = 0; k < parsedSchedule.length; k++) {
                            if (days === parsedSchedule[k][0].toLowerCase()) {
                                isDayFound = true;
                                let liTag = document.createElement('LI'),
                                    aTag = document.createElement('A'),
                                    subject = document.createElement('SPAN'),
                                    day = document.createElement('SPAN'),
                                    time = document.createElement('SPAN');

                                liTag.classList.add('schedule__item');
                                aTag.classList.add('schedule__item-link');
                                aTag.setAttribute('href', '/schedules/' + classrooms[i].classroom_unique_url);
                                subject.classList.add('schedule__item-subject');
                                day.classList.add('schedule__item-day');
                                time.classList.add('schedule__item-tim');

                                subject.textContent = classrooms[i].classroom_name;
                                for (let ctr = 0; ctr < parsedSchedule.length; ctr++) {
                                    if (parsedSchedule.length - 1 !== parsedSchedule.indexOf(parsedSchedule[ctr[0]])) {
                                        day.textContent += parsedSchedule[ctr][0] + ' / ';
                                        time.textContent += parsedSchedule[ctr][1] + ' / ';
                                    } else {
                                        day.textContent += parsedSchedule[ctr][0];
                                        time.textContent += parsedSchedule[ctr][1];
                                    }
                                }
                                aTag.append(subject, day, time);
                                liTag.append(aTag);
                                scheduleItemWrapper.append(liTag);
                            }
                        }
                    }
                }
                if(!isDayFound){
                    let pTag = document.createElement('p');
                    pTag.classList.add('schedule__no-classes');
                    pTag.textContent = 'No classes for today.';
                    scheduleItemWrapper.append(pTag);
                }
            }else{
                let pTag = document.createElement('p');
                pTag.classList.add('schedule__no-classes');
                pTag.textContent = 'No classes for today.';
                scheduleItemWrapper.append(pTag);
            }
        })();
    </script>
@endsection
