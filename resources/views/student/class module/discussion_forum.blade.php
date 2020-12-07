@extends('partials.base')

@section('title')
    Discussion Board - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.discussion.board.style.css">
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
    <main class="discussion-board">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <ul class="sidelinks__links-container">
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.modules', 'classUniqueID') }}" class="sidelinks__links">Modules</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.tasks', 'classUniqueID') }}" class="sidelinks__links">Tasks</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.discussion', 'classUniqueID') }}" class="sidelinks__links link--active">Discussion</a>
                            </li>
                            <li class="sidelinks__links-item">
                                <a href="{{ route('student.members', 'classUniqueID') }}" class="sidelinks__links ">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="discussion-board__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('student.class') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <a href="{{ route('student.discussion', 'classUniqueID') }}" class="breadcrumbs__link">Discussion board</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">Hey there class! How are you today?</span>
                                </div>
                            </div>
                            <a href="#replySection" id="replyBttnSection" class="bttn--primary--small discussion-board__reply-bttn">Reply to this thread</a>
                            <div class="discussion-board__main-container">
                                <div class="discussion-board__post-container">
                                    <!-- TOP -->
                                    <div class="discussion-board__top-line teacher-line"></div>
                                    <div class="discussion-board__post-top teacher">
                                        <div class="discussion-board__top-img-wrapper">
                                            <div class="discussion-board__top-img">
                                                <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                            </div>
                                            <span class="discussion-board__top-img-position">Teacher</span>
                                        </div>
                                        <div class="discussion-board__post-top-right">
                                            <p class="discussion-board__post-title-date">Posted on December 5, 2020 by Juan Dela Cruz</p>
                                            <h1 class="discussion-board__post-title">Hey there class! How are you today?</h1>
                                        </div>
                                    </div>
                                    <div class="discussion-board__post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi architecto ducimus maxime molestias, nam necessitatibus neque quidem rerum soluta ullam vero voluptas voluptates. Asperiores earum error expedita laboriosam velit? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam beatae consequatur consequuntur eligendi et facere ipsam iste magnam maxime, minima natus non numquam placeat quasi rerum similique temporibus, veritatis. Animi.</p>
                                        <br><br>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi architecto ducimus maxime molestias, nam necessitatibus neque quidem rerum soluta ullam vero voluptas voluptates. Asperiores earum error expedita laboriosam velit? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam beatae consequatur consequuntur eligendi et facere ipsam iste magnam maxime, minima natus non numquam placeat quasi rerum similique temporibus, veritatis. Animi.</p>
                                    </div>
                                    <div class="discussion-board__post-seen">
                                        <div class="discussion-board__seen-img">
                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Image of user who have seen the post" class="adjust-img-js">
                                        </div>
                                        <div class="discussion-board__seen-img">
                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Image of user who have seen the post" class="adjust-img-js">
                                        </div>
                                        <div class="discussion-board__seen-img">
                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Image of user who have seen the post" class="adjust-img-js">
                                        </div>
                                        <div class="discussion-board__seen-img">
                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Image of user who have seen the post" class="adjust-img-js">
                                        </div>
                                        <div class="discussion-board__seen-img">
                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Image of user who have seen the post" class="adjust-img-js">
                                        </div>
                                    </div>
                                    <!-- MIDDLE -->
                                    <div class="discussion-board__replies-wrapper">
                                        <h2 class="discussion-board__replies-title">Replies</h2>
                                        <ul class="discussion-board__replies-list-wrapper">
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="discussion-board__replies-list">
                                                <div class="discussion-board__replies-left student">
                                                    <div class="discussion-board__replies-img-wrapper">
                                                        <div class="discussion-board__replies-img">
                                                            <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of a thread starter" class="adjust-img-js">
                                                        </div>
                                                        <span class="discussion-board__replies-img-position">Student</span>
                                                    </div>
                                                </div>
                                                <div class="discussion-board__replies-right">
                                                    <p class="discussion-board__replies-date">Juan Dela Cruz replied 1 min ago</p>
                                                    <div class="discussion-board__replies-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus alias consectetur, debitis dignissimos eligendi ex in iste laborum magnam minus provident quibusdam ratione repellat saepe similique sit veritatis vero.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <h2 class="discussion-board__replies-title">Your reply</h2>
                                    </div>
                                    <div class="discussion-board__your-reply-wrapper">
                                        <div class="discussion-board__your-reply--left-part">
                                            <img src="/assets/imgs/test images/professor.jpg" alt="Your profile picture" class="adjust-img-js">
                                        </div>
                                        <div class="discussion-board__your-reply--right-part" id="replySection">
                                            <form class="discussion-board__form">
                                                @csrf
                                                <textarea class="discussion-board__text-area" placeholder="Place your reply here"></textarea>
                                                <button type="submit" class="bttn bttn--primary--small discussion-board__form-bttn">Submit your reply</button>
                                            </form>
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
    <script src="/assets/js/libraries/scrolltosmooth.min.js"></script>
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/modules/student/student.discussion.board.js"></script>
@endsection
