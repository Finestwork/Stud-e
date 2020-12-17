@extends('partials.base')

@section('title')
    Taking a common task ......
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.question.style.css">
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
    <main>
        <div class="container--main">
            <div class="question__extra">
                <p class="question__timer">Timer: 00:00</p>
                <p class="question__cheating-attempt">Cheating attempt: 0/3</p>
                <a class="question__show-instruction">Show instruction</a>
            </div>
            <div class="question">
                <h1 class="question__page-title">Page 1 of 2</h1>
                <div class="question__wrapper">
                    <div class="question__load-list">
                        <ol class="question__list-wrapper">
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <textarea class="question__textarea" placeholder="Place your answer here"></textarea>
                            </li>
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <div class="question__radio-bttn-group">
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice1" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice1">A. Choice 1</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice2" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice2">B. Choice 2</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice3" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice3">C. Choice 3</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice4" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice4">D. Choice 4</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice5" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice5">E. Choice 5</label>
                                    </div>
                                </div>
                            </li>
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <div class="question__radio-bttn-group">
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question3Choice1" name="question3">
                                        <label for="question3Choice1">True</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question3Choice2" name="question3">
                                        <label for="question3Choice2">False</label>
                                    </div>
                                </div>
                            </li>
                            <li class="question__list-item fill-in-the-blank">
                                <p class="answer-sheet__question">
                                    <span>Lorem ipsum dolor sit</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>,</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>at</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <div class="question__radio-bttn-group">
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice1" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice1">A. Choice 1</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice2" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice2">B. Choice 2</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice3" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice3">C. Choice 3</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice4" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice4">D. Choice 4</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice5" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice5">E. Choice 5</label>
                                    </div>
                                </div>
                            </li>
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <div class="question__radio-bttn-group">
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice1" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice1">A. Choice 1</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice2" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice2">B. Choice 2</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice3" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice3">C. Choice 3</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice4" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice4">D. Choice 4</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question2Choice5" name="question2" value="this will be automatically filled">
                                        <label for="question2Choice5">E. Choice 5</label>
                                    </div>
                                </div>
                            </li>
                            <li class="question__list-item">
                                <p class="question__list-txt">What is ethics?</p>
                                <div class="question__radio-bttn-group">
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question3Choice1" name="question3">
                                        <label for="question3Choice1">True</label>
                                    </div>
                                    <div class="question__radio-bttn">
                                        <input type="radio" id="question3Choice2" name="question3">
                                        <label for="question3Choice2">False</label>
                                    </div>
                                </div>
                            </li>
                            <li class="question__list-item fill-in-the-blank">
                                <p class="answer-sheet__question">
                                    <span>Lorem ipsum dolor sit</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>,</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>at</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                            <li class="question__list-item fill-in-the-blank">
                                <p class="answer-sheet__question">
                                    <span>Lorem ipsum dolor sit</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>,</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>at</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                            <li class="question__list-item fill-in-the-blank">
                                <p class="answer-sheet__question">
                                    <span>Lorem ipsum dolor sit</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>,</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>at</span>
                                    <input type="text" placeholder="Place your answer here">
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                        </ol>
                        <div class="question__footer">
                            <p class="question__page-nav">
                                <span class="question__page-lbl">Page</span>
                                <a href="#" class="question__page-links active">1</a>
                                <a href="#" class="question__page-links">2</a>
                            </p>
                            <button type="button" class="bttn bttn--primary--small">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script id="" src="/assets/js/modules/student/task/task-taking.js"></script>
@endsection
