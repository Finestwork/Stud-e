<aside class="sidebar" id="sidebar">
    <div class="scrollbar" id="scrollBar">
        @if(Request::path() !== 'teacher/classroom' && Request::path() !== 'teacher/classroom/create')
            <a class="sidebar__bttn bttn" href="{{ route('teacher.create.classroom') }}">
            <span class="sidebar__bttn-icon">
                <img src="/assets/svgs/icons/sidebar/Add icon.svg" alt="Sidebar Button Icon" class="img-fluid">
            </span>
                <span class="sidebar__bttn-txt">Create Classroom</span>
            </a>
            <div class="sidebar__line"></div>
        @endif
        @if(Request::path() == 'teacher')
            <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.home') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="19.041" viewBox="0 0 21 19.041">
                <path id="Fill_1184" data-name="Fill 1184" d="M15.749,19.041H5.25a2.643,2.643,0,0,1-2.625-2.654V7.35l-1.235.908a.862.862,0,0,1-.514.169.876.876,0,0,1-.709-.364A.893.893,0,0,1,.36,6.827L8.955.508a2.6,2.6,0,0,1,3.089,0l8.595,6.319a.885.885,0,0,1-.515,1.6.86.86,0,0,1-.514-.169L18.374,7.35v9.038A2.643,2.643,0,0,1,15.749,19.041ZM9.625,9.312h1.75A2.642,2.642,0,0,1,14,11.965v5.308h1.75a.881.881,0,0,0,.875-.885V6.064l-5.61-4.126a.869.869,0,0,0-1.03,0L4.374,6.064V16.387a.881.881,0,0,0,.875.885H7V11.965A2.642,2.642,0,0,1,9.625,9.312Zm0,1.769a.881.881,0,0,0-.875.884v5.308h3.5V11.965a.881.881,0,0,0-.875-.884Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Home</span>
            </a>
        @else
            <a class="sidebar__icon-wrapper" href="{{ route('student.home') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="19.041" viewBox="0 0 21 19.041">
                <path id="Fill_1184" data-name="Fill 1184" d="M15.749,19.041H5.25a2.643,2.643,0,0,1-2.625-2.654V7.35l-1.235.908a.862.862,0,0,1-.514.169.876.876,0,0,1-.709-.364A.893.893,0,0,1,.36,6.827L8.955.508a2.6,2.6,0,0,1,3.089,0l8.595,6.319a.885.885,0,0,1-.515,1.6.86.86,0,0,1-.514-.169L18.374,7.35v9.038A2.643,2.643,0,0,1,15.749,19.041ZM9.625,9.312h1.75A2.642,2.642,0,0,1,14,11.965v5.308h1.75a.881.881,0,0,0,.875-.885V6.064l-5.61-4.126a.869.869,0,0,0-1.03,0L4.374,6.064V16.387a.881.881,0,0,0,.875.885H7V11.965A2.642,2.642,0,0,1,9.625,9.312Zm0,1.769a.881.881,0,0,0-.875.884v5.308h3.5V11.965a.881.881,0,0,0-.875-.884Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Home</span>
            </a>
        @endif

        @if(Request::path() == 'teacher/classroom' || Request::path() == 'teacher/classroom/create')
            <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('teacher.classroom') }}">
        <span class="sidebar__icon-stroke-box">
            <svg class="sidebar__icon-stroke" xmlns="http://www.w3.org/2000/svg" width="16.255" height="20.19" viewBox="0 0 16.255 20.19">
              <g id="Group_26" data-name="Group 26" transform="translate(0.75 -3.56)">
                <g id="Group_295" data-name="Group 295" transform="translate(0 4.31)">
                  <path id="Path_5" data-name="Path 5" d="M4.5,3.976V20.206a.984.984,0,0,0,.984.984H18.272a.984.984,0,0,0,.984-.984V6.435a.984.984,0,0,0-.984-.984H5.976a1.476,1.476,0,0,1,0-2.951H18.763" transform="translate(-4.5 -2.5)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_1" data-name="Line 1" y2="11" transform="translate(3.522 5.19)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_2" data-name="Line 2" x2="5.2" transform="translate(6.391 6.012)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_3" data-name="Line 3" x2="5.2" transform="translate(6.391 9.534)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                </g>
              </g>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Classes</span>
            </a>
        @else
            <a class="sidebar__icon-wrapper" href="{{ route('teacher.classroom') }}">
        <span class="sidebar__icon-stroke-box">
            <svg class="sidebar__icon-stroke" xmlns="http://www.w3.org/2000/svg" width="16.255" height="20.19" viewBox="0 0 16.255 20.19">
              <g id="Group_26" data-name="Group 26" transform="translate(0.75 -3.56)">
                <g id="Group_295" data-name="Group 295" transform="translate(0 4.31)">
                  <path id="Path_5" data-name="Path 5" d="M4.5,3.976V20.206a.984.984,0,0,0,.984.984H18.272a.984.984,0,0,0,.984-.984V6.435a.984.984,0,0,0-.984-.984H5.976a1.476,1.476,0,0,1,0-2.951H18.763" transform="translate(-4.5 -2.5)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_1" data-name="Line 1" y2="11" transform="translate(3.522 5.19)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_2" data-name="Line 2" x2="5.2" transform="translate(6.391 6.012)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_3" data-name="Line 3" x2="5.2" transform="translate(6.391 9.534)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                </g>
              </g>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Classes</span>
            </a>
        @endif

        @if(Request::path() == 'student/task')
            <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.task') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
              <path id="Fill_1009" data-name="Fill 1009" d="M4.9,21H.947A.948.948,0,0,1,0,20.053V16.1a2.819,2.819,0,0,1,.833-2.009L14.094.832a2.841,2.841,0,0,1,4.018,0l2.058,2.057a2.846,2.846,0,0,1,0,4.019L6.908,20.167A2.829,2.829,0,0,1,4.9,21ZM12.314,5.29h0L2.172,15.432a.941.941,0,0,0-.278.67v3h3a.943.943,0,0,0,.671-.278L15.71,8.687l-3.4-3.4Zm3.789-3.4a.943.943,0,0,0-.67.277l-1.779,1.78,3.4,3.4,1.78-1.78a.95.95,0,0,0,0-1.338L16.772,2.171A.94.94,0,0,0,16.1,1.894Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Tasks</span>
            </a>
        @else
            <a class="sidebar__icon-wrapper" href="{{ route('student.task') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
              <path id="Fill_1009" data-name="Fill 1009" d="M4.9,21H.947A.948.948,0,0,1,0,20.053V16.1a2.819,2.819,0,0,1,.833-2.009L14.094.832a2.841,2.841,0,0,1,4.018,0l2.058,2.057a2.846,2.846,0,0,1,0,4.019L6.908,20.167A2.829,2.829,0,0,1,4.9,21ZM12.314,5.29h0L2.172,15.432a.941.941,0,0,0-.278.67v3h3a.943.943,0,0,0,.671-.278L15.71,8.687l-3.4-3.4Zm3.789-3.4a.943.943,0,0,0-.67.277l-1.779,1.78,3.4,3.4,1.78-1.78a.95.95,0,0,0,0-1.338L16.772,2.171A.94.94,0,0,0,16.1,1.894Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Tasks</span>
            </a>
        @endif

        @if(Request::path() == 'student/grade')
            <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.grade') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21.003" height="20.369" viewBox="0 0 21.003 20.369">
              <path id="Fill_1162" data-name="Fill 1162" d="M15.893,20.369a1.745,1.745,0,0,1-.824-.209L10.5,17.744,5.934,20.16a1.745,1.745,0,0,1-.824.209,1.772,1.772,0,0,1-1.355-.639,1.749,1.749,0,0,1-.387-1.437l.86-5.164L.53,9.457A1.751,1.751,0,0,1,.091,7.641a1.761,1.761,0,0,1,1.42-1.207l5.11-.766L8.915.992a1.765,1.765,0,0,1,3.173,0l2.293,4.676,5.111.766a1.78,1.78,0,0,1,.981,3.023l-3.7,3.672.86,5.164a1.749,1.749,0,0,1-.387,1.437A1.772,1.772,0,0,1,15.893,20.369ZM10.5,15.734h0l5.39,2.852L14.88,12.512l4.351-4.32-6.026-.9L10.5,1.777,7.8,7.289l-6.026.9,4.351,4.32L5.111,18.586l5.39-2.852Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Grades</span>
            </a>
        @else
            <a class="sidebar__icon-wrapper" href="{{ route('student.grade') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21.003" height="20.369" viewBox="0 0 21.003 20.369">
              <path id="Fill_1162" data-name="Fill 1162" d="M15.893,20.369a1.745,1.745,0,0,1-.824-.209L10.5,17.744,5.934,20.16a1.745,1.745,0,0,1-.824.209,1.772,1.772,0,0,1-1.355-.639,1.749,1.749,0,0,1-.387-1.437l.86-5.164L.53,9.457A1.751,1.751,0,0,1,.091,7.641a1.761,1.761,0,0,1,1.42-1.207l5.11-.766L8.915.992a1.765,1.765,0,0,1,3.173,0l2.293,4.676,5.111.766a1.78,1.78,0,0,1,.981,3.023l-3.7,3.672.86,5.164a1.749,1.749,0,0,1-.387,1.437A1.772,1.772,0,0,1,15.893,20.369ZM10.5,15.734h0l5.39,2.852L14.88,12.512l4.351-4.32-6.026-.9L10.5,1.777,7.8,7.289l-6.026.9,4.351,4.32L5.111,18.586l5.39-2.852Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Grades</span>
            </a>
        @endif

        @if(Request::path() == 'student.schedule')
            <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.schedule') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path id="Shape" d="M2.829,18A2.832,2.832,0,0,1,0,15.171V4.886A2.833,2.833,0,0,1,2.571,2.069V.771a.771.771,0,0,1,1.543,0V2.057H8.229V.771a.771.771,0,1,1,1.543,0V2.057h4.115V.771a.771.771,0,1,1,1.543,0v1.3A2.833,2.833,0,0,1,18,4.886V15.171A2.832,2.832,0,0,1,15.171,18ZM1.543,15.171a1.288,1.288,0,0,0,1.286,1.286H15.171a1.288,1.288,0,0,0,1.286-1.286V8.229H1.543ZM16.457,6.686v-1.8A1.288,1.288,0,0,0,15.171,3.6H2.829A1.288,1.288,0,0,0,1.543,4.886v1.8Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Schedule</span>
            </a>
        @else
            <a class="sidebar__icon-wrapper" href="{{ route('student.schedule') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path id="Shape" d="M2.829,18A2.832,2.832,0,0,1,0,15.171V4.886A2.833,2.833,0,0,1,2.571,2.069V.771a.771.771,0,0,1,1.543,0V2.057H8.229V.771a.771.771,0,1,1,1.543,0V2.057h4.115V.771a.771.771,0,1,1,1.543,0v1.3A2.833,2.833,0,0,1,18,4.886V15.171A2.832,2.832,0,0,1,15.171,18ZM1.543,15.171a1.288,1.288,0,0,0,1.286,1.286H15.171a1.288,1.288,0,0,0,1.286-1.286V8.229H1.543ZM16.457,6.686v-1.8A1.288,1.288,0,0,0,15.171,3.6H2.829A1.288,1.288,0,0,0,1.543,4.886v1.8Z" fill="#172239"/>
            </svg>
        </span>
                <span class="sidebar__icon-txt">Schedule</span>
            </a>
        @endif
    </div>
