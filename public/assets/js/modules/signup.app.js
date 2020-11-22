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


//Functions
function addClass(el, cl){
    el.classList.add(cl);
}
function removeClass(el, cl){
    el.classList.remove(cl);
}

