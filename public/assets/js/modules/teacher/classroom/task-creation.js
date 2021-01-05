let selectionTaskTypeDrpdwn = document.querySelectorAll('.js-selection-pop'),
    targetetedParentTaskTypDrpdwn = null, selectionTaskItems = document.querySelectorAll('.task-create__option-selection-item');

let pointsInput = document.querySelectorAll('.task-create__question-how-many-points input');
let showAnswerOptionBttn = document.querySelectorAll('.js-select-option-answer'),
    selectionAnswerList = document.querySelectorAll('.task-create__question-option-choice-list-item'),
    targetedAnswerOptionBttn = null, targetedAnswerOptionParent = null;
if(selectionTaskTypeDrpdwn){
    selectionTaskTypeDrpdwn.forEach(el=>{
        el.addEventListener('click', chooseQuestionType);
    });
}
if(selectionTaskItems){
    selectionTaskItems.forEach(el=>{
        el.addEventListener('click', selectItemInDrpdwn);
    });
}
if(pointsInput){
    pointsInput.forEach(el =>{
        el.addEventListener('keyup', acceptNumbersOnly);
    });
}



//CLICK FUNCTIONS
function chooseQuestionType(e){
    let nextElSibling = e.currentTarget.nextElementSibling;
    targetetedParentTaskTypDrpdwn = e.currentTarget.parentNode;
    nextElSibling.classList.toggle('dropdown--active');
}
function selectItemInDrpdwn(e){
    let prevSibling = e.currentTarget.parentNode.previousSibling.previousSibling;
    prevSibling.textContent = e.currentTarget.textContent;
    prevSibling.setAttribute('data-question-type', e.currentTarget.getAttribute('data-value'));
    e.currentTarget.parentNode.classList.remove('dropdown--active');
}






