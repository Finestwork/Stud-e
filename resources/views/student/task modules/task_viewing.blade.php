@extends('partials.base')

@section('title')
    You are taking a quiz ......
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.view-task.style.css">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="task-viewing">
                        <a href="{{ url()->previous() }}" class="task-viewing__go-back">
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
                                <p>TASK TYPE</p>
                            </div>
                            <div class="task-viewing__tag--status status--default">
                                <p>PENDING</p>
                            </div>
                        </div>
                        <div class="task-viewing__info-container">
                            <h1 class="task-viewing__info-title">What is the difference of physics and metaphysics?</h1>
                            <p class="task-viewing__info-txt"><span class="task-viewing__info-label">Instructions:</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi, cum eaque eligendi enim, est harum ipsum laudantium molestias neque, quam quas quia reprehenderit? Accusamus adipisci eius expedita similique voluptas.</p>
                            <p class="task-viewing__info-date-created"><span class="task-viewing__info-label">Date created:</span> November 7, 2020</p>
                            <p class="task-viewing__info-date-due"><span class="task-viewing__info-label">Due date:</span> December 7, 2020</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Total items:</span> 50</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Max score:</span> 100</p>
                            <p class="task-viewing__info-max-score"><span class="task-viewing__info-label">Your score:</span> 80</p>
                            <div class="task-viewing__bttn-group">
                                <button type="button" class="bttn task-viewing__bttn">View your answer</button>
                            </div>
                        </div>
                        <div class="task-viewing__teacher-container">
                            <div class="task-viewing__teacher-line"></div>
                            <h2 class="task-viewing__teacher-comment-title">Teacher's comment</h2>
                            <p class="task-viewing__teacher-comment-txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab corporis enim labore laborum magnam nobis perferendis porro recusandae! Culpa cumque cupiditate doloremque ea ipsam repellat reprehenderit soluta tempore unde voluptatibus.</p>
                        </div>
                    </div>
                    <div class="answer-sheet">
                        <ol class="answer-sheet__list-wrapper">
                            <li class="answer-sheet__item correct-answer">
                                <p class="answer-sheet__question">Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
                                <textarea class="answer-sheet__done-textarea" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur maxime nobis optio reprehenderit, vitae! Assumenda, eos facilis minima nam necessitatibus pariatur perferendis perspiciatis porro quasi rerum saepe suscipit vero.</textarea>
                            </li>
                            <li class="answer-sheet__item wrong-answer">
                                <p class="answer-sheet__question">Lorem ipsum dolor sit amet, consectetur adipisicing elit?</p>
                                <textarea class="answer-sheet__done-textarea" readonly>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur maxime nobis optio reprehenderit, vitae! Assumenda, eos facilis minima nam necessitatibus pariatur perferendis perspiciatis porro quasi rerum saepe suscipit vero.</textarea>
                            </li>
                            <li class="answer-sheet__item correct-answer fill-in-the-blank">
                                <p class="answer-sheet__question">
                                    <span>Lorem ipsum dolor sit</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>,</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>at</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                            <li class="answer-sheet__item wrong-answer fill-in-the-blank">
                                <p>
                                    <span>Lorem ipsum dolor sit</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>,</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>at</span>
                                    <textarea type="text" rows="1" readonly> weqeqweqwewq</textarea>
                                    <span>amet consectetur adipisicing elit?</span>
                                </p>
                            </li>
                            <li class="answer-sheet__item correct-answer">
                                <p class="answer-sheet__question">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid esse ex expedita id itaque libero, nostrum odit soluta temporibus voluptates! Aut dignissimos dolores ducimus fugiat id odit officiis possimus quia?
                                </p>
                                <div class="answer-sheet__radio-bttn-group">
                                    <div class="answer-sheet__radio-bttn radio-checked">
                                        <input type="radio" disabled>
                                        <label disabled>A. Choice 1</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>B. Choice 2</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>C. Choice 3</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>D. Choice 4</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>E. Choice 5</label>
                                    </div>
                                </div>
                            </li>
                            <li class="answer-sheet__item wrong-answer">
                                <p class="answer-sheet__question">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid esse ex expedita id itaque libero, nostrum odit soluta temporibus voluptates! Aut dignissimos dolores ducimus fugiat id odit officiis possimus quia?
                                </p>
                                <div class="answer-sheet__radio-bttn-group">
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>A. Choice 1</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn radio-wrong">
                                        <input type="radio" disabled>
                                        <label disabled>B. Choice 2</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>C. Choice 3</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>D. Choice 4</label>
                                    </div>
                                    <div class="answer-sheet__radio-bttn">
                                        <input type="radio" disabled>
                                        <label disabled>E. Choice 5</label>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/student/task/task.viewing.js"></script>
@endsection
