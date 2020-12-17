@extends('partials.base')

@section('title')
    Welcome to your classroom!
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/classroom.home.style.css">
@endsection

@section('cs-js')
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
    <script src="/assets/js/helpers/string-checker.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
@endsection

@section('body-content')
    @include('partials.navbar')
    @include('teacher.optional partials.sidebar-primary')
    <div class="container--main">
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lrg-10 mx-auto">
                        <div class="banner class__banner">
                            <div class="banner__img-box">
                                <img src="/assets/illustration/Class banner illustration.svg" alt="An illustration for class banner" class="img-fluid">
                            </div>
                            <div class="banner__description">
                                <h1 class="banner__title">Classroom</h1>
                                @if($teacherClassroom->count() === 0)
                                    <p class="banner__txt">It seems like you haven't created your classroom.</p>
                                    <button class="banner__bttn--create bttn">Create classroom</button>
                                @else
                                    <p class="banner__txt">Here's the list of your currently active subject/s.</p>
                                    <div class="option">
                                        <div class="option__top" id="optionBttn">
                                            <p class="option__selected-text">Currently Enrolled</p>
                                            <div class="option__icon-box">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                                                    <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#ffffff"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <ul class="option__selection-container">
                                            <li class="option__select">Currently Active</li>
                                            <li class="option__select">Completed</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lrg-12 col-xlrg-12">
                        @if($teacherClassroom->count() !== 0)
                            <button class="banner__bttn--create bttn bttn--changed-loc">Create classroom</button>
                        @endif
                        <div class="loader-box">
                            <div class="loader"></div>
                            <p class="loader__text">Please wait while we set things up for you!</p>
                        </div>
                        <div class="form--secondary create-classroom show-create-panel">
                            <button class="form--secondary__close-panel bttn js-close-panel">Close this panel</button>
                            <h2 class="form--secondary__title">Start creating your classroom!</h2>
                            <p class="form--secondary__warning-txt">Bummer! Please make sure that all fields are not empty and valid.</p>
                            <p class="form--secondary__warning-txt js-warning-wrong">Uh-oh! Something went wrong, please try again later.</p>
                            <form>
                                <div class="form--secondary__group">
                                    <label for="classnameTxt">Classroom Name:</label>
                                    <input type="text" name="Txt" id="classnameTxt" placeholder="Place your classroom name here">
                                    <p class="class-note">Note: This will be the name of your classroom</p>
                                </div>
                                <div class="form--secondary__group">
                                    <label for="sectionTxt">Classroom Section:</label>
                                    <input type="text" name="sectionTxt" id="sectionTxt" placeholder="Place your classroom's section here">
                                    <p class="class-note">Note: It could be a section or something......</p>
                                </div>
                                <div class="form--secondary__group">
                                    <label for="descriptionTxt">Classroom Description:</label>
                                    <textarea id="descriptionTxt" placeholder="Place your class description here"></textarea>
                                    <p class="class-note">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium consequuntur expedita molestiae mollitia. Cupiditate dolorum excepturi expedita, fuga incidunt laudantium magnam maxime neque odio perferendis quasi qui, quos ut?</p>
                                </div>
                                <div class="form--secondary__group">
                                    <label for="scheduleTxt">Schedule:</label>
                                    <p class="class-note">Note: This will help your to super duper ******* organize your class</p>
                                    <div class="form--secondary__group">
                                        <div class="form--secondary__schedule-wrapper">
                                            <div class="date--wrapper">
                                                <label class="form--secondary__day-label">Select a day:</label>
                                                <select>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                            <div class="form--secondary__group">
                                                <label class="form--secondary__day-label">Note: Place here your preferred time:</label>
                                                <div class="time-wrapper">
                                                    <input type="text" placeholder="Ex. 7:00 AM - 7:00 PM" class="date-input">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="bttn form--secondary__schedule-bttn"  type="button" id="addScheduleBttn">Add schedule</button>
                                        <button class="bttn form--secondary__schedule-bttn--removed"  type="button" id="removeScheduleBttn">Remove schedule</button>
                                    </div>
                                </div>
                                <div class="form--secondary__group">
                                    <label for="codeTxt">Classroom Code:</label>
                                    <p class="form--secondary__warning-code js-warning-code">Your class code already exist, please choose another one.</p>
                                    <input type="text" name="Txt" id="codeTxt" placeholder="Place your code here">
                                    <p class="class-note">Note: In order to protect your classroom........</p>
                                </div>
                                <button type="button" class="bttn form--secondary__bttn">
                                    <span class="form--secondary__bttn-txt">Create classroom</span>
                                    <span class="loader-wrapper">
                                        <span class="loader--bttn"></span>
                                    </span>
                                </button>
                            </form>
                        </div>
                        <div class="current" id="current">
                            <div class="col-sm-12 col-md-12 col-lrg-12">
                                <div class="row">
                                    <ul class="card-list">
                                        @foreach($classrooms as $cr)
                                            <li class="card-list__item">
                                                <div class="card-list__subject-box">
                                                    <p class="card-list__lbl">Subject name</p>
                                                    <a href="{{ route('classroom.schedule', $cr->classroom_unique_url) }}" class="card-list__name">{{ $cr->classroom_name }}</a>
                                                </div>
                                                <div class="card-list__subject-members-box">
                                                    @if(\App\Models\Relations\ApprovedStudent::select('id')->where('classroom_id', $cr->id)->count() <= 1)
                                                        <p class="card-list__member-ctr">{{ \App\Models\Relations\ApprovedStudent::select('id')->where('classroom_id', $cr->id)->count() }} member</p>
                                                    @else
                                                        <p class="card-list__member-ctr">{{ \App\Models\Relations\ApprovedStudent::select('id')->where('classroom_id', $cr->id)->count() }} members</p>
                                                    @endif

                                                </div>
                                                <div class="card-list__subject-date-box">
                                                    <p class="card-list__lbl">Subject name</p>
                                                    <p class="card-list__date">{{ date('F j, Y', strtotime($cr->created_at)) }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CURRENT CLASS AND COMPLETED CLASS IS JUST TEMPORARY (PROTOTYPE), SHOWING OF SUBJECTS WILL BE DONE WITH AXIOS (FETCH) -->
                    <div class="completed" id="completed">
                        <div class="col-sm-12 col-md-12 col-lrg-12">
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-sidebar.js"></script>
    @if($teacherClassroom->count() != 0)
        <script src="/assets/js/modules/teacher/classroom/primary.js"></script>
    @endif
    <script src="/assets/js/modules/teacher/classroom/secondary.js"></script>

@endsection
