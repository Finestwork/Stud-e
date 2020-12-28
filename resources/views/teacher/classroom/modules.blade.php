@extends('partials.base')

@section('title')
    Modules - {{ $classrooms[0]->classroom_name }}
@endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/teacher/classroom.modules.style.css">
@endsection

@section('cs-js')
    <script type="text/javascript">
        let classUrl = '{{ $classrooms[0]->classroom_unique_url }}';
    </script>
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/helpers/image-checker.js"></script>
    <script src="/assets/js/libraries/smooth-scrollbar.js"></script>
    <script src="/assets/js/helpers/scroll-bar-builder.js"></script>
@endsection


@section('body-content')
    @include('partials.navbar_box_shadow')
    @include('teacher.optional partials.sidebar--secondary')
    <main class="modules">
        <div class="container--main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lrg-1">
                        <div class="classroom__link-wrapper">
                            <div class="classroom__link-scrollbar">
                                <div class="classroom__links-container">
                                    @foreach($classrooms as $classroom)
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.schedule', $classroom->classroom_unique_url) }}" class="classroom__links">Schedule</a>
                                        </div>
                                        <div class="classroom__links-item">
                                            <a href="{{ route('classroom.modules', $classroom->classroom_unique_url) }}" class="classroom__links link--active">Modules</a>
                                        </div>
                                        <div class="classroom__links-item" >
                                            <a href="#" class="classroom__links ">Tasks</a>
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
                        <div class="modules__right">
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
                                <div class="modules__container">
                                    <div class="modules__controls-container">
                                        <h1 class="modules__main-label">Create your module</h1>
                                        <button class="modules__hide-upload-container js-close-panel" type="button">Close panel</button>
                                        <form method="POST" class="modules__upload-form">
                                            <div class="modules__form-group">
                                                <label for="moduleTitleTxt">Module title</label>
                                                <input type="text" name="moduleTitleTxt" id="moduleTitleTxt" placeholder="Place your module's title here">
                                                <p class="modules__form-note">Note: This will be a title for your module</p>
                                            </div>
                                            <div class="modules__form-group">
                                                <label for="descriptionTxt">Module description</label>
                                                <textarea name="descriptionTxt" id="descriptionTxt" placeholder="Place your module's descripiton here"></textarea>
                                                <p class="modules__form-note">Note: This will be a title for your module</p>
                                            </div>
                                            <div class="modules__drop-form">
                                                <label>File uploader</label>
                                                <div class="modules__drop-zone">
                                                    <div class="modules__drop-icon">
                                                        <img src="/assets/svgs/icons/attach.svg" alt="Attachment icon" class="img-fluid">
                                                    </div>
                                                    <p class="modules__drop-txt"><span class="modules__drop-emp-txt">Add file</span> or drop files here</p>
                                                    <input type="file" name="fileInput[]" id="fileInput" multiple>
                                                </div>
                                            </div>
                                            <div class="modules__form-group modules__links-wrapper">
                                                <button type="button" class="bttn modules__add-link-bttn js-add-link">Add link</button>
                                            </div>
                                            <button type="button" class="bttn modules__publish-bttn">Publish</button>
                                        </form>
                                    </div>
                                    @if($primaryTitles->count() === 0)
                                        <div class="modules__empty">
                                            <div class="empty__illustration">
                                                <img src="/assets/illustration/Empty list.svg" alt="Illustration for an empty modules list" class="img-fluid">
                                            </div>
                                            <h1 class="empty__title">Empty list.</h1>
                                            <p class="empty__txt">This is because you haven't uploaded any modules yet.</p>
                                        </div>
                                    @else
                                        @foreach($primaryTitles as $pt)
                                            <div class="modules__divider" data-id="{{ $pt->id }}">
                                                <h2 class="modules__divider-title">{{ $pt->module_primary_title }}</h2>
                                                <div class="modules__controls-wrapper">
                                                    <button type="button" class="bttn modules__change-title-bttn js-edit-title">
                                                        <span class="modules__change-title-bttn-front">Edit Title</span>
                                                        <span class="modules__change-title-bttn-back" style="display: none;">Save changes</span>
                                                    </button>
                                                    <button type="button" class="bttn modules__change-title-bttn js-add-modules">Add module</button>
                                                </div>
{{--                                                <div class="modules__lists">--}}
{{--                                                    <div class="modules__list">--}}
{{--                                                        <div class="modules__list-top">--}}
{{--                                                            <h3 class="modules__list-title">This is the title of the module</h3>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modules_list-bottom">--}}
{{--                                                            <p>Description: This is just a short description of the module.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        @endforeach
                                    @endif
                                        <button type="button" class="bttn modules__add-module-bttn js-add-title-bttn">
                                    <span class="modules__add-module-bttn-icon">
                                        <img src="/assets/svgs/icons/sidebar/Add icon.svg" Alt="Add icon for add module button" class="img-fluid">
                                    </span>
                                            <span>Add primary title</span>
                                        </button>
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
    <script src="/assets/js/modules/teacher/classroom/modules.js"></script>
@endsection
