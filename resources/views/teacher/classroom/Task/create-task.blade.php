@extends('partials.base')

@section('title')
    @foreach($classrooms as $classroom )
        {{ $classroom->classroom_name }} - Creating a task
    @endforeach
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.min.css">
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.default-theme.min.css">
    <link rel="stylesheet" href="/css/libraries/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="/css/libraries/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="/css/teacher/task.create.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/photoswipe/photoswipe.min.js"></script>
    <script src="/assets/js/libraries/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>

    <script>
        let classroomUrl = '{{$classrooms[0]->classroom_unique_url}}',
            classID = '{{$classrooms[0]->id}}'
    </script>
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
                    <div class="col-sm-12 col-md-12 col-lrg-12 col-xlrg-12 task-create__intro">
                        <button type="button" class="bttn task-create__hide-settings-bttn js-hide-settings">Hide Settings</button>
                        <h1 class="task-create__intro-name">Hola! Teacher {{ $user->f_name }}!</h1>
                        <p class="task-create__intro-sub-txt">You can now create a task.... tins I need more texts or something na friendly 'yung text dito</p>
                        <div class="task-create__options-wrapper">
                            <div class="task-create__options-wrapper--left">
                                <div class="task-create__options">
                                    <div class="task-create__task-description-group">
                                        <label for="descriptionTitleTxt">1.) Tell us what will be the title of this <span class="task-create__task-description-title">task</span>?</label>
                                        <input type="text" name="descriptionTitleTxt" id="descriptionTitleTxt" placeholder="Place your title here">
                                    </div>
                                </div>
                                <div class="task-create__options">
                                    <p class="task-create__option-lbl">2.) This <span class="task-create__task-description-title">task</span> is under of what topic?</p>
                                    <div class="task-create__selection-wrapper">
                                        <p class="task-create__selection-txt js-task-dropdown" tabindex="0">-- Please select --</p>
                                        @if($modules->count() === 0)
                                            <p class="task-create__selection-items js-task-dropdown-items no-modules">No modules to display.</p>
                                        @else
                                            <ul class="task-create__selection-items js-task-dropdown-items">
                                                @foreach($modules as $module)
                                                    <li class="task-create__selection-item js-modules-selection" data-module-id="{{ $module->id }}">{{ $module->secondary_title }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </div>
                                </div>
                                <div class="task-create__options">
                                    <p class="task-create__option-lbl">3.) What type of <span class="task-create__task-description-title">task</span> is this?</p>
                                    <div class="task-create__selection-wrapper">
                                        <p class="task-create__selection-txt js-type-task-dropdown" tabindex="0">-- Please select --</p>
                                        <ul class="task-create__selection-items js-type-task-dropdown-items">
                                            <li class="task-create__selection-item">Quiz</li>
                                            <li class="task-create__selection-item">Exam</li>
                                            <li class="task-create__selection-item">Seatwork</li>
                                            <li class="task-create__selection-item">Project</li>
                                            <li class="task-create__selection-item">Assignment</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="task-create__options">
                                    <p class="task-create__option-lbl">4.) Do you want your other classes to take this <span class="task-create__task-description-title">task</span>?</p>
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
                                    <p class="task-create__option-lbl">5.) Oh wait, is it a timed <span class="task-create__task-description-title">task</span>?</p>
                                    <div class="task-create__options-radio-bttn-wrapper task-create__timed-quiz-controls">
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="yes" name="timedRadBttn" id="yesRadBttn" checked>
                                            <label for="yesRadBttn">Yes, it is a timed quiz.</label>
                                        </div>
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="no" name="timedRadBttn" id="noRadBttn">
                                            <label for="noRadBttn">No, I do not want this to be a timed quiz.</label>
                                        </div>
                                        <div class="task-create__options-timer-wrapper js-quiz-timer-wrapper">
                                            <div class="task-create__options-timer-hour">
                                                <input type="number" min="1" value="1" id="hourTimerTxt">
                                                <label for="hourTimerTxt">hour</label>
                                            </div>
                                            <div class="task-create__options-timer-minutes">
                                                <input type="number" min="0" value="0" id="minuteTimerTxt">
                                                <label for="minuteTimerTxt">minute</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="task-create__options-wrapper--right">
                                <div class="task-create__options">
                                    <p class="task-create__option-lbl">6.) When is the deadline?</p>
                                    <p class="task-create__note">Deadline will be on <span class="task-create__note-emp js-date-txt">loading....</span> at <span class="task-create__note-emp js-time-txt">loading....</span></p>
                                    <div class="task-create__date-deadline-wrapper">
                                        <div class="task-create__date-picker" id="task-deadline-picker"></div>
                                    </div>
                                </div>
                                <div class="task-create__options no-mb-submission js-submission">
                                    <p class="task-create__option-lbl">7.) How many submissions do you want to accept?</p>
                                    <div class="task-create__options-radio-bttn-wrapper--inline">
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="1" name="submissionRadBttn" id="radioSubmissionBttn1" checked>
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
                                <div class="task-create__options no-mb-submission js-cheating-attempt">
                                    <p class="task-create__option-lbl">8.) How many cheating attempts do you want to accept?</p>
                                    <div class="task-create__options-radio-bttn-wrapper--inline">
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="1" name="radioCheatingBttn" id="radioCheatingBttn1" checked>
                                            <label for="radioCheatingBttn1">1</label>
                                        </div>
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="2" name="radioCheatingBttn" id="radioCheatingBttn2">
                                            <label for="radioCheatingBttn2">2</label>
                                        </div>
                                        <div class="task-create__options-radio-bttn-group">
                                            <input type="radio" value="3" name="radioCheatingBttn" id="radioCheatingBttn3">
                                            <label for="radioCheatingBttn3">3</label>
                                        </div>
                                        <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                            <input type="radio" value="others" name="radioCheatingBttn" id="radioCheatingOthersBttn">
                                            <label for="radioCheatingOthersBttn">Let me decide</label>
                                            <input type="text" placeholder="Ex. 5" id="cheatingAttemptTxt" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="task-create__options adjust-height">
                                    <label class="task-create__option-lbl" for="instructionTxt">9.) Lastly, tell us your instructions about this <span class="task-create__task-description-title">task</span>.</label>
                                    <textarea placeholder="Place your instructions here" id="instructionTxt"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lrg-12 col-xlrg-12">
                        <div class="task-create__main"></div>
                        <div class="task-create__bttn-bottom">
                            <button type="button" class="bttn task-create__add-more-question js-add-more-question">Add more question</button>
                            <div class="task-create__bttn-bottom--right">
                                <button type="button" class="bttn task-create__add-more-question js-view-bttn">View as a student</button>
                                <button type="button" class="bttn task-create__add-more-question js-publish-bttn">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="preview__task" id="preview-wrapper">
        <div class="preview__task-children-wrapper">
            <button type="button" class="bttn preview__close-bttn">Close</button>
        </div>
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/libraries/date picker/mtr-datepicker.min.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-general.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-creation.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-generation.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task-preview.js"></script>
@endsection
