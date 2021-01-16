@extends('partials.base')

@section('title')
    @foreach($classrooms as $classroom )
        Task - {{ $classroom->classroom_name }}
    @endforeach
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/classroom.task.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>

@endsection


@section('body-content')
    @include('partials.navbar_box_shadow')
    @include('teacher.optional partials.sidebar--secondary')
    <main class="classroom">
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
                                            <a href="{{ route('classroom.modules', $classroom->classroom_unique_url) }}" class="classroom__links">Modules</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="{{ route('classroom.task', $classroom->classroom_unique_url) }}" class="classroom__links link--active">Tasks</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links">Discussion</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.member', $classroom->classroom_unique_url) }}" class="classroom__links">Members</a>
                                        </div>
                                    @endforeach
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
                                    @foreach($classrooms as $classroom)
                                        <span class="breadcrumbs__txt">{{ $classroom->classroom_name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lrg-12 task">
                                <a href="{{route('create.task', $classroom->classroom_unique_url)}}" class="task__create-task-bttn">
                                    <span class="task__create-task-icon"><img src="/assets/svgs/icons/sidebar/Add icon.svg" alt="Icon for creating a task" class="img-fluid"></span>
                                    <span>Create a task</span></a>
                                <div class="task__controls">
                                    <div class="task__control-type">
                                        <p class="task__control-label">Type of task:</p>
                                        <select class="task__control-selection">
                                            <option class="task__control-selection-item" value="all">All</option>
                                            <option class="task__control-selection-item" value="quiz">Quiz</option>
                                            <option class="task__control-selection-item" value="assignment">Assignment</option>
                                            <option class="task__control-selection-item" value="seatwork">Seatwork</option>
                                            <option class="task__control-selection-item" value="exam">Exam</option>
                                            <option class="task__control-selection-item" value="project">Project</option>
                                        </select>
                                    </div>
                                    <div class="task__control-type">
                                        <p class="task__control-label">Status</p>
                                        <select class="task__control-selection">
                                            <option class="task__control-selection-item" value="assigned">Assigned</option>
                                            <option class="task__control-selection-item" value="done">Done</option>
                                            <option class="task__control-selection-item" value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="task__table-wrapper">
                                    <div class="task__table-container js-toggle-assigned">
                                        <div class="table__scrollbar" id="js-scrollbar-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Topic</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Starting Date</th>
                                                        <th scope="col">Deadline</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($quiz as $q)
                                                        <tr>
                                                            <th scope="row" class="table__row-head">
                                                                <a href="{{ route('task.view.teacher', ['quiz', $q->hashedUrl, $classroom->classroom_unique_url]) }}" class="table__link">{{$q->title}}</a>
                                                            </th>
                                                            @foreach(\App\Models\Modules::select('secondary_title')->where('id', (int)$q->submodule)->get() as $module)
                                                                <td><a href="{{ route('classroom.modules', $classrooms[0]->classroom_unique_url . '#'.$q->submodule) }}" class="table__link">{{$module->secondary_title}}</a></td>
                                                            @endforeach
                                                            <td class="table__type">Quiz</td>
                                                            <td class="table__type">{{$q->status}}</td>
                                                            <td class="table__start-date">{{date('F d, Y g:i A', strtotime(\Carbon\Carbon::parse($q->created_at, 'd/m/Y H:i:s')->timezone('Asia/Manila')))}}</td>
                                                            <td class="table__duedate">{{date('F d, Y g:i A', strtotime(\Carbon\Carbon::parse($q->deadline)->timezone('Asia/Manila')))}}</td>
                                                        </tr>
                                                    @endforeach
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
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task.js"></script>
@endsection
