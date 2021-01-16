@extends('partials.base')

@section('title')
    You are viewing a task
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.min.css">
    <link rel="stylesheet" href="/css/libraries/date picker/mtr-datepicker.default-theme.min.css">
    <link rel="stylesheet" href="/css/teacher/task.view.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
    <script>
        let deadlineDate = new Date('{{date('F d, Y g:i A', strtotime(\Carbon\Carbon::parse($quiz->deadline)->timezone('Asia/Manila')))}}');
        let contents = {!! json_encode($quiz->content) !!};
    </script>
@endsection


@section('body-content')
    @include('partials.navbar_box_shadow')
    @include('student.optional partials.fixed_independent_sidebar')
    <main>
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="task-viewing">
                        <a href="{{ route('classroom.task', $classrooms->classroom_unique_url) }}" class="task-viewing__go-back">
                            <span class="task-viewing__go-back-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="9.5" viewBox="0 0 15.5 9.5">
                                  <path id="Shape" d="M4.22,9.28l-4-4L.207,5.267.2,5.261.194,5.254.187,5.246.182,5.24.174,5.231l0,0-.008-.01,0,0L.151,5.2l0,0L.14,5.186l0,0L.13,5.172l0,0L.12,5.157l0-.006L.111,5.142l0-.007,0-.008L.1,5.118l0-.006L.087,5.1l0,0A.751.751,0,0,1,.235,4.2L4.22.22A.75.75,0,0,1,5.28,1.281L2.561,4H14.75a.75.75,0,0,1,0,1.5H2.561L5.28,8.22A.75.75,0,1,1,4.22,9.28Z"/>
                                </svg>
                            </span>
                            <span class="task-viewing__go-back-txt">Go back</span>
                        </a>
                        <p class="task-viewing__warning">Viewing of total score and answer sheet are not yet allowed.</p>
                        <div class="task-viewing__tag-container">
                            <div class="task-viewing__tag--task">
                                <p>{{strtoupper($type)}}</p>
                            </div>
                            <div class="task-viewing__tag--status status--default">
                                <p>{{strtoupper($quiz->status)}}</p>
                            </div>
                        </div>
                        <div class="task-viewing__info-container">
                            <h1 class="task-viewing__info-title">{{$quiz->title}}</h1>
                            <p class="task-viewing__info-txt"><span class="task-viewing__info-label">Instructions:</span> {{$quiz->instructions}}</p>
                            <p class="task-viewing__info-date-created"><span class="task-viewing__info-label">Date created:</span> {{date('F d, Y g:i A', strtotime(\Carbon\Carbon::parse($quiz->created_at, 'd/m/Y H:i:s')->timezone('Asia/Manila')))}}</p>
                            <p class="task-viewing__info-date-due"><span class="task-viewing__info-label">Due date:</span> {{date('F d, Y g:i A', strtotime(\Carbon\Carbon::parse($quiz->deadline)->timezone('Asia/Manila')))}}</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Cheating attempt/s:</span> {{$quiz->cheatingAttempt}}</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Allowed submissions:</span> {{$quiz->submission}}</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Shared with your other classrooms:</span>
                                @foreach($quiz->classID as $cID)
                                    {{\App\Models\Classroom::select('classroom_name')->where('id', (int) $cID)->get()->pluck('classroom_name')->first()}}
                                    @unless($loop->last),
                                    @endunless
                                @endforeach
                            </p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Total items:</span> {{count($quiz->content)}}</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Max score:</span> {{$quiz->maxPoints}}</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Timer:</span>
                                @foreach($quiz->timer as $timer)
                                    @if((int)$timer[0] < 10)
                                        0{{$timer[0]}}
                                    @else
                                        {{$timer[0]}}
                                    @endif
                                    :
                                    @if((int)$timer[1] < 10)
                                        0{{$timer[1]}}
                                    @else
                                        {{$timer[1]}}
                                    @endif
                                    : 00
                                @endforeach
                            </p>
                            <div class="task-viewing__bttn-group">
                                <button type="button" class="bttn task-viewing__light-bttn">VIEW THIS TASK</button>
                                <button type="button" class="bttn task-viewing__light-bttn js-edit-task">EDIT THIS TASK</button>
                                <button type="button" class="bttn task-viewing__delete-bttn">DELETE TASK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="task-viewing__edit-container">
            <div class="task-create__options-wrapper">
                <div class="task-create__options-wrapper--left">
                    <div class="task-create__options">
                        <div class="task-create__task-description-group">
                            <label for="descriptionTitleTxt">1.) Tell us what will be the title of this <span class="task-create__task-description-title">task</span>?</label>
                            <input type="text" name="descriptionTitleTxt" id="descriptionTitleTxt" placeholder="Place your title here" value="{{$quiz->title}}">
                        </div>
                    </div>
                    <div class="task-create__options">
                        <p class="task-create__option-lbl">2.) This <span class="task-create__task-description-title">task</span> is under of what topic?</p>
                        <div class="task-create__selection-wrapper">
                            @foreach($modules as $module)
                                @if($module->id === (int)$quiz->classID[0])
                                    <p class="task-create__selection-txt js-task-dropdown" tabindex="0" data-module-id="{{$module->id}}">{{ $module->secondary_title }}</p>
                                    @break;
                                @else
                                    <p class="task-create__selection-txt js-task-dropdown" tabindex="0">-- Please select --</p>
                                    @break;
                                @endif
                            @endforeach

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
                            @foreach($typeTasks as $tt)
                                @if($tt === $type)
                                    <p class="task-create__selection-txt js-type-task-dropdown" tabindex="0">{{ucfirst($type)}}</p>
                                    @break;
                                @else
                                    <p class="task-create__selection-txt js-type-task-dropdown" tabindex="0">-- Please select --</p>
                                    @break;
                                @endif
                            @endforeach
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
                        <p class="task-create__note">Your classroom <span class="task-create__note-emp">{{$classrooms->classroom_name}}</span> is automatically included.</p>
                        <div class="task-create__option-checkbox-wrapper">
                            @foreach($sections as $section)
                                @if($section->is_classroom_active)
                                    @unless($section->classroom_name === $classrooms->classroom_name)
                                        @if(in_array((string)$section->id,$quiz->classID))
                                            <div class="task-create__options-checkboxes">
                                                <input type="checkbox" value="{{$section->id}}" name="checkbox{{$section->id}}" id="checkbox{{$section->id}}" checked>
                                                <label for="checkbox{{$section->id}}">{{$section->classroom_name}}</label>
                                            </div>
                                        @else
                                            <div class="task-create__options-checkboxes">
                                                <input type="checkbox" value="{{$section->id}}" name="checkbox{{$section->id}}" id="checkbox{{$section->id}}">
                                                <label for="checkbox{{$section->id}}">{{$section->classroom_name}}</label>
                                            </div>
                                        @endif
                                    @endunless
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="task-create__options">
                        <p class="task-create__option-lbl">5.) Oh wait, is it a timed <span class="task-create__task-description-title">activity</span>?</p>
                        <div class="task-create__options-radio-bttn-wrapper task-create__timed-quiz-controls">
                            @if($quiz->timer)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="yes" name="timedRadBttn" id="yesRadBttn" checked>
                                    <label for="yesRadBttn">Yes, I want it to be a timed activity.</label>
                                </div>
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="no" name="timedRadBttn" id="noRadBttn">
                                    <label for="noRadBttn">No, I don't want it to be a timed activity.</label>
                                </div>
                                <div class="task-create__options-timer-wrapper js-quiz-timer-wrapper">
                                    <div class="task-create__options-timer-hour">
                                        <input type="number" min="1" value="{{$timer[0]}}" id="hourTimerTxt">
                                        <label for="hourTimerTxt">hour</label>
                                    </div>
                                    <div class="task-create__options-timer-minutes">
                                        <input type="number" min="0" value="{{$timer[1]}}" id="minuteTimerTxt">
                                        <label for="minuteTimerTxt">minute</label>
                                    </div>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="yes" name="timedRadBttn" id="yesRadBttn">
                                    <label for="yesRadBttn">Yes, I want it to be a timed activity.</label>
                                </div>
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="no" name="timedRadBttn" id="noRadBttn" checked>
                                    <label for="noRadBttn">No, I don't want it to be a timed activity.</label>
                                </div>
                                <div class="task-create__options-timer-wrapper js-quiz-timer-wrapper" style="display: none;">
                                    <div class="task-create__options-timer-hour">
                                        <input type="number" min="1" value="1" id="hourTimerTxt">
                                        <label for="hourTimerTxt">hour</label>
                                    </div>
                                    <div class="task-create__options-timer-minutes">
                                        <input type="number" min="0" value="0" id="minuteTimerTxt">
                                        <label for="minuteTimerTxt">minute</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="task-create__options-wrapper--right">
                    <div class="task-create__options">
                        <p class="task-create__option-lbl">6.) When is the deadline?</p>
                        <p class="task-create__note">Deadline will be on <span class="task-create__note-emp js-date-txt">{{date('F d, Y', strtotime(\Carbon\Carbon::parse($quiz->deadline)->timezone('Asia/Manila')))}}</span> at <span class="task-create__note-emp js-time-txt">{{date('g:i A', strtotime(\Carbon\Carbon::parse($quiz->deadline)->timezone('Asia/Manila')))}}</span></p>
                        <div class="task-create__date-deadline-wrapper">
                            <div class="task-create__date-picker" id="task-deadline-picker"></div>
                        </div>
                    </div>
                    <div class="task-create__options js-submission">
                        <p class="task-create__option-lbl">7.) How many submissions do you want to accept?</p>
                        <div class="task-create__options-radio-bttn-wrapper--inline">
                            @if((int)$quiz->submission === 1)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="1" name="submissionRadBttn" id="radioSubmissionBttn1" checked>
                                    <label for="radioSubmissionBttn1">1</label>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="1" name="submissionRadBttn" id="radioSubmissionBttn1">
                                    <label for="radioSubmissionBttn1">1</label>
                                </div>
                            @endif
                            @if((int)$quiz->submission === 2)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="2" name="submissionRadBttn" id="radioSubmissionBttn2" checked>
                                    <label for="radioSubmissionBttn2">2</label>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="2" name="submissionRadBttn" id="radioSubmissionBttn2">
                                    <label for="radioSubmissionBttn2">2</label>
                                </div>
                            @endif
                            @if((int)$quiz->submission === 3)
                                    <div class="task-create__options-radio-bttn-group">
                                        <input type="radio" value="3" name="submissionRadBttn" id="radioSubmissionBttn3" checked>
                                        <label for="radioSubmissionBttn3">3</label>
                                    </div>
                            @else
                                    <div class="task-create__options-radio-bttn-group">
                                        <input type="radio" value="3" name="submissionRadBttn" id="radioSubmissionBttn3">
                                        <label for="radioSubmissionBttn3">3</label>
                                    </div>
                            @endif
                            @if((int)$quiz->submission > 3)
                                    <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                        <input type="radio" value="others" name="submissionRadBttn" id="radioSubmissionOthers" checked>
                                        <label for="radioSubmissionOthers">Let me decide</label>
                                        <input type="text" placeholder="Ex. 5" id="customerSubmissionAttemptTxt" value="{{$quiz->submission}}">
                                    </div>
                            @else
                                    <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                        <input type="radio" value="others" name="submissionRadBttn" id="radioSubmissionOthers">
                                        <label for="radioSubmissionOthers">Let me decide</label>
                                        <input type="text" placeholder="Ex. 5" id="customerSubmissionAttemptTxt" disabled>
                                    </div>
                            @endif
                        </div>
                    </div>
                    <div class="task-create__options js-cheating-attempt">
                        <p class="task-create__option-lbl">8.) How many cheating attempts do you want to accept?</p>
                        <div class="task-create__options-radio-bttn-wrapper--inline">
                            @if((int)$quiz->cheatingAttempt === 1)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="1" name="radioCheatingBttn" id="radioCheatingBttn1" checked>
                                    <label for="radioCheatingBttn1">1</label>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="1" name="radioCheatingBttn" id="radioCheatingBttn1">
                                    <label for="radioCheatingBttn1">1</label>
                                </div>
                            @endif
                            @if((int)$quiz->cheatingAttempt === 2)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="2" name="radioCheatingBttn" id="radioCheatingBttn2" checked>
                                    <label for="radioCheatingBttn2">2</label>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="2" name="radioCheatingBttn" id="radioCheatingBttn2">
                                    <label for="radioCheatingBttn2">2</label>
                                </div>
                            @endif
                            @if((int)$quiz->cheatingAttempt === 3)
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="3" name="radioCheatingBttn" id="radioCheatingBttn3" checked>
                                    <label for="radioCheatingBttn3">3</label>
                                </div>
                            @else
                                <div class="task-create__options-radio-bttn-group">
                                    <input type="radio" value="3" name="radioCheatingBttn" id="radioCheatingBttn3">
                                    <label for="radioCheatingBttn3">3</label>
                                </div>
                            @endif
                            @if((int)$quiz->cheatingAttempt > 3)
                                    <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                        <input type="radio" value="others" name="radioCheatingBttn" id="radioCheatingOthersBttn" checked>
                                        <label for="radioCheatingOthersBttn">Let me decide</label>
                                        <input type="text" placeholder="Ex. 5" id="cheatingAttemptTxt" value="{{$quiz->cheatingAttempt}}">
                                    </div>
                            @else
                                    <div class="task-create__options-radio-bttn-group task-create__options-cs">
                                        <input type="radio" value="others" name="radioCheatingBttn" id="radioCheatingOthersBttn">
                                        <label for="radioCheatingOthersBttn">Let me decide</label>
                                        <input type="text" placeholder="Ex. 5" id="cheatingAttemptTxt" disabled>
                                    </div>
                            @endif
                        </div>
                    </div>
                    <div class="task-create__options adjust-height">
                        <label class="task-create__option-lbl" for="instructionTxt">9.) Lastly, tell us your instructions about this <span class="task-create__task-description-title">task</span>.</label>
                        <textarea placeholder="Place your instructions here" id="instructionTxt">{{$quiz->instructions}}</textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="bttn task-viewing__save-bttn js-save-changes-bttn">Save changes</button>
        </div>
        <div class="task-viewing__edit-questions-container">
            @foreach($quiz->content as $content)
                @if($content[0] === 'fitb')
                    <p>{{json_encode($content)}}</p>
                    <div class="task-create__question-maker-panel" data-question-type="fitb">
                        <div class="task-create__question-main-content">
                            <div class="task-create__question-main-content--top">
                                <div class="task-create__question-options">
                                    <p class="task-create__option-selected-item js-selection-pop" data-question-type="fitb">Fill in the blank</p>
                                    <ul class="task-create__option-selection">
                                        <li class="task-create__option-selection-item" data-value="fitb" data-the-same="fitb">Fill in the blank</li>
                                        <li class="task-create__option-selection-item" data-value="la">Long Answer (Ex. essay)</li>
                                        <li class="task-create__option-selection-item" data-value="ma">Multiple answer</li>
                                        <li class="task-create__option-selection-item" data-value="mc">Multiple Choice</li>
                                        <li class="task-create__option-selection-item" data-value="id">Identification</li>
                                    </ul>
                                </div>
                                <button type="button" class="bttn task-create__bttn-delete js-delete-question">Delete</button>
                            </div>
                            <div class="task-create__question-main-content">
                                <div class="task-create__question-main--top">
                                    <h3 class="task-create__question-counter">Question {{++$loop->index}}</h3>
                                    <div class="task-create__question-wrapper">
                                        <input type="text" placeholder="Place your question here"
                                               data-past-value="{{$content[2]}}"
                                               data-answer-key="@foreach(json_decode($content[2], true) as $answerKey)@if(!$loop->last){{trim(substr($content[1],$answerKey[0],$answerKey[1] - $answerKey[0])) . ','}}@else{{trim(substr($content[1],$answerKey[0],$answerKey[1] - $answerKey[0]))}}@endif @endforeach"
                                               value="{{$content[1]}}">
                                        <div class="task-create__question-wrapper-line"></div>
                                    </div>
                                    <p class="task-create__note">
                                        Note: Highlight the word that you want to be the correct answer then click the "Mark as correct answer" button below.
                                    </p>
                                    <div class="task-create__question-bttn-controls">
                                        <button type="button" class="bttn task-create__mark-as-correct-ans-bttn">Mark as correct answer button</button>
                                        <button type="button" class="bttn task-create__reset-question-bttn">Reset answer key</button>
                                    </div>
                                </div>
                                <div class="task-create__answer-preview">
                                    <p class="task-create__answer-preview-note">Choices</p>
                                    <p class="task-create__answer-key">Answer key: @foreach(json_decode($content[2], true) as $answerKey)@if(!$loop->last){{trim(substr($content[1],$answerKey[0],$answerKey[1] - $answerKey[0])) . ','}}@else{{trim(substr($content[1],$answerKey[0],$answerKey[1] - $answerKey[0]))}}@endif @endforeach</p>
                                </div>
                                <div class="task-create__attachment-wrapper">
                                    <div class="task-create__attachment-area">
                                        @if(!empty($content[4]))
                                            @foreach($content[4] as $src)
                                                @foreach(\App\Models\ImageStorage::select('id', 'storage_path')->where('id', (int) $src)->get() as $img)
                                                    <div class="task-create__attachment-holder" data-img-id="{{$img->id}}" data-img-path="{{$img->storage_path}}">
                                                        <div class="task-create__attachment-box">
                                                            <img class="img-fluid" src="{{$img->storage_path}}" alt="Attachment Image">
                                                        </div>
                                                        <button type="button" class="task-create__attachment-remove-bttn bttn">
                                                            <span class="task-create__attachment-bttn-line-wrapper"></span>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </div>
                                    <input type="file" name="pictureAttachment[]" class="js-upload-picture" multiple="null">
                                    <button type="button" class="task-create__attach-bttn bttn">Add a picture</button>
                                    <p>Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg</p>
                                </div>
                            </div>
                            <div class="task-create__question-bottom">
                                <div class="task-create__question-how-many-points">
                                    <label for="pointsTxt{{$loop->index}}">Points for this question: </label>
                                    <input type="number" placeholder="1" min="1" value="{{$content[3]}}" id="pointsTxt{{$loop->index}}">
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($content[0] === 'la')
                    <p>{{json_encode($content)}}</p>
                    <div class="task-create__question-maker-panel" data-question-type="la">
                        <div class="task-create__question-main-content">
                            <div class="task-create__question-main-content--top">
                                <div class="task-create__question-options">
                                    <p class="task-create__option-selected-item js-selection-pop" data-question-type="fitb">Long Answer (Ex. essay)</p>
                                    <ul class="task-create__option-selection">
                                        <li class="task-create__option-selection-item" data-value="fitb" >Fill in the blank</li>
                                        <li class="task-create__option-selection-item" data-value="la" data-the-same="la">Long Answer (Ex. essay)</li>
                                        <li class="task-create__option-selection-item" data-value="ma">Multiple answer</li>
                                        <li class="task-create__option-selection-item" data-value="mc">Multiple Choice</li>
                                        <li class="task-create__option-selection-item" data-value="id">Identification</li>
                                    </ul>
                                </div>
                                <button type="button" class="bttn task-create__bttn-delete js-delete-question">Delete</button>
                            </div>
                            <div class="task-create__question-main-content">
                                <div class="task-create__question-main--top">
                                    <h3 class="task-create__question-counter">Question {{++$loop->index}}</h3>
                                    <div class="task-create__question-wrapper">
                                        <input type="text" placeholder="Place your question here" value="{{$content[1]}}">
                                        <div class="task-create__question-wrapper-line"></div>
                                    </div>
                                    <p class="task-create__note">
                                        Note: Highlight the word that you want to be the correct answer then click the "Mark as correct answer" button below.
                                    </p>
                                    <div class="task-create__question-bttn-controls">
                                        <button type="button" class="bttn task-create__mark-as-correct-ans-bttn">Mark as correct answer button</button>
                                        <button type="button" class="bttn task-create__reset-question-bttn">Reset answer key</button>
                                    </div>
                                </div>
                                <div class="task-create__answer-preview">
                                    <p class="task-create__answer-preview-note">Choices</p>
                                    <textarea disabled></textarea>
                                </div>
                                <div class="task-create__attachment-wrapper">
                                    <div class="task-create__attachment-area">
                                        @if(!empty($content[3]))
                                            @foreach($content[3] as $src)
                                                @foreach(\App\Models\ImageStorage::select('id', 'storage_path')->where('id', (int) $src)->get() as $img)
                                                    <div class="task-create__attachment-holder" data-img-id="{{$img->id}}" data-img-path="{{$img->storage_path}}">
                                                        <div class="task-create__attachment-box">
                                                            <img class="img-fluid" src="{{$img->storage_path}}" alt="Attachment Image">
                                                        </div>
                                                        <button type="button" class="task-create__attachment-remove-bttn bttn">
                                                            <span class="task-create__attachment-bttn-line-wrapper"></span>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </div>
                                    <input type="file" name="pictureAttachment[]" class="js-upload-picture" multiple="null">
                                    <button type="button" class="task-create__attach-bttn bttn">Add a picture</button>
                                    <p>Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg</p>
                                </div>
                            </div>
                            <div class="task-create__question-bottom">
                                <div class="task-create__question-how-many-points">
                                    <label for="pointsTxt{{$loop->index}}">Points for this question: </label>
                                    <input type="number" placeholder="1" min="1" value="{{$content[2]}}" id="pointsTxt{{$loop->index}}">
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($content[0] === 'ma')
                    @if($content[1] === 'true')
                        <p>{{json_encode($content)}}</p>
                        <div class="task-create__question-maker-panel" data-question-type="ma">
                            <div class="task-create__question-main-content">
                                <div class="task-create__question-main-content--top">
                                    <div class="task-create__question-options">
                                        <p class="task-create__option-selected-item js-selection-pop" data-question-type="ma">Multiple Answer</p>
                                        <ul class="task-create__option-selection">
                                            <li class="task-create__option-selection-item" data-value="fitb">Fill in the blank</li>
                                            <li class="task-create__option-selection-item" data-value="la">Long Answer (Ex. essay)</li>
                                            <li class="task-create__option-selection-item" data-value="ma" data-the-same="ma">Multiple answer</li>
                                            <li class="task-create__option-selection-item" data-value="mc">Multiple Choice</li>
                                            <li class="task-create__option-selection-item" data-value="id">Identification</li>
                                        </ul>
                                    </div>
                                    <button type="button" class="bttn task-create__bttn-delete js-delete-question">Delete</button>
                                </div>
                                <div class="task-create__question-main-content">
                                    <div class="task-create__question-main--top">
                                        <h3 class="task-create__question-counter">Question {{++$loop->index}}</h3>
                                        <div class="task-create__question-wrapper">
                                            <input type="text" placeholder="Place your question here" value="{{$content[2]}}">
                                            <div class="task-create__question-wrapper-line"></div>
                                        </div>
                                        <p class="task-create__note">
                                            Note: Highlight the word that you want to be the correct answer then click the "Mark as correct answer" button below.
                                        </p>
                                    </div>
                                    <div class="task-create__answer-preview">
                                        <p class="task-create__answer-preview-note">Choices</p>
                                        <div class="task-create__bttn-controls" data-txt-only="true">
                                            <button type="button" class="bttn task-create__bttn-checkbox" style="color: white;">Plain text only</button>
                                            <button type="button" class="bttn task-create__bttn-checkbox">Image only</button>
                                            <div class="task-create__bttn-checkbox-bg"></div>
                                        </div>
                                        <p class="task-create__checkbox-note">Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.</p>
                                        <div class="task-create__ma-wrapper">
                                            @foreach($content[3] as $ct)
                                                <div class="task-create__ma-choice-wrapper">
                                                    <div class="task-create__ma-checkbox-wrapper">
                                                        @if(in_array($ct, $content[4]))
                                                            <input type="checkbox" id="{{$ct}}" value="{{$ct}}" checked>
                                                        @else
                                                            <input type="checkbox" id="{{$ct}}" value="{{$ct}}">
                                                        @endif
                                                        <label for="{{$ct}}"></label>
                                                    </div>
                                                    <div class="task-create__ma-checkinput-wrapper">
                                                        <p class="task-create__ma-txt-input">{{$ct}}</p>
                                                        <div class="task-create__ma-checkinput-wrapper-line"></div>
                                                    </div>
                                                    <button class="task-create__choice-close-bttn bttn" type="button">
                                                        <span class="task-create__choice-close-bttn-line"></span>
                                                    </button>
                                                </div>
                                            @endforeach
                                            <button type="button" class="bttn task-create__ma-wrapper-bttn">Add choices</button>
                                        </div>
                                    </div>
                                    <div class="task-create__attachment-wrapper">
                                        <div class="task-create__attachment-area">
                                            @if(!empty($content[6]))
                                                @foreach($content[6] as $src)
                                                    @foreach(\App\Models\ImageStorage::select('id', 'storage_path')->where('id', (int) $src)->get() as $img)
                                                        <div class="task-create__attachment-holder" data-img-id="{{$img->id}}" data-img-path="{{$img->storage_path}}">
                                                            <div class="task-create__attachment-box">
                                                                <img class="img-fluid" src="{{$img->storage_path}}" alt="Attachment Image">
                                                            </div>
                                                            <button type="button" class="task-create__attachment-remove-bttn bttn">
                                                                <span class="task-create__attachment-bttn-line-wrapper"></span>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </div>
                                        <input type="file" name="pictureAttachment[]" class="js-upload-picture" multiple="null">
                                        <button type="button" class="task-create__attach-bttn bttn">Add a picture</button>
                                        <p>Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg</p>
                                    </div>
                                </div>
                                <div class="task-create__question-bottom">
                                    <div class="task-create__question-how-many-points">
                                        <label for="pointsTxt{{$loop->index}}">Points for this question: </label>
                                        <input type="number" placeholder="1" min="1" value="{{$content[5]}}" id="pointsTxt{{$loop->index}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>{{json_encode($content)}}</p>
                        <div class="task-create__question-maker-panel" data-question-type="ma">
                            <div class="task-create__question-main-content">
                                <div class="task-create__question-main-content--top">
                                    <div class="task-create__question-options">
                                        <p class="task-create__option-selected-item js-selection-pop" data-question-type="ma">Multiple Answer</p>
                                        <ul class="task-create__option-selection">
                                            <li class="task-create__option-selection-item" data-value="fitb">Fill in the blank</li>
                                            <li class="task-create__option-selection-item" data-value="la">Long Answer (Ex. essay)</li>
                                            <li class="task-create__option-selection-item" data-value="ma" data-the-same="ma">Multiple answer</li>
                                            <li class="task-create__option-selection-item" data-value="mc">Multiple Choice</li>
                                            <li class="task-create__option-selection-item" data-value="id">Identification</li>
                                        </ul>
                                    </div>
                                    <button type="button" class="bttn task-create__bttn-delete js-delete-question">Delete</button>
                                </div>
                                <div class="task-create__question-main-content">
                                    <div class="task-create__question-main--top">
                                        <h3 class="task-create__question-counter">Question {{++$loop->index}}</h3>
                                        <div class="task-create__question-wrapper">
                                            <input type="text" placeholder="Place your question here" value="{{$content[2]}}">
                                            <div class="task-create__question-wrapper-line"></div>
                                        </div>
                                        <p class="task-create__note">
                                            Note: You are only allowed to add choices with pictures. Switch to plain text if you want to add choices with plain texts.
                                        </p>
                                    </div>
                                    <div class="task-create__answer-preview">
                                        <p class="task-create__answer-preview-note">Choices</p>
                                        <div class="task-create__bttn-controls" data-txt-only="true">
                                            <button type="button" class="bttn task-create__bttn-checkbox" style="color: white;">Plain text only</button>
                                            <button type="button" class="bttn task-create__bttn-checkbox">Image only</button>
                                            <div class="task-create__bttn-checkbox-bg"></div>
                                        </div>
                                        <p class="task-create__checkbox-note">Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.</p>
                                        <div class="task-create__ma-wrapper">
                                            @foreach($content[3] as $ct)
                                            @endforeach
                                                <div class="task-create__ma-choice-wrapper"><div class="task-create__ma-checkbox-wrapper"><input type="checkbox" id="i11hd" value="i11hd"><label for="i11hd"></label></div><div class="task-create__checkbox-img-wrapper" data-img-id="20" data-img-path="/storage/img/95d219ed0d607d725ed6f49dcde2cca4cae56cdf.jpg"><img src="" alt="Image for checkbox" class="img-fluid task-create__checkbox-img"></div><div style=""><button class="task-create__choice-close-bttn bttn"><span class="task-create__choice-close-bttn-line"></span></button></div></div>
                                            <button type="button" class="bttn task-create__ma-wrapper-bttn">Add choices</button>
                                        </div>
                                    </div>
                                    <div class="task-create__attachment-wrapper">
                                        <div class="task-create__attachment-area">
                                            @if(!empty($content[6]))
                                                @foreach($content[6] as $src)
                                                    @foreach(\App\Models\ImageStorage::select('id', 'storage_path')->where('id', (int) $src)->get() as $img)
                                                        <div class="task-create__attachment-holder" data-img-id="{{$img->id}}" data-img-path="{{$img->storage_path}}">
                                                            <div class="task-create__attachment-box">
                                                                <img class="img-fluid" src="{{$img->storage_path}}" alt="Attachment Image">
                                                            </div>
                                                            <button type="button" class="task-create__attachment-remove-bttn bttn">
                                                                <span class="task-create__attachment-bttn-line-wrapper"></span>
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </div>
                                        <input type="file" name="pictureAttachment[]" class="js-upload-picture" multiple="null">
                                        <button type="button" class="task-create__attach-bttn bttn">Add a picture</button>
                                        <p>Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg</p>
                                    </div>
                                </div>
                                <div class="task-create__question-bottom">
                                    <div class="task-create__question-how-many-points">
                                        <label for="pointsTxt{{$loop->index}}">Points for this question: </label>
                                        <input type="number" placeholder="1" min="1" value="{{$content[5]}}" id="pointsTxt{{$loop->index}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @elseif($content[0] === 'mc')
                @elseif($content[0] === 'id')
                @endif
            @endforeach
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/libraries/date picker/mtr-datepicker.min.js"></script>
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/teacher/classroom/task.viewing.js"></script>
@endsection
