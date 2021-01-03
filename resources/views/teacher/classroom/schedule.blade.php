@extends('partials.base')

@section('title')
    @foreach($classrooms as $classroom )
        Schedule - {{ $classroom->classroom_name }}
    @endforeach
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/classroom.schedule.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>

     @foreach($classrooms as $cr)
         <script>
             let classroomOrigValues = @json($classrooms, JSON_PRETTY_PRINT);
             let classroomName = '{{ $cr->classroom_name }}',
                 classroomSection = '{{ $cr->classroom_section }}',
                 classroomDescription = '{{ $cr->classroom_description }}',
                 classroomSchedule = {!! json_encode($cr->classroom_schedule) !!},
                 classroomCode = {!! json_encode($cr->class_code) !!},
                 canDownload = {{$cr ->can_student_download}},
                 canPost = {{$cr->can_student_post}},
                 canRequest = {{$cr->can_student_join}},
                 isActive = {{$cr->is_classroom_active}};
         </script>
     @endforeach
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
                                            <a href="{{ route('classroom.schedule', $classroom->classroom_unique_url) }}" class="classroom__links link--active">Schedule</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.modules', $classroom->classroom_unique_url) }}" class="classroom__links">Modules</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="{{ route('classroom.task', $classroom->classroom_unique_url) }}" class="classroom__links ">Tasks</a>
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
                            <div class="col-sm-12 col-md-12 col-lrg-12">
                                <button class="bttn bttn--schedule js-schedule-bttn">Change settings</button>
                                <button class="bttn bttn--schedule js-schedule-close-bttn" style="display: none;">Close settings</button>
                                <div class="schedule">
                                    <div class="schedule__line"></div>
                                    @if($classrooms[0]->is_classroom_active)
                                        <p class="schedule__inactive-wrapper" style="display: none;">
                                        <span class="schedule__inactive-img">
                                            <img src="/assets/svgs/icons/Notif icon.svg" alt="Icon for inactive classroom" class="img-fluid">
                                        </span>
                                            <span class="schedule__inactive-txt">Notice: This classroom is currently inactive.</span></p>
                                    @else
                                        <p class="schedule__inactive-wrapper">
                                        <span class="schedule__inactive-img">
                                            <img src="/assets/svgs/icons/Notif icon.svg" alt="Icon for inactive classroom" class="img-fluid">
                                        </span>
                                            <span class="schedule__inactive-txt">Notice: This classroom is currently inactive.</span></p>
                                    @endif

                                    <h1 class="schedule__title">Schedule</h1>
                                    @foreach($classrooms as $classroom)
                                        <div class="schedule__form-group">
                                            <p class="schedule__txt"><span class="schedule__lbl">Classroom name:</span><span class="js-cr-name">{{ $classroom->classroom_name }}</span></p>
                                        </div>
                                        <div class="schedule__form-group">
                                            <p class="schedule__txt"><span class="schedule__lbl">Classroom section</span><span class="js-cr-section">{{ $classroom->classroom_section }}</span></p>
                                        </div>
                                        <div class="schedule__form-group">
                                            <p class="schedule__txt"><span class="schedule__lbl">Classroom description:</span><span class="js-cr-description">{{ $classroom->classroom_description }}</span></p>
                                        </div>
                                        <div class="schedule__form-group">
                                            <p class="schedule__lbl">Classroom schedule: </p>
                                            <div class="schedule__form-wrap js-schedule">
                                                @foreach($classroom->classroom_schedule as $sched)
                                                    <p class="schedule__default-sched">{{ $sched[0] . ' ( ' . $sched[1] . ' )' }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="schedule__form-group">
                                            <p class="schedule__txt"><span class="schedule__lbl">Classroom code:</span><span class="js-cr-code">{{ $classroom->class_code }}</span></p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="classroom-settings" style="display: none;">
                                    <div class="schedule__line"></div>
                                    <div class="form--secondary create-classroom classroom-settings__schedule">
                                        <ul class="classroom-settings__error-list">
                                        </ul>
                                        <p class="form--secondary__warning-txt js-warning-wrong">Uh-oh! Something went wrong, please try again later.</p>
                                        <p class="form--secondary__success-txt js-success-txt">Changes were successfully saved!</p>
                                        <h1 class="classroom-settings__schedule-title">Schedule</h1>
                                        <form>
                                            <div class="form--secondary__group">
                                                <label for="classnameTxt">Course Name:</label>
                                                <input type="text" name="classnameTxt" id="classnameTxt" placeholder="Place your classroom name here" value="{{ $classroom->classroom_name }}">
                                                <p class="class-note">Note: This will be the name of your classroom.</p>
                                            </div>
                                            <div class="form--secondary__group">
                                                <label for="sectionTxt">Course Section:</label>
                                                <input type="text" name="sectionTxt" id="sectionTxt" placeholder="Place your classroom's section here" value="{{ $classroom->classroom_section }}">
                                                <p class="class-note">Note: Please put your current course section or batch.</p>
                                            </div>
                                            <div class="form--secondary__group">
                                                <label for="descriptionTxt">Course Description:</label>
                                                <textarea id="descriptionTxt" placeholder="Place your class description here">{{ $classroom->classroom_description }}</textarea>
                                                <p class="class-note">Note: Type a short description of your course.</p>
                                            </div>
                                            <div class="form--secondary__group">
                                                <label for="scheduleTxt">Schedule:</label>
                                                <p class="class-note">Note: This will help you to super duper organize your class.</p>
                                                <div class="form--secondary__group">
                                                    @foreach($classroom->classroom_schedule as $cs)
                                                        <div class="form--secondary__schedule-wrapper">
                                                            <div class="date--wrapper">
                                                                <label class="form--secondary__day-label">Select a day:</label>
                                                                <select>
                                                                    <option @if($cs[0] === 'Monday') value="Monday" selected="true"@endif>Monday</option>
                                                                    <option @if($cs[0] === 'Tuesday') value="Tuesday" selected="true" @endif>Tuesday</option>
                                                                    <option @if($cs[0] === 'Wednesday') value="Wednesday" selected="true" @endif>Wednesday</option>
                                                                    <option @if($cs[0] === 'Thursday') value="Thursday" selected="true" @endif>Thursday</option>
                                                                    <option @if($cs[0] === 'Friday') value="Friday" selected="true" @endif>Friday</option>
                                                                    <option @if($cs[0] === 'Saturday') value="Saturday" selected="true" @endif>Saturday</option>
                                                                    <option @if($cs[0] === 'Sunday') value="Sunday" selected="true" @endif>Sunday</option>
                                                                </select>
                                                            </div>
                                                            <div class="form--secondary__group">
                                                                <label class="form--secondary__day-label">Note: Place here your preferred time:</label>
                                                                <div class="time-wrapper">
                                                                    <input type="text" placeholder="Ex. 7:00 AM - 7:00 PM" class="date-input" value="{{ $cs[1] }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="classroom-settings__schedule-bttn-controls">
                                                        <button class="bttn form--secondary__schedule-bttn classroom-settings__bttn-add-sched"  type="button" id="addScheduleBttn">Add schedule</button>
                                                        <button class="bttn form--secondary__schedule-bttn--removed classroom-settings__bttn-remove-sched"  type="button" id="removeScheduleBttn">Remove schedule</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form--secondary__group">
                                                <label for="codeTxt">Course Code:</label>
                                                <p class="form--secondary__warning-code js-warning-code">Your class code already exist, please choose another one.</p>
                                                <input type="text" name="codeTxt" id="codeTxt" placeholder="Place your code here" value="{{ $classroom->class_code }}">
                                                <p class="class-note">Note: In order to protect your classroom please avoid sharing your course code to individuals who are not involve in the said course.</p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="classroom-settings__options">
                                        <h1 class="classroom-settings__schedule-title">General</h1>
                                        <p class="classroom-settings__unable-txt">You can't turn on other options unless your classroom activities are turned on.</p>
                                        @if($classrooms[0]->can_student_download)
                                            <div class="switch">
                                                <div class="switch__main switch-1 js-switch-one switch--active">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Toggle downloadable modules</p>
                                                </div>
                                                <p class="switch__note">This options is turned off, students can no longer download all the modules inside of this classroom.</p>
                                                <p class="switch__note" style="display: block;">This option is turned on, students can download all the modules available on your class.</p>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <div class="switch__main switch-1 js-switch-one">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Toggle downloadable modules</p>
                                                </div>
                                                <p class="switch__note">This option is turned on, students can download all the modules available on your class.</p>
                                                <p class="switch__note" style="display: block;">This options is turned off, students can no longer download all the modules inside of this classroom.</p>
                                            </div>
                                        @endif
                                        @if($classrooms[0]->can_student_post)
                                            <div class="switch">
                                                <div class="switch__main switch-2 js-switch-two switch--active">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Toggle discussion board posts</p>
                                                </div>
                                                <p class="switch__note">This options is turned off, students can no longer post or make a reply on your classroom discussion board.</p>
                                                <p class="switch__note" style="display: block;">This option is turned on, students can post or reply to the discussion board.</p>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <div class="switch__main switch-2 js-switch-two">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Toggle discussion board posts</p>
                                                </div>
                                                <p class="switch__note" style="display: block;">This options is turned off, students can no longer post or make a reply on your classroom discussion board.</p>
                                                <p class="switch__note">This option is turned on, students can post or reply to the discussion board.</p>
                                            </div>
                                        @endif
                                        @if($classrooms[0]->can_student_join)
                                            <div class="switch">
                                                <div class="switch__main switch-3 js-switch-three switch--active">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Turn off incoming requests</p>
                                                </div>
                                                <p class="switch__note">This options is turned off, students can no longer make a request to join your classroom.</p>
                                                <p class="switch__note" style="display: block;">This option is turned on, students can now make a request to join your classroom.</p>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <div class="switch__main switch-3 js-switch-three">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Turn off incoming requests</p>
                                                </div>
                                                <p class="switch__note" style="display: block;">This options is turned off, students can no longer make a request to join your classroom.</p>
                                                <p class="switch__note">This option is turned on, students can now make a request to join your classroom.</p>
                                            </div>
                                        @endif
                                        @if($classrooms[0]->is_classroom_active)
                                            <div class="switch">
                                                <div class="switch__main switch-4 js-switch-four switch--active">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Turn off classroom activities</p>
                                                </div>
                                                <p class="switch__note">Your classroom is currently inactive, students can no longer post in discussion board, download modules, and make any requests to join your classroom.</p>
                                                <p class="switch__note" style="display: block;"> Your classroom is currently active, students can download, post in discussion board, and make any requests to join your classroom.</p>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <div class="switch__main switch-4 js-switch-four">
                                                    <div class="switch__bttn"></div>
                                                    <p class="switch__name">Turn off classroom activities</p>
                                                </div>
                                                <p class="switch__note" style="display: block;">Your classroom is currently inactive, students can no longer post in discussion board, download modules, and make any requests to join your classroom.</p>
                                                <p class="switch__note"> Your classroom is currently active, students can download, post in discussion board, and make any requests to join your classroom.</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="classroom-settings__bttn-box">
                                        <button type="button" class="bttn classroom-settings__reset-bttn">Reset changes</button>
                                        <button type="button" class="bttn classroom-settings__save-bttn">Save changes</button>
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
    <script src="/assets/js/modules/teacher/classroom/classroom.home.js"></script>
@endsection
