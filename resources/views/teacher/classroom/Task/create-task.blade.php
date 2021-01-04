@extends('partials.base')

@section('title')
    @foreach($classrooms as $classroom )
        {{ $classroom->classroom_name }} - Creating a task
    @endforeach
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.min.css">
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.default-theme.min.css">
    <link rel="stylesheet" href="/css/teacher/task.create.style.css">
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
    <main class="task-create">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="breadcrumbs">
                        <a href="{{ route('classroom.index') }}" class="breadcrumbs__link">Classroom</a>
                        <span class="breadcrumbs__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                              <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                            </svg>
                        </span>
                        <a class="breadcrumbs__link" href="{{ route('classroom.task', $classrooms[0]->classroom_unique_url) }}">{{ $classrooms[0]->classroom_name }}</a>
                        <span class="breadcrumbs__arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                              <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                            </svg>
                        </span>
                        <span class="breadcrumbs__txt">Creating a task</span>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lrg-12 task-create__intro">
                        <h1 class="task-create__intro-name">Hola! Teacher {{ $user->f_name }}!</h1>
                        <p class="task-create__intro-sub-txt">You can now create a task.... tins I need more texts or something na friendly 'yung text dito</p>

                        <div class="task-create__options-wrapper">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lrg-6 col-xlrg-6">
                                        <div class="task-create__options">
                                            <div class="task-create__task-description-group">
                                                <label for="descriptionTitleTxt">1.) Tell us what will be the title of this <span class="task-create__task-description-title">task</span>?</label>
                                                <input type="text" name="descriptionTitleTxt" id="descriptionTitleTxt" placeholder="Place your title here">
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">2.) This task is under of what topic?</p>
                                            <div class="task-create__selection-wrapper">
                                                <p class="task-create__selection-txt js-task-dropdown" tabindex="0">-- Please select --</p>
                                                <ul class="task-create__selection-items js-task-dropdown-items">
                                                    @foreach($modules as $module)
                                                        <li class="task-create__selection-item" data-module-id="{{ $module->id }}">{{ $module->secondary_title }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">3.) What type of task is this?</p>
                                            <div class="task-create__selection-wrapper">
                                                <p class="task-create__selection-txt js-task-dropdown" tabindex="0">-- Please select --</p>
                                                <ul class="task-create__selection-items js-task-dropdown-items">
                                                    <li class="task-create__selection-item">Quiz</li>
                                                    <li class="task-create__selection-item">Exam</li>
                                                    <li class="task-create__selection-item">Seatwork</li>
                                                    <li class="task-create__selection-item">Project</li>
                                                    <li class="task-create__selection-item">Assignment</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">4.) Do you want your other classes to take this task?</p>
                                            <p class="task-create__note">Your classroom <span class="task-create__note-emp">{{$classrooms[0]->classroom_name}}</span> is automatically included.</p>
                                            <div class="task-create__option-checkbox-wrapper">
                                                @foreach($sections as $section)
                                                    @if($section->is_classroom_active)
                                                        @unless($section->classroom_name === $classrooms[0]->classroom_name)
                                                            <div class="task-create__options-checkboxes">
                                                                <input type="checkbox" value="{{$section->id}}" name="checkbox{{$section->id}}" id="checkbox{{$section->id}}">
                                                                <label for="checkbox{{$section->id}}">{{$section->classroom_name}}</label>
                                                            </div>
                                                        @endunless
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">5.) Oh wait, is it a timed quiz?</p>
                                            <div class="task-create__options-radio-bttn-wrapper task-create__timed-quiz-controls">
                                                <div class="task-create__options-radio-bttn-group">
                                                    <input type="radio" value="yes" name="timedRadBttn" id="yesRadBttn">
                                                    <label for="yesRadBttn">Yes, it is a timed quiz.</label>
                                                </div>
                                                <div class="task-create__options-radio-bttn-group">
                                                    <input type="radio" value="no" name="timedRadBttn" id="noRadBttn">
                                                    <label for="noRadBttn">No, I do not want this to be a timed quiz.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lrg-6 col-xlrg-6">
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">6.) When is the deadline?</p>
                                            <p class="task-create__note">Deadline will be on <span class="task-create__note-emp js-date-txt">loading....</span> at <span class="task-create__note-emp js-time-txt">loading....</span></p>
                                            <div class="task-create__date-deadline-wrapper">
                                                <div class="task-create__date-picker" id="task-deadline-picker"></div>
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <p class="task-create__option-lbl">7.) How many submissions do you want to accept?</p>
                                            <div class="task-create__options-radio-bttn-wrapper--inline">
                                                <div class="task-create__options-radio-bttn-group">
                                                    <input type="radio" value="1" name="submissionRadBttn" id="radioSubmissionBttn1">
                                                    <label for="radioSubmissionBttn1">1</label>
                                                </div>
                                                <div class="task-create__options-radio-bttn-group">
                                                    <input type="radio" value="2" name="submissionRadBttn" id="radioSubmissionBttn2">
                                                    <label for="radioSubmissionBttn2">2</label>
                                                </div>
                                                <div class="task-create__options-radio-bttn-group">
                                                    <input type="radio" value="3" name="submissionRadBttn" id="radioSubmissionBttn3">
                                                    <label for="radioSubmissionBttn3">3</label>
                                                </div>
                                                <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                                    <input type="radio" value="others" name="submissionRadBttn" id="radioSubmissionOthers">
                                                    <label for="radioSubmissionOthers">Let me decide</label>
                                                    <input type="text" placeholder="Ex. 5" id="customerSubmissionAttemptTxt" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-create__options">
                                            <label class="task-create__option-lbl" for="instructionTxt">8.) Lastly, tell us your instructions about this task.</label>
                                            <textarea placeholder="Place your instructions here" id="instructionTxt"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-10 col-lrg-12">
                        <div class="task-create__main">
                            <div class="task-create__question-maker-panel">
                                <div class="task-create__question-main-content">
                                    <div class="task-create__question-main-content--top">
                                        <div class="task-create__question-options">
                                            <p class="task-create__option-selected-item js-selection-pop">--Select an option --</p>
                                            <ul class="task-create__option-selection">
                                                <li class="task-create__option-selection-item" data-value="fitb">Fill in the blank</li>
                                                <li class="task-create__option-selection-item" data-value="la">Long answer (Ex. Essay)</li>
                                                <li class="task-create__option-selection-item" data-value="ma">Multiple answer</li>
                                                <li class="task-create__option-selection-item" data-value="mc">Multiple choice</li>
                                                <li class="task-create__option-selection-item" data-value="mc">Identification</li>
                                            </ul>
                                        </div>
                                        <button type="button" class="bttn task-create__bttn-delete">Delete</button>
                                    </div>
                                    <div class="task-create__question-main-content">
                                        <div class="task-create__question-main--top">
                                            <h3 class="task-create__question-counter">Question 1</h3>
                                            <div class="task-create__question-wrapper">
                                                <input type="text" placeholder="Place your question here">
                                                <div class="task-create__question-wrapper-line"></div>
                                            </div>
                                            <p class="task-create__note">Note: Students are expected to have a long answer which can't be checked automatically.</p>
                                        </div>
                                        <div class="task-create__answer-preview">
                                            <p class="task-create__answer-preview-note">
                                                Answer preview
                                            </p>
                                            <textarea disabled></textarea>
                                        </div>
                                        <div class="task-create__question-bottom">
                                            <div class="task-create__question-how-many-points">
                                                <label for="pointsQuestion1">Points for this question: </label>
                                                <input type="number" placeholder="1" min="1" id="pointsQuestion2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="task-create__add-more-question">Add more question</button>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lrg-12 task">

                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/libraries/date picker/mtr-datepicker.min.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-creation.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-generation.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-general.js"></script>
@endsection