</aside>
<div class="fixed-bg">
    <aside class="sidebar--fixed" id="fixedSidebar">
        <div class="scrollbar" id="fixedScrollbar">
            <div class="sidebar__top">
                <div class="navbar__hamburger-bttn-box" id="navbarHambugerBttn">
                    <img src="/assets/svgs/icons/Hamburger icon.svg" alt="Hamburger Icon" class="img-fluid">
                </div>
                <a href="/student" class="navbar__logo-link">
                    <span class="logo">
                        <span class="logo__box--s">
                            <img src="/assets/svgs/logo.svg" alt="Website's logo" class="img-fluid">
                        </span>
                        <p class="logo__txt--d logo__txt--s">Stud-e</p>
                        <span class="logo__circle logo__circle--s"></span>
                    </span>
                </a>
            </div>
            @if(Request::path() != 'teacher/classroom' && Request::path() != 'teacher/classroom/create')
                <a class="sidebar__bttn bttn" href="{{ route('teacher.create.classroom') }}">
            <span class="sidebar__bttn-icon">
                <img src="/assets/svgs/icons/sidebar/Add icon.svg" alt="Sidebar Button Icon" class="img-fluid">
            </span>
                    <span class="sidebar__bttn-txt">Create Classroom</span>
                </a>
                <div class="sidebar__line"></div>
            @endif

            @if(Request::path() == 'teacher')
                <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.home') }}">
                    <span class="sidebar__icon-box">
                        <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="19.041" viewBox="0 0 21 19.041">
                            <path id="Fill_1184" data-name="Fill 1184" d="M15.749,19.041H5.25a2.643,2.643,0,0,1-2.625-2.654V7.35l-1.235.908a.862.862,0,0,1-.514.169.876.876,0,0,1-.709-.364A.893.893,0,0,1,.36,6.827L8.955.508a2.6,2.6,0,0,1,3.089,0l8.595,6.319a.885.885,0,0,1-.515,1.6.86.86,0,0,1-.514-.169L18.374,7.35v9.038A2.643,2.643,0,0,1,15.749,19.041ZM9.625,9.312h1.75A2.642,2.642,0,0,1,14,11.965v5.308h1.75a.881.881,0,0,0,.875-.885V6.064l-5.61-4.126a.869.869,0,0,0-1.03,0L4.374,6.064V16.387a.881.881,0,0,0,.875.885H7V11.965A2.642,2.642,0,0,1,9.625,9.312Zm0,1.769a.881.881,0,0,0-.875.884v5.308h3.5V11.965a.881.881,0,0,0-.875-.884Z" fill="#172239"/>
                        </svg>
                    </span>
                    <span class="sidebar__icon-txt">Home</span>
                </a>
            @else
                <a class="sidebar__icon-wrapper" href="{{ route('teacher.home') }}">
                    <span class="sidebar__icon-box">
                        <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="19.041" viewBox="0 0 21 19.041">
                            <path id="Fill_1184" data-name="Fill 1184" d="M15.749,19.041H5.25a2.643,2.643,0,0,1-2.625-2.654V7.35l-1.235.908a.862.862,0,0,1-.514.169.876.876,0,0,1-.709-.364A.893.893,0,0,1,.36,6.827L8.955.508a2.6,2.6,0,0,1,3.089,0l8.595,6.319a.885.885,0,0,1-.515,1.6.86.86,0,0,1-.514-.169L18.374,7.35v9.038A2.643,2.643,0,0,1,15.749,19.041ZM9.625,9.312h1.75A2.642,2.642,0,0,1,14,11.965v5.308h1.75a.881.881,0,0,0,.875-.885V6.064l-5.61-4.126a.869.869,0,0,0-1.03,0L4.374,6.064V16.387a.881.881,0,0,0,.875.885H7V11.965A2.642,2.642,0,0,1,9.625,9.312Zm0,1.769a.881.881,0,0,0-.875.884v5.308h3.5V11.965a.881.881,0,0,0-.875-.884Z" fill="#172239"/>
                        </svg>
                    </span>
                    <span class="sidebar__icon-txt">Home</span>
                </a>
            @endif

            @if(Request::path() =='teacher/classroom' || Request::path() == 'teacher/classroom/create')
                <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('teacher.classroom') }}">
        <span class="sidebar__icon-stroke-box">
            <svg class="sidebar__icon-stroke" xmlns="http://www.w3.org/2000/svg" width="16.255" height="20.19" viewBox="0 0 16.255 20.19">
              <g id="Group_26" data-name="Group 26" transform="translate(0.75 -3.56)">
                <g id="Group_295" data-name="Group 295" transform="translate(0 4.31)">
                  <path id="Path_5" data-name="Path 5" d="M4.5,3.976V20.206a.984.984,0,0,0,.984.984H18.272a.984.984,0,0,0,.984-.984V6.435a.984.984,0,0,0-.984-.984H5.976a1.476,1.476,0,0,1,0-2.951H18.763" transform="translate(-4.5 -2.5)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_1" data-name="Line 1" y2="11" transform="translate(3.522 5.19)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_2" data-name="Line 2" x2="5.2" transform="translate(6.391 6.012)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_3" data-name="Line 3" x2="5.2" transform="translate(6.391 9.534)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                </g>
              </g>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Classes</span>
                </a>
            @else
                <a class="sidebar__icon-wrapper" href="{{ route('teacher.classroom') }}">
        <span class="sidebar__icon-stroke-box">
            <svg class="sidebar__icon-stroke" xmlns="http://www.w3.org/2000/svg" width="16.255" height="20.19" viewBox="0 0 16.255 20.19">
              <g id="Group_26" data-name="Group 26" transform="translate(0.75 -3.56)">
                <g id="Group_295" data-name="Group 295" transform="translate(0 4.31)">
                  <path id="Path_5" data-name="Path 5" d="M4.5,3.976V20.206a.984.984,0,0,0,.984.984H18.272a.984.984,0,0,0,.984-.984V6.435a.984.984,0,0,0-.984-.984H5.976a1.476,1.476,0,0,1,0-2.951H18.763" transform="translate(-4.5 -2.5)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_1" data-name="Line 1" y2="11" transform="translate(3.522 5.19)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_2" data-name="Line 2" x2="5.2" transform="translate(6.391 6.012)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  <line id="Line_3" data-name="Line 3" x2="5.2" transform="translate(6.391 9.534)" fill="none" stroke="#172239" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                </g>
              </g>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Classes</span>
                </a>
            @endif

            @if(Request::path() == 'student/task')
                <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.task') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
              <path id="Fill_1009" data-name="Fill 1009" d="M4.9,21H.947A.948.948,0,0,1,0,20.053V16.1a2.819,2.819,0,0,1,.833-2.009L14.094.832a2.841,2.841,0,0,1,4.018,0l2.058,2.057a2.846,2.846,0,0,1,0,4.019L6.908,20.167A2.829,2.829,0,0,1,4.9,21ZM12.314,5.29h0L2.172,15.432a.941.941,0,0,0-.278.67v3h3a.943.943,0,0,0,.671-.278L15.71,8.687l-3.4-3.4Zm3.789-3.4a.943.943,0,0,0-.67.277l-1.779,1.78,3.4,3.4,1.78-1.78a.95.95,0,0,0,0-1.338L16.772,2.171A.94.94,0,0,0,16.1,1.894Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Tasks</span>
                </a>
            @else
                <a class="sidebar__icon-wrapper" href="{{ route('student.task') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
              <path id="Fill_1009" data-name="Fill 1009" d="M4.9,21H.947A.948.948,0,0,1,0,20.053V16.1a2.819,2.819,0,0,1,.833-2.009L14.094.832a2.841,2.841,0,0,1,4.018,0l2.058,2.057a2.846,2.846,0,0,1,0,4.019L6.908,20.167A2.829,2.829,0,0,1,4.9,21ZM12.314,5.29h0L2.172,15.432a.941.941,0,0,0-.278.67v3h3a.943.943,0,0,0,.671-.278L15.71,8.687l-3.4-3.4Zm3.789-3.4a.943.943,0,0,0-.67.277l-1.779,1.78,3.4,3.4,1.78-1.78a.95.95,0,0,0,0-1.338L16.772,2.171A.94.94,0,0,0,16.1,1.894Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Tasks</span>
                </a>
            @endif

            @if(Request::path() == 'student/grade')
                <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.grade') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21.003" height="20.369" viewBox="0 0 21.003 20.369">
              <path id="Fill_1162" data-name="Fill 1162" d="M15.893,20.369a1.745,1.745,0,0,1-.824-.209L10.5,17.744,5.934,20.16a1.745,1.745,0,0,1-.824.209,1.772,1.772,0,0,1-1.355-.639,1.749,1.749,0,0,1-.387-1.437l.86-5.164L.53,9.457A1.751,1.751,0,0,1,.091,7.641a1.761,1.761,0,0,1,1.42-1.207l5.11-.766L8.915.992a1.765,1.765,0,0,1,3.173,0l2.293,4.676,5.111.766a1.78,1.78,0,0,1,.981,3.023l-3.7,3.672.86,5.164a1.749,1.749,0,0,1-.387,1.437A1.772,1.772,0,0,1,15.893,20.369ZM10.5,15.734h0l5.39,2.852L14.88,12.512l4.351-4.32-6.026-.9L10.5,1.777,7.8,7.289l-6.026.9,4.351,4.32L5.111,18.586l5.39-2.852Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Grades</span>
                </a>
            @else
                <a class="sidebar__icon-wrapper" href="{{ route('student.grade') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="21.003" height="20.369" viewBox="0 0 21.003 20.369">
              <path id="Fill_1162" data-name="Fill 1162" d="M15.893,20.369a1.745,1.745,0,0,1-.824-.209L10.5,17.744,5.934,20.16a1.745,1.745,0,0,1-.824.209,1.772,1.772,0,0,1-1.355-.639,1.749,1.749,0,0,1-.387-1.437l.86-5.164L.53,9.457A1.751,1.751,0,0,1,.091,7.641a1.761,1.761,0,0,1,1.42-1.207l5.11-.766L8.915.992a1.765,1.765,0,0,1,3.173,0l2.293,4.676,5.111.766a1.78,1.78,0,0,1,.981,3.023l-3.7,3.672.86,5.164a1.749,1.749,0,0,1-.387,1.437A1.772,1.772,0,0,1,15.893,20.369ZM10.5,15.734h0l5.39,2.852L14.88,12.512l4.351-4.32-6.026-.9L10.5,1.777,7.8,7.289l-6.026.9,4.351,4.32L5.111,18.586l5.39-2.852Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Grades</span>
                </a>
            @endif

            @if(Request::path() == 'student.schedule')
                <a class="sidebar__icon-wrapper sidebar--active" href="{{ route('student.schedule') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path id="Shape" d="M2.829,18A2.832,2.832,0,0,1,0,15.171V4.886A2.833,2.833,0,0,1,2.571,2.069V.771a.771.771,0,0,1,1.543,0V2.057H8.229V.771a.771.771,0,1,1,1.543,0V2.057h4.115V.771a.771.771,0,1,1,1.543,0v1.3A2.833,2.833,0,0,1,18,4.886V15.171A2.832,2.832,0,0,1,15.171,18ZM1.543,15.171a1.288,1.288,0,0,0,1.286,1.286H15.171a1.288,1.288,0,0,0,1.286-1.286V8.229H1.543ZM16.457,6.686v-1.8A1.288,1.288,0,0,0,15.171,3.6H2.829A1.288,1.288,0,0,0,1.543,4.886v1.8Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Schedule</span>
                </a>
            @else
                <a class="sidebar__icon-wrapper" href="{{ route('student.schedule') }}">
        <span class="sidebar__icon-box">
            <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path id="Shape" d="M2.829,18A2.832,2.832,0,0,1,0,15.171V4.886A2.833,2.833,0,0,1,2.571,2.069V.771a.771.771,0,0,1,1.543,0V2.057H8.229V.771a.771.771,0,1,1,1.543,0V2.057h4.115V.771a.771.771,0,1,1,1.543,0v1.3A2.833,2.833,0,0,1,18,4.886V15.171A2.832,2.832,0,0,1,15.171,18ZM1.543,15.171a1.288,1.288,0,0,0,1.286,1.286H15.171a1.288,1.288,0,0,0,1.286-1.286V8.229H1.543ZM16.457,6.686v-1.8A1.288,1.288,0,0,0,15.171,3.6H2.829A1.288,1.288,0,0,0,1.543,4.886v1.8Z" fill="#172239"/>
            </svg>
        </span>
                    <span class="sidebar__icon-txt">Schedule</span>
                </a>
            @endif


            <div class="sidebar__extra">
                <div class="sidebar__line"></div>
                <a class="sidebar__icon-wrapper" href="/profile">
                    <span class="sidebar__icon-box">
                        <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 18 18">
                          <path id="Shape" d="M0,9a9,9,0,1,1,9,9A9.01,9.01,0,0,1,0,9Zm9,7.616a7.585,7.585,0,0,0,5.091-1.956,4,4,0,0,0-1.313-.692c-.1-.038-.212-.075-.348-.121l-.356-.12c-1.288-.435-1.868-.786-2.117-1.608a1.745,1.745,0,0,1-.051-.206,2.195,2.195,0,0,1,.128-1.29,1.957,1.957,0,0,1,.544-.734,2.6,2.6,0,0,0,.962-2.119A2.615,2.615,0,0,0,9,5.077,2.587,2.587,0,0,0,6.461,7.77a2.624,2.624,0,0,0,.924,2.1,2.1,2.1,0,0,1,.526.642,2.047,2.047,0,0,1,.183,1.419,1.067,1.067,0,0,1-.041.157c-.218.81-.782,1.157-2.019,1.58l-.411.139c-.16.054-.285.1-.4.141a3.984,3.984,0,0,0-1.311.712A7.586,7.586,0,0,0,9,16.616ZM12.923,7.77a3.99,3.99,0,0,1-1.438,3.163.615.615,0,0,0-.179.235.857.857,0,0,0-.04.486.428.428,0,0,0,.012.051c.071.234.376.418,1.238.71l.355.118c.146.049.263.09.376.13a5.209,5.209,0,0,1,1.787.978,7.616,7.616,0,1,0-12.069,0,5.241,5.241,0,0,1,1.774-.993c.132-.049.268-.1.438-.154l.409-.138c.8-.273,1.081-.447,1.149-.689,0,.006,0-.005.006-.031a.709.709,0,0,0-.054-.48.835.835,0,0,0-.219-.25A4.012,4.012,0,0,1,5.077,7.77,3.969,3.969,0,0,1,9,3.693,4,4,0,0,1,12.923,7.77Z" fill="#172239"/>
                        </svg>
                    </span>
                    <span class="sidebar__icon-txt">Profile</span>
                </a>
                <a class="sidebar__icon-wrapper" href="/logout">
                    <span class="sidebar__icon-box">
                        <svg class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" width="16.971" height="18" viewBox="0 0 16.971 18">
                          <path id="Shape" d="M2.829,16.971A2.763,2.763,0,0,1,0,14.274V5.315a.732.732,0,0,1,.771-.686.732.732,0,0,1,.771.686v8.959A1.309,1.309,0,0,0,2.829,15.6H15.171a1.309,1.309,0,0,0,1.286-1.326V5.315a.777.777,0,0,1,1.543,0v8.959a2.763,2.763,0,0,1-2.829,2.7Zm5.348-6.634v-7.7l-2.8,2.8A.772.772,0,1,1,4.289,4.34L8.4.226a.772.772,0,0,1,1.092,0L13.608,4.34a.772.772,0,1,1-1.091,1.092l-2.8-2.8v7.7c0,.256-.346.463-.771.463S8.177,10.593,8.177,10.337Z" transform="translate(0 18) rotate(-90)" fill="#172239"/>
                        </svg>
                    </span>
                    <span class="sidebar__icon-txt">Logout</span>
                </a>
            </div>
        </div>
    </aside>
</div>
