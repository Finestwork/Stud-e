<nav class="navbar">
    <div class="container--main">
        <div class="navbar__inner">
            <div class="navbar--left">
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
            <div class="navbar--mid">
                <div class="navbar--mid__form-wrapper">
                    <form action="" method="POST" class="form--search">
                        @csrf
                        <input type="text" class="form--search__input" name="searchTxt" id="searchTxt" placeholder="Search something here...">
                        <button type="submit" class="form--search__bttn bttn">
                            <span class="form--search__bttn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40.792 40.827">
                                  <g id="Group_458" data-name="Group 458" transform="translate(-1512.201 -174.259)">
                                    <path id="Path_3987" data-name="Path 3987" d="M12.654,12.758,0,0" transform="translate(1537.511 199.5)" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-width="4"/>
                                    <path id="Path_223" data-name="Path 223" d="M1541.474,189.9a13.636,13.636,0,1,1-13.636-13.636A13.637,13.637,0,0,1,1541.474,189.9Z" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                  </g>
                            </svg>
                        </span>
                        </button>
                    </form>
                </div>
                <button type="button" class="form--search__bttn-toggle navbar__toggle-bttn bttn" id="formSearchToggleBttn">
                        <span class="form--search__bttn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40.792 40.827">
                                  <g id="Group_458" data-name="Group 458" transform="translate(-1512.201 -174.259)">
                                    <path id="Path_3987" data-name="Path 3987" d="M12.654,12.758,0,0" transform="translate(1537.511 199.5)" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-width="4"/>
                                    <path id="Path_223" data-name="Path 223" d="M1541.474,189.9a13.636,13.636,0,1,1-13.636-13.636A13.637,13.637,0,0,1,1541.474,189.9Z" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                  </g>
                            </svg>
                        </span>
                </button>
            </div>
            <div class="navbar--right">
                <div class="navbar__icon-box" id="mssgBox">
                    <div class="navbar__mssg-icon">
                        <img src="/assets/svgs/icons/Message icon.svg" alt="Message Icon" class="img-fluid">
                    </div>
                    <span class="navbar__icon-ctr">9+</span>
                    <div class="navbar__mssg-item-wrapper" id="mssgItemWrapper">
                        <div class="navbar__mssg-wrapper" id="mssgItemScrollbar">
                            <div class="scrollbar navbar__mssg-scrollbar">
                                <div class="navbar__mssg--top">
                                    <p class="navbar__mssg-title">Messages</p>
                                    <div class="navbar__mssg-search-box">
                                        <form action="" method="POST" class="form--search">
                                            @csrf
                                            <input type="text" class="form--search__input" name="searchMssgTxt" id="searchMssgTxt" placeholder="Search the name here">
                                            <button type="submit" class="form--search__bttn bttn">
                            <span class="form--search__bttn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 40.792 40.827">
                                  <g id="Group_458" data-name="Group 458" transform="translate(-1512.201 -174.259)">
                                    <path id="Path_3987" data-name="Path 3987" d="M12.654,12.758,0,0" transform="translate(1537.511 199.5)" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-width="4"/>
                                    <path id="Path_223" data-name="Path 223" d="M1541.474,189.9a13.636,13.636,0,1,1-13.636-13.636A13.637,13.637,0,0,1,1541.474,189.9Z" fill="none" stroke="#6c7a89" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                  </g>
                            </svg>
                        </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- WILL POPULATE THIS NOTIFICATION WITH REAL DATA -->
                                <ul class="navbar__msg-item-container">
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link mssg-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link mssg-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link mssg-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__mssg-item">
                                        <a href="#" class="navbar__mssg-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__mssg-user-img">
                                                <span class="navbar__mssg-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__mssg-description">
                                                <span class="navbar__mssg-info navbar__notif-span">John Doe</span>
                                                <span class="navbar__mssg-info">Where do you want to study?</span>
                                                <span class="navbar__mssg-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="/message" class="bttn navbar__view-all">View all message</a>
                    </div>
                </div>
                <div class="navbar__icon-box" id="notifBox">
                    <div class="navbar__notif-icon">
                       <img src="/assets/svgs/icons/Notification icon.svg" alt="Notification Icon" class="img-fluid">
                    </div>
                    <span class="navbar__icon-ctr">9+</span>
                    <div class="navbar__notif-item-wrapper" id="notifItemWrapper">
                        <div class="navbar__notif-wrapper" id="notifItemScrollbar">
                            <div class="scrollbar navbar__scrollbar">
                                <div class="navbar__notif--top">
                                    <p class="navbar__notif-title">Notifcation</p>
                                    <div class="navbar__notif-option-box">
                                        <span class="navbar__notif-option-item notif--active">All</span>
                                        <span class="navbar__notif-option-item">Unread</span>
                                        <span class="navbar__notif-option-item">Read</span>
                                    </div>
                                </div>
                                <!-- WILL POPULATE THIS NOTIFICATION WITH REAL DATA -->
                                <ul class="navbar__notif-item-container">
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link notif-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-grade">
                                                <span class="navbar__notif-image-wrapper ">
                                                    <img src="/assets/svgs/icons/notif/Graded icon.svg" alt="Icon for successfully graded task" class="img-fluid">
                                                </span>
                                        </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your task in <span class="navbar__notif-span">Philosophy of man</span> has been graded</span>
                                        <span class="navbar__notif-date">3 days ago</span>
                                    </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link notif-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-approved-request">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Succesfully enrolled icon.svg" alt="Icon for successfully graded task" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">You have been removed from your subject <span class="navbar__notif-span">Philisophy of man</span> have been approved by your teacher.</span>
                                        <span class="navbar__notif-date">4 days ago</span>
                                    </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-approved-request">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Succesfully enrolled icon.svg" alt="Icon for successfully graded task" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your request to enroll in <span class="navbar__notif-span">Philisophy of man</span>.</span>
                                                <span class="navbar__notif-date">4 days ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-approved-request">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Succesfully enrolled icon.svg" alt="Icon for successfully graded task" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">There's a newly uploaded module in <span class="navbar__notif-span">Philisophy of man</span>. Check it out!</span>
                                                <span class="navbar__notif-date">4 days ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link notif-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-disccusion">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Discussion icon.svg" alt="Icon for successfully graded task" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">There's a new discussion in your subject <span class="navbar__notif-span">Computer Programming 3</span>.</span>
                                                <span class="navbar__notif-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <!-- IMAGE -->
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link notif-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-user-img">
                                                <span class="navbar__notif-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/classmate.jpg" alt="Profile picture of the user" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your classmate replied to the discussion in <span class="navbar__notif-span">Computer Programming 3</span>.</span>
                                                <span class="navbar__notif-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link notif-unread">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-user-img">
                                                <span class="navbar__notif-user-img-wrapper">
                                                    <img src="/assets/imgs/test images/professor.jpg" alt="Profile picture of your teacher" class="adjust-img-js">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your <span class="navbar__notif-span">teacher</span> replied to the discussion in <span class="navbar__notif-span">Computer Programming 3</span>.</span>
                                                <span class="navbar__notif-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <!-- ICONS AGAIN -->
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-reviewer">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Reviewer icon.svg" alt="Icon for edited reviewer" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your reviewer has been edited by <span class="navbar__notif-span">Johanna Jones</span></span>
                                                <span class="navbar__notif-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar__notif-item">
                                        <a href="#" class="navbar__notif-item-link">
                                            <!-- LOGIC HERE WHAT TYPE OF TASK IS IT? task-grade = affects color -->
                                            <span class="navbar__notif-illustration notif-schedule">
                                                <span class="navbar__notif-image-wrapper">
                                                    <img src="/assets/svgs/icons/notif/Change in schedule icon.svg" alt="Icon for edited reviewer" class="img-fluid">
                                                </span>
                                            </span>
                                            <span class="navbar__notif-description">
                                                <span class="navbar__notif-info">Your subject <span class="navbar__notif-span">Computer Programming 3</span> has changed its schedule, click here for more info.</span>
                                                <span class="navbar__notif-date">1 week ago</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="/notification" class="bttn navbar__view-all">View all notification</a>
                    </div>
                </div>
                <div class="navbar__profile-box" id="profileBox">
                    <span class="navbar__profile-box__name">{{ ucfirst($user->f_name) . ' ' . ucfirst($user->l_name) }}</span>
                    <div class="navbar__profile-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.5 9.5">
                            <path id="Path" d="M.321,15.552a1.175,1.175,0,0,0,0,1.614,1.066,1.066,0,0,0,1.55,0L9.179,9.557a1.175,1.175,0,0,0,0-1.614L1.871.334a1.066,1.066,0,0,0-1.55,0,1.175,1.175,0,0,0,0,1.614l6.533,6.8Z" transform="translate(17.5) rotate(90)" fill="#0D0417"/>
                        </svg>
                    </div>
                    <div class="navbar__profile-dropdown">
                        <a class="navbar__profile-link" href="/profile">
                            <span class="navbar__profile-icon-box">
                                <svg class="navbar__profile-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                  <path id="Shape" d="M0,9a9,9,0,1,1,9,9A9.01,9.01,0,0,1,0,9Zm9,7.616a7.585,7.585,0,0,0,5.091-1.956,4,4,0,0,0-1.313-.692c-.1-.038-.212-.075-.348-.121l-.356-.12c-1.288-.435-1.868-.786-2.117-1.608a1.745,1.745,0,0,1-.051-.206,2.195,2.195,0,0,1,.128-1.29,1.957,1.957,0,0,1,.544-.734,2.6,2.6,0,0,0,.962-2.119A2.615,2.615,0,0,0,9,5.077,2.587,2.587,0,0,0,6.461,7.77a2.624,2.624,0,0,0,.924,2.1,2.1,2.1,0,0,1,.526.642,2.047,2.047,0,0,1,.183,1.419,1.067,1.067,0,0,1-.041.157c-.218.81-.782,1.157-2.019,1.58l-.411.139c-.16.054-.285.1-.4.141a3.984,3.984,0,0,0-1.311.712A7.586,7.586,0,0,0,9,16.616ZM12.923,7.77a3.99,3.99,0,0,1-1.438,3.163.615.615,0,0,0-.179.235.857.857,0,0,0-.04.486.428.428,0,0,0,.012.051c.071.234.376.418,1.238.71l.355.118c.146.049.263.09.376.13a5.209,5.209,0,0,1,1.787.978,7.616,7.616,0,1,0-12.069,0,5.241,5.241,0,0,1,1.774-.993c.132-.049.268-.1.438-.154l.409-.138c.8-.273,1.081-.447,1.149-.689,0,.006,0-.005.006-.031a.709.709,0,0,0-.054-.48.835.835,0,0,0-.219-.25A4.012,4.012,0,0,1,5.077,7.77,3.969,3.969,0,0,1,9,3.693,4,4,0,0,1,12.923,7.77Z" fill="#172239"/>
                                </svg>
                            </span>
                            <span class="navbar__icon-txt">Profile</span>
                        </a>
                        <a class="navbar__profile-link" href="/logout">
                            <span class="navbar__profile-icon-box">
                                <svg class="navbar__profile-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.971 18">
                                  <path id="Shape" d="M2.829,16.971A2.763,2.763,0,0,1,0,14.274V5.315a.732.732,0,0,1,.771-.686.732.732,0,0,1,.771.686v8.959A1.309,1.309,0,0,0,2.829,15.6H15.171a1.309,1.309,0,0,0,1.286-1.326V5.315a.777.777,0,0,1,1.543,0v8.959a2.763,2.763,0,0,1-2.829,2.7Zm5.348-6.634v-7.7l-2.8,2.8A.772.772,0,1,1,4.289,4.34L8.4.226a.772.772,0,0,1,1.092,0L13.608,4.34a.772.772,0,1,1-1.091,1.092l-2.8-2.8v7.7c0,.256-.346.463-.771.463S8.177,10.593,8.177,10.337Z" transform="translate(0 18) rotate(-90)" fill="#172239"/>
                                </svg>
                            </span>
                            <span class="navbar__icon-txt">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
