let cardBttn1 = document.getElementById('cardBttn1'),
    cardBttn2 = document.getElementById('cardBttn2'),
    cardBttn3 = document.getElementById('cardBttn3');

let formSlide1 = document.querySelector('.form--slide-1'),
    formSlide2 = document.querySelector('.form--slide-2'),
    formSlide3 = document.querySelector('.form--slide-3');

//BUTTONS
let adminSubmitBttn = document.getElementById('adminSubmitBttn'),
    teacherSubmitBttn = document.getElementById('teacherSubmitBttn'),
    studentSubmitBttn = document.getElementById('studentSubmitBttn');

//FIELDS
let adminFnameTxt = document.getElementById('adminFnameTxt'),
    adminMnameTxt = document.getElementById('adminMnameTxt'),
    adminLnameTxt = document.getElementById('adminLnameTxt'),
    adminEmailTxt = document.getElementById('adminEmailTxt'),
    adminPasswordTxt = document.getElementById('adminPasswordTxt'),
    adminConfirmPasswordTxt = document.getElementById('adminConfirmPasswordTxt'),
    adminCodeTxt = document.getElementById('adminCodeTxt');

let teacherFnameTxt = document.getElementById('teacherFnameTxt'),
    teacherMnameTxt = document.getElementById('teacherMnameTxt'),
    teacherLnameTxt = document.getElementById('teacherLnameTxt'),
    teacherEmailTxt = document.getElementById('teacherEmailTxt'),
    teacherPasswordTxt = document.getElementById('teacherPasswordTxt'),
    teacherConfirmPasswordTxt = document.getElementById('teacherConfirmPasswordTxt');

let studentFnameTxt = document.getElementById('studFnameTxt'),
    studentMnameTxt = document.getElementById('studMnameTxt'),
    studentLnameTxt = document.getElementById('studLnameTxt'),
    studentEmailTxt = document.getElementById('studentEmailTxt'),
    studentPasswordTxt = document.getElementById('studentPasswordTxt'),
    studentConfirmPasswordTxt = document.getElementById('studentConfirmPasswordTxt'),
    studentClassCodeTxt = document.getElementById('studentClassCodeTxt');

let pastAdminFnameValue = null, pastAdminMnameValue = null,
    pastAdminLnameValue = null, pastAdminEmailValue = null,
    pastAdminPWValue = null, pastAdminConPWValue = null, pastAdminCodeValue = null;

let pastTeacherFnameValue = null, pastTeacherMnameValue = null,
    pastTeacherLnameValue = null, pastTeacherEmailValue = null,
    pastTeacherPWValue = null, pastTeacherConPWValue = null;

let pastStudentFnameValue = null, pastStudentMnameValue = null,
    pastStudentLnameValue = null, pastStudentEmailValue = null,
    pastStudentPWValue = null, pastStudentConPWValue = null, pastStudentClassValue = null;

let popYBttn = document.getElementById('popYBttn'),
    popNBttn = document.getElementById('popNBttn');


//CLICK EVENTS
cardBttn1.addEventListener('click', function(){
    if(!checkIfAllTeacherFieldsAreEmpty() || !checkIfAllStudentFieldsAreEmpty()){
        if(confirm("Are you sure want to change your account type?")){
            resetTeacherFields();
            resetStudentFields();
            showAdminAccount();
        }
    }else{
        showAdminAccount();
    }
});
cardBttn2.addEventListener('click', function(){
    if(!checkIfAllAdminFieldsAreEmpty() || !checkIfAllStudentFieldsAreEmpty()){
        if(confirm("Are you sure want to change your account type?")){
            resetAdminFields();
            resetStudentFields();
            showTeacherAccount();
        }
    }else{
        showTeacherAccount();
    }

});
cardBttn3.addEventListener('click', function(){
    if(!checkIfAllTeacherFieldsAreEmpty() || !checkIfAllAdminFieldsAreEmpty()){
        if(confirm("Are you sure want to change your account type?")){
            resetAdminFields();
            resetTeacherFields();
            showStudentAccount();
        }
    }else{
        showStudentAccount();
    }
});
adminSubmitBttn.addEventListener('click', checkIfAdminFieldIsValid);
teacherSubmitBttn.addEventListener('click', checkIfTeacherFieldIsValid);
studentSubmitBttn.addEventListener('click', checkIfStudentFieldIsValid);
popYBttn.addEventListener('click', popYFunction);
popNBttn.addEventListener('click', popNFunction);


