@extends('partials.base')

@section('title') Step 1 - Choose your account @endsection

@section('cs-css')
    <link rel="stylesheet" href="/css/signup.style.css">
@endsection
@section('cs-js')
    <script src="/assets/js/libraries/smooth-scroll.polyfills.js"></script>
    <script src="/assets/js/helpers/string-checker.js"></script>
@endsection
@section('body-content')
    <div class="navbar__logo-only">
        <div class="navbar__inner">
            <div class="navbar__logo-box">
                <img src="/assets/svgs/logo.svg" alt="Website's logo" class="img-fluid">
            </div>
            <p class="navbar__logo-txt">Stud-e</p>
            <div class="navbar__logo-circle"></div>
        </div>
    </div>
    <div class="steps">
        <div class="steps__item-wrapper steps--active">
            <p class="steps__number">1</p>
            <span class="steps__message--t">Choosing your account</span>
        </div>
        <div class="steps__line"></div>
        <div class="steps__item-wrapper">
            <p class="steps__number">2</p>
            <span class="steps__message--b">Verify your email</span>
        </div>
        <div class="steps__line"></div>
        <div class="steps__item-wrapper">
            <p class="steps__number">3</p>
            <span class="steps__message--t">Subscription</span>
        </div>
    </div>
    <div class="wrapper__sign-up">
        <a href="/signin" class="link--back"><span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15.5" height="9.5" viewBox="0 0 15.5 9.5">
  <path id="Shape" d="M4.22,9.28l-4-4L.207,5.267.2,5.261.194,5.254.187,5.246.182,5.24.174,5.231l0,0-.008-.01,0,0L.151,5.2l0,0L.14,5.186l0,0L.13,5.172l0,0L.12,5.157l0-.006L.111,5.142l0-.007,0-.008L.1,5.118l0-.006L.087,5.1l0,0A.751.751,0,0,1,.235,4.2L4.22.22A.75.75,0,0,1,5.28,1.281L2.561,4H14.75a.75.75,0,0,1,0,1.5H2.561L5.28,8.22A.75.75,0,1,1,4.22,9.28Z"/>
