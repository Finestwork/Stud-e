let classCodeAdminBttn = document.getElementById('classCodeAdminBttn'),
    classCodeClassBttn = document.getElementById('classCodeClassBttn');

let radioChoice1 = document.getElementById('radioChoice1'),
    radioChoice2 = document.getElementById('radioChoice2');

let cardBttn1 = document.getElementById('cardBttn1'),
    cardBttn2 = document.getElementById('cardBttn2'),
    cardBttn3 = document.getElementById('cardBttn3');

let formSlide1 = document.querySelector('.form--slide-1'),
    formSlide2 = document.querySelector('.form--slide-2'),
    formSlide3 = document.querySelector('.form--slide-3');

let adminSubmitBttn = document.getElementById('adminSubmitBttn');

//FIELDS
let adminFnameTxt = document.getElementById('adminFnameTxt'),
    adminMnameTxt = document.getElementById('adminMnameTxt'),
    adminLnameTxt = document.getElementById('adminLnameTxt'),
    adminEmailTxt = document.getElementById('adminEmailTxt'),
    adminPasswordTxt = document.getElementById('adminPasswordTxt'),
    adminConfirmPasswordTxt = document.getElementById('adminConfirmPasswordTxt'),
    adminCodeTxt = document.getElementById('adminCodeTxt');

//I'll fix this password match tomorrow
let passwordDoesNotMatch = document.getElementById('passwordDoesNotMatch'),
    conPasswordDoesNotMatch = document.getElementById('conPasswordDoesNotMatch');

let pastAdminFnameValue = null, pastAdminMnameValue = null,
    pastAdminLnameValue = null, pastAdminEmailValue = null,
    pastAdminPWValue = null, pastAdminConPWValue = null, pastAdminCodeValue = null;


//CLICK EVENTS
classCodeAdminBttn.addEventListener('click', function(){
    radioChoice2.classList.add('form--hidden--active');
    radioChoice1.classList.remove('form--hidden--active');
});
classCodeClassBttn.addEventListener('click', function(){
    radioChoice1.classList.add('form--hidden--active');
    radioChoice2.classList.remove('form--hidden--active');
});
cardBttn1.addEventListener('click', function(){
    addClass(cardBttn1, 'card--active');
    removeClass(cardBttn2, 'card--active');
    removeClass(cardBttn3, 'card--active');

    removeClass(formSlide1, 'form--hidden');
    addClass(formSlide2, 'form--hidden');
    addClass(formSlide3, 'form--hidden');
});
cardBttn2.addEventListener('click', function(){
    addClass(cardBttn2, 'card--active');
    removeClass(cardBttn1, 'card--active');
    removeClass(cardBttn3, 'card--active');

    removeClass(formSlide2, 'form--hidden');
    addClass(formSlide1, 'form--hidden');
    addClass(formSlide3, 'form--hidden');
});
cardBttn3.addEventListener('click', function(){
    addClass(cardBttn3, 'card--active');
    removeClass(cardBttn1, 'card--active');
    removeClass(cardBttn2, 'card--active');

    removeClass(formSlide3, 'form--hidden');
    addClass(formSlide2, 'form--hidden');
    addClass(formSlide1, 'form--hidden');
});
adminSubmitBttn.addEventListener('click', checkIfAdminFieldIsValid);

//KEY EVENTS
//ADMIN
adminFnameTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(alphaLettersOnly(txtVal)){
        if(comparePastValue(pastAdminFnameValue, txtVal)){
            removeClass(this, 'form-error');
        }else{
            addClass(this, 'form-error');
        }
    }else{
        this.value = removeNumbers(txtVal);
    }
});
adminFnameTxt.addEventListener('keydown', function(){
    if(!alphaLettersOnly(this.value)){
        this.value = removeNumbers(this.value);
    }

});
adminMnameTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(alphaLettersOnly(txtVal)){
        if(comparePastValue(pastAdminMnameValue, txtVal)){
            removeClass(this, 'form-error');
        }else{
            addClass(this, 'form-error');
        }
    }else{
        this.value = removeNumbers(txtVal);
    }
});
adminMnameTxt.addEventListener('keydown', function(){
    if(!alphaLettersOnly(this.value)){
        this.value = removeNumbers(this.value);
    }

});
adminLnameTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(alphaLettersOnly(txtVal)){
        if(comparePastValue(pastAdminLnameValue, txtVal)){
            removeClass(this, 'form-error');
        }else{
            addClass(this, 'form-error');
        }
    }else{
        this.value = removeNumbers(txtVal);
    }
});
adminLnameTxt.addEventListener('keydown', function(){
    if(!alphaLettersOnly(this.value)){
        this.value = removeNumbers(this.value);
    }

});
adminEmailTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(comparePastValue(pastAdminEmailValue, txtVal)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
adminPasswordTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(comparePastValue(pastAdminPWValue, txtVal)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
adminConfirmPasswordTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(comparePastValue(pastAdminConPWValue, txtVal)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});
adminCodeTxt.addEventListener('keyup', function(e){
    let txtVal = this.value;
    if(comparePastValue(pastAdminCodeValue, txtVal)){
        removeClass(this, 'form-error');
    }else{
        addClass(this, 'form-error');
    }
});

//FUNCTIONS
function addClass(el, cl){
    el.classList.add(cl);
}
function removeClass(el, cl){
    el.classList.remove(cl);
}
function checkIfAdminFieldIsValid(){
    if(isStringEmpty(adminFnameTxt.value)){
        addClass(adminFnameTxt, 'form-error');
    }
    if(isStringEmpty(adminMnameTxt.value)){
        addClass(adminMnameTxt, 'form-error');
    }
    if(isStringEmpty(adminLnameTxt.value)){
        addClass(adminLnameTxt, 'form-error');
    }
    if(isStringEmpty(adminEmailTxt.value) || !isStringAnEmail(adminEmailTxt.value)){
        addClass(adminEmailTxt, 'form-error');
    }

    if(isStringEmpty(adminPasswordTxt.value) && !compareStrLength(adminPasswordTxt.value, 8)){
        addClass(adminPasswordTxt, 'form-error');
    }
    if(isStringEmpty(adminConfirmPasswordTxt.value) && !compareStrLength(adminConfirmPasswordTxt.value, 8)){
        addClass(adminConfirmPasswordTxt, 'form-error');
    }
    if(isStringEmpty(adminCodeTxt.value)){
        addClass(adminCodeTxt, 'form-error');
    }

    pastAdminFnameValue = adminFnameTxt.value;
    pastAdminMnameValue = adminMnameTxt.value;
    pastAdminLnameValue = adminLnameTxt.value;
    pastAdminEmailValue = adminEmailTxt.value;
    pastAdminPWValue = adminPasswordTxt.value;
    pastAdminConPWValue = adminConfirmPasswordTxt.value;
    pastAdminCodeValue = adminCodeTxt.value;
}
