@extends('partials.base')

@section('title')
    Modules - Psychology with Drugs, HIV/AIDS, and SARS Education
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/student/student.classroom.style.css">
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
    <main class="classroom">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <ul class="classroom__links-container">
                            <li class="classroom__links-item">
                                <a href="{{ route('student.modules', 'classUniqueID') }}" class="classroom__links link--active">Modules</a>
                            </li>
                            <li class="classroom__links-item" >
                                <a href="{{ route('student.tasks', 'classUniqueID') }}" class="classroom__links ">Tasks</a>
                            </li>
                            <li class="classroom__links-item" >
                                <a href="{{ route('student.discussion', 'classUniqueID') }}" class="classroom__links">Discussion</a>
                            </li>

                            <li class="classroom__links-item">
                                <a href="{{ route('student.members', 'classUniqueID') }}" class="classroom__links ">Members</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-10 col-lrg-11">
                        <div class="classroom__right">
                            <div class="col-sm-12 col-lrg-12">
                                <div class="breadcrumbs">
                                    <a href="{{ route('student.class') }}" class="breadcrumbs__link">Classroom</a>
                                    <span class="breadcrumbs__arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                          <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                        </svg>
                                    </span>
                                    <span class="breadcrumbs__txt">Psychology with Drugs, HIV/AIDS, and SARS Education</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lrg-12">
                                <div class="modules">
                                    <h1 class="modules__heading">This is a user defined title</h1>
                                    <div class="row">
                                        <div class="col-lrg-12">
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Assignment</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Project</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modules">
                                    <h1 class="modules__heading">This is a user defined title</h1>
                                    <div class="row">
                                        <div class="col-lrg-12">
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Assignment</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Project</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modules">
                                    <h1 class="modules__heading">This is a user defined title</h1>
                                    <div class="row">
                                        <div class="col-lrg-12">
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Assignment</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Project</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modules__container">
                                                <div class="modules__container-top">
                                                    <h2 class="modules__title">The life and works of Rizal</h2>
                                                    <div class="modules__container-top-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.5 11.5">
                                                            <path id="Shape" d="M1.28.22A.75.75,0,0,0,.22,1.28l5,5a.75.75,0,0,0,1.061,0l5-5A.75.75,0,0,0,10.22.22L5.75,4.689Z" transform="translate(0 11.5) rotate(-90)" fill="#0D0417"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="modules__container-bottom">
                                                    <div class="modules__separator"></div>
                                                    <p class="modules__txt">Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim iusto, natus omnis possimus praesentium quaerat similique unde velit? Alias illum ipsa labore, perspiciatis quos suscipit vel? Adipisci eaque quo quod.</p>
                                                    <a href="#" class="modules__download-link">Click here to download your module 1</a>
                                                    <div class="modules__task-label-container">
                                                        <h3 class="modules__task-title">Task</h3>
                                                        <a href="#" class="modules__task-link">1. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">2. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">3. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">4. What is the difference of metaphysics and physics?</a>
                                                        <a href="#" class="modules__task-link">5. What is the difference of metaphysics and physics?</a>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="/assets/js/modules/student/student.classroom.js"></script>
@endsection
