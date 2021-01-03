@extends('partials.base')

@section('title')
    Modules - {{ $classrooms[0]->classroom_name }}
@endsection

@section('cs-css')
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/fantasy/index.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/libraries/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="/css/libraries/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="/css/libraries/green audio/audio.css">

    <link rel="stylesheet" href="/css/teacher/classroom.modules.style.css">
@endsection

@section('cs-js')
    <script type="text/javascript">
        let classUrl = '{{ $classrooms[0]->classroom_unique_url }}';
    </script>
    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/smooth-scrollbar@8.2.7,npm/smooth-scrollbar@8.2.7/dist/plugins/overscroll.min.js"></script>
    <script src="/assets/js/libraries/photoswipe/photoswipe.min.js"></script>
    <script src="/assets/js/libraries/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
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
                                    <div class="modules__controls-container js-add-module-container">
                                        <h1 class="modules__main-label">Create your module.</h1>
                                        <p class="modules__warning js-warning-blank">Please make sure that all fields are not blank</p>
                                        <button class="modules__hide-upload-container js-close-panel" type="button">Close panel</button>
                                        <form method="POST" class="modules__upload-form">
                                            <div class="modules__form-group">
                                                <label for="moduleTitleTxt">Module title</label>
                                                <input type="text" name="moduleTitleTxt" id="moduleTitleTxt" placeholder="Place your module's title here">
                                                <p class="modules__form-note">Note: This will be a title of your module</p>
                                            </div>
                                            <div class="modules__form-group">
                                                <label for="descriptionTxt">Module description</label>
                                                <textarea name="descriptionTxt" id="descriptionTxt" placeholder="Place your module's descripiton here"></textarea>
                                                <p class="modules__form-note">Note: This will be a title of your module</p>
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
                                            <button type="button" class="bttn modules__publish-bttn js-pusblish-bttn">Publish</button>
                                        </form>
                                    </div>
                                    <div class="modules__controls-container js-update-container">
                                        <h1 class="modules__main-label">You are updating your module.</h1>
                                        <p class="modules__warning js-upload-warning-blank">Please make sure that all fields are not blank</p>
                                        <button class="modules__hide-upload-container js-close-update-panel" type="button">Close panel</button>
                                        <form method="POST" class="modules__upload-form">
                                            <div class="modules__form-group">
                                                <label for="updateTitleTxt">Module title</label>
                                                <input type="text" name="updateTitleTxt" id="updateTitleTxt" placeholder="Place your module's title here">
                                                <p class="modules__form-note">Note: This will be a title of your module</p>
                                            </div>
                                            <div class="modules__form-group">
                                                <label for="updateDescriptionTxt">Module description</label>
                                                <textarea name="updateDescriptionTxt" id="updateDescriptionTxt" placeholder="Place your module's descripiton here"></textarea>
                                                <p class="modules__form-note">Note: This will be a title of your module</p>
                                            </div>
                                            <div class="modules__drop-form">
                                                <label>File uploader</label>
                                                <div class="modules__drop-zone">
                                                    <div class="modules__drop-icon">
                                                        <img src="/assets/svgs/icons/attach.svg" alt="Attachment icon" class="img-fluid">
                                                    </div>
                                                    <p class="modules__drop-txt"><span class="modules__drop-emp-txt">Add file</span> or drop files here</p>
                                                    <input type="file" name="updateFile[]" id="updateFileInput" multiple>
                                                </div>
                                            </div>
                                            <div class="modules__form-group modules__add-new-links-wrapper">
                                                <button type="button" class="bttn modules__add-link-bttn js-add-new-link">Add link</button>
                                            </div>
                                            <button type="button" class="bttn modules__publish-bttn js-save-modules-changes-bttn">Save changes</button>
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
                                            <div class="modules__divider">
                                                <h2 class="modules__divider-title">{{ $pt->module_primary_title }}</h2>
                                                <div class="modules__controls-wrapper" data-id="{{ $pt->id }}">
                                                    <button type="button" class="bttn modules__delete-title-bttn js-delete-title">Delete title</button>
                                                    <button type="button" class="bttn modules__change-title-bttn js-edit-title">
                                                        <span class="modules__change-title-bttn-front">Edit Title</span>
                                                        <span class="modules__change-title-bttn-back" style="display: none;">Save changes</span>
                                                    </button>
                                                    <button type="button" class="bttn modules__change-title-bttn js-add-modules">Add module</button>
                                                </div>
                                                @foreach(\App\Models\Modules::select('id', 'secondary_title', 'description', 'document_id', 'video_id', 'audio_id', 'image_id', 'pdf_id', 'external_links')->where('primary_title_id', $pt->id)->get() as $module)
                                                    <div class="modules__lists">
                                                        <div class="modules__list" data-id="{{ $module->id }}">
                                                            <div class="modules__list-top">
                                                                <h3 class="modules__list-title">{{ $module->secondary_title }}</h3>
                                                            </div>
                                                            <div class="modules__list-bottom">
                                                                <p class="modules__description"><span class="modules__description-lbl">Description:</span><span class="modules__description-txt">{{ $module->description }}</span></p>
                                                                @if(count($module->image_id) > 0)
                                                                    <h3 class="modules__files-title">Gallery</h3>
                                                                    <div class="modules__gallery-box">
                                                                        @foreach($module->image_id as $img_id)
                                                                            @foreach(\App\Models\ImageStorage::select('id','storage_path', 'original_name')->where('id', (int)$img_id)->get() as $img)
                                                                                <a class="modules__img" href="{{stripslashes($img->storage_path)}}" data-img-name="{{$img->original_name}}" data-id="{{ $img->id }}">
                                                                                    <img src="{{stripslashes($img->storage_path)}}" alt="Module's image" class="img-fluid modules__actual-img">
                                                                                </a>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                @if(count($module->audio_id) > 0)
                                                                    <h3 class="modules__files-title">Audio</h3>
                                                                    <div class="modules__audio-wrapper">
                                                                        @foreach($module->audio_id as $audio_id)
                                                                            @foreach(\App\Models\AudioStorage::select('id', 'storage_path', 'original_name')->where('id', (int)$audio_id)->get() as $audio)
                                                                                <div class="modules__player-item" data-audio-path="{{$audio->storage_path}}" data-audio-id="{{$audio->id}}" data-audio-name="{{$audio->original_name}}">
                                                                                    <p class="modules__player-name"><a href="{{$audio->storage_path}}" class="modules__player-link">{{$audio->original_name}}</a></p>
                                                                                    <div class="audio-player">
                                                                                        <audio>
                                                                                            <source src="{{stripslashes($audio->storage_path)}}" type="audio/mpeg">
                                                                                        </audio>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                @if(count($module->video_id) > 0)
                                                                    <h3 class="modules__files-title">Video</h3>
                                                                    <div class="modules__video-wrapper">
                                                                        @foreach($module->video_id as $video_id)
                                                                            @foreach(\App\Models\VideoStorage::select('id', 'storage_path', 'original_name')->where('id', (int)$video_id)->get() as $video)
                                                                                <div class="modules__video" data-video-path="{{$video->storage_path}}" data-video-id="{{$video->id}}" data-video-name="{{$video->original_name}}">
                                                                                    <p class="modules__video-txt"><a href="{{$video->storage_path}}" class="modules__video-link">{{$video->original_name}}</a></p>
                                                                                    <video
                                                                                        id="my-video"
                                                                                        class="video-js vjs-theme-fantasy"
                                                                                        controls
                                                                                        preload="auto"
                                                                                        width="640"
                                                                                        height="264"
                                                                                        data-setup="{}"
                                                                                    >
                                                                                        <source src="{{stripslashes($video->storage_path)}}" type="video/mp4" />
                                                                                        <p class="vjs-no-js">
                                                                                            To view this video please enable JavaScript, and consider upgrading to a
                                                                                            web browser that
                                                                                            <a href="https://videojs.com/html5-video-support/" target="_blank"
                                                                                            >supports HTML5 video</a
                                                                                            >
                                                                                        </p>
                                                                                    </video>
                                                                                </div>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                @if(count($module->pdf_id) > 0 || count($module->document_id) > 0)
                                                                    <h3 class="modules__files-title">Documents</h3>
                                                                    <ol class="modules__document-wrapper">
                                                                        @if(count($module->pdf_id) > 0)
                                                                            @foreach($module->pdf_id as $pdf_id)
                                                                                @foreach(\App\Models\PdfStorage::select('id', 'storage_path', 'original_name')->where('id', (int)$pdf_id)->get() as $pdf)
                                                                                    <li class="modules__document-txt js-pdf-storage" data-pdf-path="{{$pdf->storage_path}}" data-pdf-id="{{$pdf->id}}" data-pdf-name="{{$pdf->original_name}}"><a href="{{$pdf->storage_path}}" class="modules__document-link">{{$pdf->original_name}}</a></li>
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endif
                                                                        @if(count($module->document_id) > 0)
                                                                            @foreach($module->document_id as $document_id)
                                                                                @foreach(\App\Models\DocumentStorage::select('id', 'storage_path', 'original_name')->where('id', (int)$document_id)->get() as $document)
                                                                                    <li class="modules__document-link js-document-storage" data-document-path="{{$document->storage_path}}" data-document-id="{{$document->id}}" data-document-name="{{$document->original_name}}"><a href="{{$document->storage_path}}">{{$document->original_name}}</a></li>
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endif
                                                                    </ol>

                                                                @endif
                                                                @if(count($module->external_links) > 0)
                                                                    <h3 class="modules__files-title">Links</h3>
                                                                    <ol class="modules__link-list">
                                                                        @foreach($module->external_links as $links)
                                                                            <li class="modules__link-txt"><a href="{{ $links }}" target="_blank" class="modules__external-link">{{ $links }}</a></li>
                                                                        @endforeach
                                                                    </ol>
                                                                @endif
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
                                                                <div class="modules__bttn-controls">
                                                                    <button type="button" class="bttn modules__bttn--delete-module js-delete-module">Delete</button>
                                                                    <button type="button" class="bttn modules__bttn--edit-module js-edit-module">Edit</button>
                                                                </div>
                                                            </div><!-- MODULES LIST -->
                                                        </div>
                                                    </div>
                                                @endforeach

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
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
    <script src="/assets/js/helpers/navbar-with-fixed-sidebar.js"></script>
    <script src="/assets/js/libraries/audio/audio.js"></script>
    <script src="/assets/js/modules/teacher/classroom/modules.js"></script>
@endsection