//KEY EVENTS
//ADMIN
adminFnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastAdminFnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
adminFnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
adminMnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastAdminMnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
adminMnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
adminLnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastAdminLnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
adminLnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }

});
adminEmailTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(isStringEqual(pastAdminEmailValue, txtVal) && !doesFieldContainsValidEmail(this.value)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
adminPasswordTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(isStringEqual(pastAdminPWValue, txtVal) && isPasswordTheSame(this, adminConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(adminConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(adminConfirmPasswordTxt, 'form-error');
    }
});
adminConfirmPasswordTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(isStringEqual(pastAdminConPWValue, txtVal) && isPasswordTheSame(this, adminPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(adminPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(adminPasswordTxt, 'form-error');
    }
});
adminCodeTxt.addEventListener('keyup', function(e){
    if(isCodeValid(adminCodeTxt)) {
        removeClass(adminCodeTxt, 'form-error');
    }else{
        addClass(adminCodeTxt, 'form-error');
    }
});

//ON BLUR
adminFnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
adminMnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
adminLnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
adminEmailTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(doesFieldContainsValidEmail(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
adminPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, adminConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(adminConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(adminConfirmPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
adminConfirmPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, adminPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(adminPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(adminPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
adminCodeTxt.onblur = function() {
    if(isCodeValid(adminCodeTxt)) {
        removeClass(adminCodeTxt, 'form-error');
    }else{
        addClass(adminCodeTxt, 'form-error');
    }
}

//TEACHER
teacherFnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastTeacherFnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
teacherFnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
teacherMnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastTeacherMnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
teacherMnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
teacherLnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastTeacherLnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
teacherLnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
teacherEmailTxt.addEventListener('keyup', function(e){
    if(isStringEqual(pastTeacherEmailValue, this) && !doesFieldContainsValidEmail(this.value)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
teacherEmailTxt.addEventListener('keydown', function(e){
    if(isStringEqual(pastTeacherEmailValue, this) && !doesFieldContainsValidEmail(this.value)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
teacherPasswordTxt.addEventListener('keyup', function(e){
    if(isStringEqual(pastTeacherPWValue, this) && isPasswordTheSame(this, teacherConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(teacherConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(teacherConfirmPasswordTxt, 'form-error');
    }
});
teacherConfirmPasswordTxt.addEventListener('keyup', function(e){
    if(isStringEqual(pastTeacherConPWValue, this) && isPasswordTheSame(this, teacherPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(teacherPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(teacherPasswordTxt, 'form-error');
    }
});
//ON BLUR
teacherFnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
teacherMnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
teacherLnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
teacherEmailTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(doesFieldContainsValidEmail(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
    fetchEmail(this);
}
teacherPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, teacherConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(teacherConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(teacherConfirmPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
teacherConfirmPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, teacherPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(teacherPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(teacherPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}

//Student
studentFnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastStudentFnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
studentFnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
studentMnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(pastStudentMnameValue, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
studentMnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }
});
studentLnameTxt.addEventListener('keyup', function(e){
    if(!stringContainsNumber(this.value)){
        if(isStringEqual(studentLnameTxt, this.value)
            && isFieldBlank(this)
            && doesFieldContainsNumber(this)){
            addClass(this, 'form-error');
        }else{
            removeClass(this,'form-error')
        }
    }else{
        this.value = removeNumbers(this.value);
    }
});
studentLnameTxt.addEventListener('keydown', function(){
    if(stringContainsNumber(this.value)){
        this.value = removeNumbers(this.value);
    }

});
studentEmailTxt.addEventListener('keyup', function(e){
    if(isStringEqual(studentEmailTxt, this.value) && !doesFieldContainsValidEmail(this.value)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
studentPasswordTxt.addEventListener('keyup', function(e){
    if(isStringEqual(pastStudentPWValue, this.value) && isPasswordTheSame(this, studentConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(studentConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(studentConfirmPasswordTxt, 'form-error');
    }
});
adminConfirmPasswordTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(isStringEqual(pastStudentConPWValue, txtVal) && isPasswordTheSame(this, studentPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(studentPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(studentPasswordTxt, 'form-error');
    }
});
studentClassCodeTxt.addEventListener('keyup', function(e){
    if(isCodeValid(this)) {
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});

//ON BLUR
studentFnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
studentMnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
studentLnameTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(!doesFieldContainsNumber(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
}
studentEmailTxt.onblur = function(){
    if(isFieldBlank(this)){
        addClass(this, 'form-error');
    }else{
        removeClass(this, 'form-error');
    }
    if(doesFieldContainsValidEmail(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
    fetchEmail(this);
}
studentPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, studentConfirmPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(studentConfirmPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(studentConfirmPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
studentConfirmPasswordTxt.onblur = function(){
    if(isPasswordTheSame(this, studentPasswordTxt)){
        removeClass(this, 'form-error');
        removeClass(studentPasswordTxt, 'form-error');
    }else{
        addClass(this, 'form-error');
        addClass(studentPasswordTxt, 'form-error');
    }
    if(confirmPasswordLength(this)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}
studentClassCodeTxt.onblur = function() {
    if(isCodeValid(this)) {
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
}

window.onbeforeunload = function(){
    if(!checkIfAllAdminFieldsAreEmpty() || !checkIfAllTeacherFieldsAreEmpty() || !checkIfAllStudentFieldsAreEmpty()){
        return 'true';
    }
}


//FUNCTIONS
function checkIfAdminFieldIsValid(){
    let isFNameEmpty, isMNameEmpty, isLNameEmpty, isEmailEmpty, isPasswordEmpty, isCodeEmpty;
    if(!doesFieldContainsNumber(adminFnameTxt)){
        addClass(adminFnameTxt, 'form-error');
        isFNameEmpty = true;
    }else{
        isFNameEmpty = false;
    }
    if(!doesFieldContainsNumber(adminMnameTxt)){
        addClass(adminMnameTxt, 'form-error');
        isMNameEmpty = true;
    }else{
        isMNameEmpty = false;
    }
    if(!doesFieldContainsNumber(adminLnameTxt)){
        addClass(adminLnameTxt, 'form-error');
        isLNameEmpty = true;
    }else{
        isLNameEmpty = false;
    }
    if(!doesFieldContainsValidEmail(adminEmailTxt)){
        addClass(adminEmailTxt, 'form-error');
        isEmailEmpty = true;
    }else{
        isEmailEmpty = false;
    }
    if(!isPasswordTheSame(adminPasswordTxt, adminConfirmPasswordTxt)
        || !confirmPasswordLength(adminPasswordTxt) || !confirmPasswordLength(adminConfirmPasswordTxt)){
        addClass(adminPasswordTxt, 'form-error');
        addClass(adminConfirmPasswordTxt, 'form-error');
        isPasswordEmpty = true;
    }else{
        isPasswordEmpty = false;
    }
    if(!isCodeValid(adminCodeTxt)){
        addClass(adminCodeTxt, 'form-error');
        isCodeEmpty = true;
    }else{
        isCodeEmpty = false;
    }

    if(!isFNameEmpty && !isMNameEmpty && !isLNameEmpty && !isEmailEmpty
        && !isPasswordEmpty && !isCodeEmpty){
        //Fields are okay
    }else{
        //GET POSSIBLE FAULTY VALUES
        pastAdminFnameValue = adminFnameTxt.value;
        pastAdminMnameValue = adminMnameTxt.value;
        pastAdminLnameValue = adminLnameTxt.value;
        pastAdminEmailValue = adminEmailTxt.value;
        pastAdminPWValue = adminPasswordTxt.value;
        pastAdminConPWValue = adminConfirmPasswordTxt.value;
        pastAdminCodeValue = adminCodeTxt.value;
    }
}
function checkIfTeacherFieldIsValid(){
    let isFNameEmpty, isMNameEmpty, isLNameEmpty,isEmailEmpty,
        isPasswordEmpty;
    if(!doesFieldContainsNumber(teacherFnameTxt)){
        addClass(teacherFnameTxt, 'form-error');
        isFNameEmpty = true;
    }else{
        isFNameEmpty = false;
    }
    if(!doesFieldContainsNumber(teacherMnameTxt)){
        addClass(teacherMnameTxt, 'form-error');
        isMNameEmpty = true;
    }else{
        isMNameEmpty = false;
    }
    if(!doesFieldContainsNumber(teacherLnameTxt)){
        addClass(teacherLnameTxt, 'form-error');
        isLNameEmpty = true;
    }else{
        isLNameEmpty = false;
    }
    if(!doesFieldContainsValidEmail(teacherEmailTxt)){
        addClass(teacherEmailTxt, 'form-error');
        isEmailEmpty = true;
    }else{
        isEmailEmpty = false;
    }
    if(!isPasswordTheSame(teacherPasswordTxt, teacherConfirmPasswordTxt)
        || !confirmPasswordLength(teacherPasswordTxt) || !confirmPasswordLength(teacherConfirmPasswordTxt)){
        addClass(teacherPasswordTxt, 'form-error');
        addClass(teacherConfirmPasswordTxt, 'form-error');
        isPasswordEmpty = true;
    }else{
        isPasswordEmpty = false;
    }

    if(!isFNameEmpty && !isMNameEmpty && !isLNameEmpty && !isEmailEmpty
        && !isPasswordEmpty){
        window.onbeforeunload = null;
        teacherSubmitBttn.setAttribute('type', 'submit');
    }else{
        //GET POSSIBLE FAULTY VALUES
        pastTeacherFnameValue = teacherFnameTxt.value;
        pastTeacherMnameValue = teacherMnameTxt.value;
        pastTeacherLnameValue = teacherLnameTxt.value;
        pastTeacherEmailValue = teacherEmailTxt.value;
        pastTeacherPWValue = teacherPasswordTxt.value;
        pastTeacherConPWValue = teacherConfirmPasswordTxt.value;
    }
}
function checkIfStudentFieldIsValid(){
    let isFNameEmpty, isMNameEmpty, isLNameEmpty, isEmailEmpty,
        isPasswordEmpty, isCodeEmpty;
    if(!doesFieldContainsNumber(studentFnameTxt)){
        addClass(studentFnameTxt, 'form-error');
        isFNameEmpty = true;
    }else{
        isFNameEmpty = false;
    }
    if(!doesFieldContainsNumber(studentMnameTxt)){
        addClass(studentMnameTxt, 'form-error');
        isMNameEmpty = true;
    }else{
        isMNameEmpty = false;
    }
    if(!doesFieldContainsNumber(studentLnameTxt)){
        addClass(studentLnameTxt, 'form-error');
        isLNameEmpty = true;
    }else{
        isLNameEmpty = false;
    }
    if(!doesFieldContainsValidEmail(studentEmailTxt)){
        addClass(studentEmailTxt, 'form-error');
        isEmailEmpty = true;
    }else{
        isEmailEmpty = false;
    }
    if(!isPasswordTheSame(studentPasswordTxt, studentConfirmPasswordTxt)
        || !confirmPasswordLength(studentPasswordTxt) || !confirmPasswordLength(studentConfirmPasswordTxt)){
        addClass(studentPasswordTxt, 'form-error');
        addClass(studentConfirmPasswordTxt, 'form-error');
        isPasswordEmpty = true;
    }else{
        isPasswordEmpty = false;
    }
    if(!isCodeValid(studentClassCodeTxt)){
        addClass(studentClassCodeTxt, 'form-error');
        isCodeEmpty = true;
    }else{
        isCodeEmpty = false;
    }

    if(!isFNameEmpty && !isMNameEmpty && !isLNameEmpty && !isEmailEmpty
        && !isPasswordEmpty && !isCodeEmpty){
        window.onbeforeunload = null;
        studentSubmitBttn.setAttribute('type', 'submit');
    }else{
        //GET POSSIBLE FAULTY VALUES
        pastStudentFnameValue = studentFnameTxt.value;
        pastStudentMnameValue = studentMnameTxt.value;
        pastStudentLnameValue = studentLnameTxt.value;
        pastStudentEmailValue = studentEmailTxt.value;
        pastStudentPWValue = studentPasswordTxt.value;
        pastStudentConPWValue = studentConfirmPasswordTxt.value;
        pastStudentClassValue = studentClassCodeTxt.value;
    }
}
function addClass(el, cl){
    el.classList.add(cl);
}
function removeClass(el, cl){
    el.classList.remove(cl);
}
function showElement(el, cl){
    el.parentNode.querySelector(cl).style.display = 'block';
}
function hideElement(el, cl){
    el.parentNode.querySelector(cl).style.display = 'none';
}
function scrolling(){
    let scroll = new SmoothScroll();
    let element = document.querySelector('.form--primary__main-container')
    let options = { speed: 2000, easing: 'easeOutQuart' , offset: 20};
    setTimeout(function(){
        scroll.animateScroll(element,element, options);
    },250);
}
function showAdminAccount(){
    addClass(cardBttn1, 'card--active');
    removeClass(cardBttn2, 'card--active');
    removeClass(cardBttn3, 'card--active');

    removeClass(formSlide1, 'form--hidden');
    addClass(formSlide2, 'form--hidden');
    addClass(formSlide3, 'form--hidden');
    scrolling();
}
function showTeacherAccount(){
    addClass(cardBttn2, 'card--active');
    removeClass(cardBttn1, 'card--active');
    removeClass(cardBttn3, 'card--active');

    removeClass(formSlide2, 'form--hidden');
    addClass(formSlide1, 'form--hidden');
    addClass(formSlide3, 'form--hidden');
    scrolling();
}
function showStudentAccount(){
    addClass(cardBttn3, 'card--active');
    removeClass(cardBttn1, 'card--active');
    removeClass(cardBttn2, 'card--active');

    removeClass(formSlide3, 'form--hidden');
    addClass(formSlide2, 'form--hidden');
    addClass(formSlide1, 'form--hidden');
    scrolling();
}
function makeFieldEmpty(el){
    el.value = '';
}
//VALIDATION
function isFieldBlank(el){
    if(isStringEmpty(el.value)){
        showElement(el, '.js-field-blank');
        return true;
    }else{
        hideElement(el, '.js-field-blank');
        return false;
    }
}
function doesFieldContainsNumber(el){
    if(!isFieldBlank(el)){
        if(!stringContainsNumber(el.value)){
            hideElement(el, '.js-field-no-num');
            return true;
        }else{
            showElement(el, '.js-field-no-num');
        }
    }
    return false;
}
function doesFieldContainsValidEmail(el){
    if(!isFieldBlank(el)){
        if(isStringAnEmail(el.value)){
            hideElement(el, '.js-field-email');
            return true;
        }else{
            showElement(el, '.js-field-email');
        }
    }
    return false;
}
function isPasswordTheSame(el1, el2){
    if(!isFieldBlank(el1) && !isFieldBlank(el2)){
        if(isStringEqual(el1.value, el2.value)){
            hideElement(el1, '.js-password-not-match');
            hideElement(el2, '.js-password-not-match');
            return true;
        }else{
            showElement(el1, '.js-password-not-match');
            showElement(el2, '.js-password-not-match');
        }
    }
    return false;
}
function confirmPasswordLength(el1){
    if(compareStrLength(el1.value,8)){
        hideElement(el1, '.js-password-length');
        return true;
    }else{
        showElement(el1, '.js-password-length');
    }
    return false;
}
function isCodeValid(el1){
    if(!isFieldBlank(el1)){
        if(compareStrLength(el1.value, 6)){
            hideElement(el1, '.js-field-code');
            return true;
        }else{
            showElement(el1, '.js-field-code');
        }
    }
    return false;
}
function resetAdminFields(){
    makeFieldEmpty(adminFnameTxt);
    makeFieldEmpty(adminMnameTxt);
    makeFieldEmpty(adminLnameTxt);
    makeFieldEmpty(adminEmailTxt);
    makeFieldEmpty(adminPasswordTxt);
    makeFieldEmpty(adminConfirmPasswordTxt);
    makeFieldEmpty(adminCodeTxt);
    pastAdminFnameValue = null;
    pastAdminMnameValue = null;
    pastAdminLnameValue = null;
    pastAdminEmailValue = null;
    pastAdminPWValue = null;
    pastAdminConPWValue = null;
    pastAdminCodeValue = null;
}
function resetTeacherFields(){
    makeFieldEmpty(teacherFnameTxt);
    makeFieldEmpty(teacherMnameTxt);
    makeFieldEmpty(teacherLnameTxt);
    makeFieldEmpty(teacherEmailTxt);
    makeFieldEmpty(teacherPasswordTxt);
    makeFieldEmpty(teacherConfirmPasswordTxt);
    pastTeacherFnameValue = null;
    pastTeacherMnameValue = null;
    pastTeacherLnameValue = null;
    pastTeacherEmailValue = null;
    pastTeacherPWValue = null;
    pastTeacherConPWValue = null;
}
function resetStudentFields(){
    makeFieldEmpty(studentFnameTxt);
    makeFieldEmpty(studentMnameTxt);
    makeFieldEmpty(studentLnameTxt);
    makeFieldEmpty(studentEmailTxt);
    makeFieldEmpty(studentPasswordTxt);
    makeFieldEmpty(studentConfirmPasswordTxt);
    makeFieldEmpty(studentClassCodeTxt);
    pastStudentFnameValue = null;
    pastStudentMnameValue = null;
    pastStudentLnameValue = null;
    pastStudentEmailValue = null;
    pastStudentPWValue = null;
    pastStudentConPWValue = null;
    pastStudentClassValue = null;
}
//CLEAR FIELDS BEFORE SWITCHING
function popYFunction(){
    console.log('yes');
}
function popNFunction(){
    console.log('no');
}

function checkIfAllAdminFieldsAreEmpty(){
    if (!isStringEmpty(adminFnameTxt.value) || !isStringEmpty(adminMnameTxt.value) || !isStringEmpty(adminLnameTxt.value) || !isStringEmpty(adminEmailTxt.value) || !isStringEmpty(adminPasswordTxt.value) || !isStringEmpty(adminConfirmPasswordTxt.value) || !isStringEmpty(adminCodeTxt.value)){
        return false;
    }else{
        return true;
    }
}
function checkIfAllTeacherFieldsAreEmpty(){
    if (!isStringEmpty(teacherFnameTxt.value) || !isStringEmpty(teacherMnameTxt.value) || !isStringEmpty(teacherLnameTxt.value) || !isStringEmpty(teacherEmailTxt.value) || !isStringEmpty(teacherPasswordTxt.value) || !isStringEmpty(teacherConfirmPasswordTxt.value)){
        return false;
    }else{
        return true;
    }
}
function checkIfAllStudentFieldsAreEmpty(){
    if (!isStringEmpty(studentFnameTxt.value) || !isStringEmpty(studentMnameTxt.value) || !isStringEmpty(studentLnameTxt.value) || !isStringEmpty(studentEmailTxt.value) || !isStringEmpty(studentPasswordTxt.value) || !isStringEmpty(studentConfirmPasswordTxt.value) || !isStringEmpty(studentClassCodeTxt.value)){
        return false;
    }else{
        return true;
    }
}

function fetchEmail(el){
    let classEmailElement = el.parentNode.querySelector('.js-field-email-taken');
    let url = '/checkEmail';
    let jsonData = JSON.stringify({inputEmail: el.value});
    const options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: jsonData
    };
    fetch(url, options)
        .then((response)=>{
            return response.text();
        })
        .then((body)=>{
            if(body === 'true'){
                classEmailElement.style.display = 'none';
                removeClass(el, 'form-error');
            }else{
                classEmailElement.style.display = 'block';
                addClass(el, 'form-error');
            }
        })
        .catch(error=>{
            console.log(error);
        });
}