</svg>
</span>Go back</a>
        <div class="sign-up__page-1">
            @include('partials.flash message.error')
            <h1 class="heading--sign-up">Choose an account</h1>
            <div class="card--choice">
                <div class="card__item" id="cardBttn1">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Admin.svg" alt="Admin Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title onboarding-signup__card-title">Admin Account</h2>
                        <p class="card--choice__txt">Sign-up for your company or your team and get classrooms for your teachers/instructors.Be the best you and your team can be.</p>
                    </div>

                </div>
                <div class="card__item" id="cardBttn2">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Teachers.svg" alt="Teacher Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title">Teacher Account</h2>
                        <p class="card--choice__txt">If you are independent, feel free to sign-up as a teacher and set up your class,if you are not independet, and you haved a code from your admin or your HR, higher ups or jedi master, feel free choose this.</p>
                    </div>
                </div>
                <div class="card__item" id="cardBttn3">
                    <div class="card--choice__illustration">
                        <img src="/assets/illustration/signup/Student.svg" alt="Student Account Card Illustration" class="img-fluid">
                    </div>
                    <div class="card--choice__description">
                        <h2 class="card--choice__title">Student Account</h2>
                        <p class="card--choice__txt">If you need a virtual organizer, to set up your reviewers and classes, or join an existing class, feel free to choose this.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form--primary__main-container">
        <!-- ADMIN -->
        <div class="form--hidden form--slide-1">
            <h2 class="form--primary__title">Admin Account</h2>
            <form action="/signup" method="POST" class="form--primary">
                @csrf
                <div class="form--primary__2-col">
                    <div class="form--primary__lrg--left">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminFnameTxt" class="form--primary__n-lbl">Enter your first name: </label>
                            <input type="text" id="adminFnameTxt" placeholder="Place your first name here" name="adminFnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminMnameTxt" class="form--primary__n-lbl">Enter your middle name: </label>
                            <input type="text" id="adminMnameTxt" placeholder="Place your middle name here" name="adminMnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminLnameTxt" class="form--primary__n-lbl">Enter your last name: </label>
                            <input type="text" id="adminLnameTxt" placeholder="Place your last name here" name="adminLnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                    </div>
                    <div class="form--primary__lrg--right">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminEmailTxt" class="form--primary__n-lbl">Enter your email: </label>
                            <input type="email" id="adminEmailTxt" placeholder="Place your email" name="adminEmailTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-email">• Make sure that it is in the correct format (ex. Juan@example.com )</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminPasswordTxt" class="form--primary__n-lbl">Enter your password: </label>
                            <input type="password" id="adminPasswordTxt" placeholder="Place your password" name="adminPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminConfirmPasswordTxt" class="form--primary__n-lbl">Confirm your password: </label>
                            <input type="password" id="adminConfirmPasswordTxt" placeholder="Confirm your password" name="adminConfirmPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                        <div class="form--primary__group mb-5">
                            <span class="form--primary__note--required">Required</span>
                            <label for="adminCodeTxt" class="form--primary__n-lbl">Initial Admin Code: </label>
                            <input type="text" id="adminCodeTxt" placeholder="Place your admin code" name="adminCodeTxt" autocomplete="off">
                            <button class="bttn form--primary__sub-bttn--r" type="button">Generate admin code</button>
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-code">• Code should be 6 characters long.</p>
                        </div>
                    </div>
                </div>
                <button class="form--primary__choice-bttn bttn" type="button" id="adminSubmitBttn">Submit</button>
            </form>
        </div>
        <!-- TEACHER -->
        <div class="form--hidden form--slide-2">
            <h2 class="form--primary__title">Teacher Account</h2>
            <form action="/signup/teacher" method="POST" id="formTeacher" class="form--primary">
                @csrf
                <div class="form--primary__2-col">
                    <div class="form--primary__lrg--left">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherFnameTxt" class="form--primary__n-lbl">Enter your first name: </label>
                            <input type="text" id="teacherFnameTxt" placeholder="Place your first name here" name="teacherFnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherMnameTxt" class="form--primary__n-lbl">Enter your middle name: </label>
                            <input type="text" id="teacherMnameTxt" placeholder="Place your middle name here" name="teacherMnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherLnameTxt" class="form--primary__n-lbl">Enter your last name: </label>
                            <input type="text" id="teacherLnameTxt" placeholder="Place your last name here" name="teacherLnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                    </div>
                    <div class="form--primary__lrg--right">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherEmailTxt" class="form--primary__n-lbl">Enter your email: </label>
                            <input type="email" id="teacherEmailTxt" placeholder="Enter your email" name="teacherEmailTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-email">• Make sure that it is in the correct format (ex. Juan@example.com )</p>
                            <p class="form--primary__note--error js-field-email-taken">• Your email has already been taken.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherPasswordTxt" class="form--primary__n-lbl">Enter your password: </label>
                            <input type="password" id="teacherPasswordTxt" placeholder="Enter your password" name="teacherPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="teacherConfirmPasswordTxt" class="form--primary__n-lbl">Confirm your password: </label>
                            <input type="password" id="teacherConfirmPasswordTxt" placeholder="Confirm your password" name="teacherConfirmPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                    </div>
                </div>
                <button class="form--primary__choice-bttn bttn" type="button" id="teacherSubmitBttn">Submit</button>
            </form>
        </div>
        <!-- STUDENT -->
        <div class="form--hidden form--slide-3">
            <h2 class="form--primary__title">Student Account</h2>
            <form action="/signup/student" method="POST" class="form--primary">
                @csrf
                <div class="form--primary__2-col">
                    <div class="form--primary__lrg--left">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studFnameTxt" class="form--primary__n-lbl">Enter your first name: </label>
                            <input type="text" id="studFnameTxt" placeholder="Place your first name here" name="studFnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studMnameTxt" class="form--primary__n-lbl">Enter your middle name: </label>
                            <input type="text" id="studMnameTxt" placeholder="Place your middle name here" name="studMnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studLnameTxt" class="form--primary__n-lbl">Enter your last name: </label>
                            <input type="text" id="studLnameTxt" placeholder="Place your last name here" name="studLnameTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-no-num">• Make sure that this field does not contain any special characters or numbers.</p>
                        </div>
                    </div>
                    <div class="form--primary__lrg--right">
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studentEmailTxt" class="form--primary__n-lbl">Enter your email: </label>
                            <input type="email" id="studentEmailTxt" placeholder="Enter your email" name="studentEmailTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-email-taken">• Your email has already been taken.</p>
                            <p class="form--primary__note--error js-field-email">• Make sure that it is in the correct format (ex. Juan@example.com )</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studentPasswordTxt" class="form--primary__n-lbl">Enter your password: </label>
                            <input type="password" id="studentPasswordTxt" placeholder="Enter your password" name="studentPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                        <div class="form--primary__group">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studentConfirmPasswordTxt" class="form--primary__n-lbl">Confirm your password: </label>
                            <input type="password" id="studentConfirmPasswordTxt" placeholder="Confirm your password" name="studentConfirmPasswordTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-password-length">• Your password should be more than 8 characters.</p>
                            <p class="form--primary__note--error_c js-password-not-match">• Password Does not Match</p>
                        </div>
                        <div class="form--primary__group mb-3">
                            <span class="form--primary__note--required">Required</span>
                            <label for="studentClassCodeTxt" class="form--primary__n-lbl">Class Code: </label>
                            <input type="text" id="studentClassCodeTxt" placeholder="Enter your class code" name="studentClassCodeTxt" autocomplete="off">
                            <p class="form--primary__note--error js-field-blank">• This field should not be empty.</p>
                            <p class="form--primary__note--error js-field-code">• Code should be 6 characters long.</p>
                            <span class="form--primary__note--tip">Note: You can get your class code from your teacher.</span>
                        </div>
                    </div>
                </div>
                <button class="form--primary__choice-bttn bttn" type="button" id="studentSubmitBttn">Submit</button>
            </form>
        </div>
    </div>
    <div class="wrapper__sign-up">
        <div class="line--one-h line"></div>
        <p class="learn-more__txt wrapper__sign-up__learn-more-txt">Not sure which account you want? <a href="#" class="learn-more__link">Click here!</a></p>
    </div>
    @include('partials.validation.y-n')
@endsection

@section('script')
    <script src="/assets/js/modules/signup.app.js"></script>
@endsection
