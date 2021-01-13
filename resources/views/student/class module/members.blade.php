@extends('partials.base')

@section('title')
   Members - {{$classrooms->classroom_name}}
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
                            @if($classrooms->is_classroom_active)
                                <div class="classroom__links-item">
                                    <a href="{{ route('classroom.schedule', $classrooms->classroom_unique_url) }}" class="classroom__links">Schedule</a>
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
                                    <a href="{{route('classroom.member', $classrooms->classroom_unique_url)}}" class="classroom__links link--active">Members</a>
                                </div>
                            @else
                                <div class="classroom__links-item">
                                    <a href="{{ route('classroom.schedule', $classrooms->classroom_unique_url) }}" class="classroom__links link--active">Schedule</a>
                                </div>
                            @endif
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="member__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('classroom.index') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">{{$classrooms->classroom_name}}</span>
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
                                                <p class="member__list-name">{{ucfirst($teacher->f_name) . ' ' . ucfirst($teacher->m_name) . ' ' . ucfirst($teacher->l_name)}} </p>
                                                <p class="member__list-position">Teacher</p>
                                            </div>
                                        </div>
                                        <div class="member__list-right">
                                            <p class="member__list-right-p">{{date('F j, Y', strtotime($classrooms->created_at))}}</p>
                                            <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                        </div>

                                    </li>
                                    @foreach($students as $sID)
                                        <li class="member__list">
                                            @foreach(\App\Models\Users\Student::select('f_name', 'm_name', 'l_name')->where('id', $sID->student_id)->get() as $stud)
                                                <div class="member__list-left">
                                                    <div class="member__list-img">
                                                        <img src="/assets/imgs/test images/professor.jpg" alt="A picture of a member in this class" class="adjust-img-js">
                                                    </div>
                                                    <div class="member__list-info">
                                                        <p class="member__list-name">{{ucfirst($stud->f_name) . ' ' . ucfirst($stud->m_name) . ' ' . ucfirst($stud->l_name)}} </p>
                                                        <p class="member__list-position">Student</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach(\App\Models\Relations\ApprovedStudent::select('created_at')->where([['student_id', $sID->student_id], ['classroom_id', $classrooms->id]])->get() as $stud)
                                                <div class="member__list-right">
                                                    <p class="member__list-right-p">{{date('F j, Y', strtotime($sID->created_at))}}</p>
                                                    <a href="{{ route('user.profile') }}" class="link--bttn--primary">View profile</a>
                                                </div>
                                            @endforeach
                                        </li>
                                    @endforeach


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
