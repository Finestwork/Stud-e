let taskSelectionDrpdwn = document.querySelector('.js-task-dropdown'),
    taskSelectionItems = document.querySelector('.js-task-dropdown-items'),
    taskSelectionItem = document.querySelectorAll('.task-create__selection-item'),
    taskSelectionDrpdwnParent = taskSelectionDrpdwn.parentNode;

let taskDescriptionTitle = document.querySelector('.task-create__task-description-title');
let dateTxt = document.querySelector('.js-date-txt'),
    timeTxt = document.querySelector('.js-time-txt');
let radioSubmissionBttn1 = document.getElementById('radioSubmissionBttn1'),
    radioSubmissionBttn2 = document.getElementById('radioSubmissionBttn2'),
    radioSubmissionBttn3 = document.getElementById('radioSubmissionBttn3'),
    radioSubmissionOthers = document.getElementById('radioSubmissionOthers'),
    customerSubmissionAttemptTxt = document.getElementById('customerSubmissionAttemptTxt');

let showAnswerOptionBttn = document.querySelectorAll('.js-select-option-answer'),
    selectionAnswerList = document.querySelectorAll('.task-create__question-option-choice-list-item'),
    targetedAnswerOptionBttn = null, targetedAnswerOptionParent = null;

let config = {
    target: 'task-deadline-picker',
    smartHours: true,
    future: true,
    months: {
        min: 0,
        max: 11,
        step: 1
    },
    minutes: {
        min: 0,
        max: 59,
        step: 1
    },
    years: {
        min: 2000,
        max: 2030,
        step: 1
    }
}
let isOthersSubmissionClicked = false, isShowAnswerOptionBttnClicked = false;

let taskDropdownCtr = 0
let deadlinePicker = new MtrDatepicker(config);



dateTxt.textContent = deadlinePicker.format('MMM DD, YYYY');
timeTxt.textContent = deadlinePicker.format('h:mm A');
if(taskSelectionItem){
    taskSelectionItem.forEach(el =>{
        el.addEventListener('click', getSelectedTaskItem);
    });
}
if(showAnswerOptionBttn){
    showAnswerOptionBttn.forEach(el=>{
        el.addEventListener('click', showSelectionAnswerType);
    });
}
if(selectionAnswerList){
    selectionAnswerList.forEach(el=>{
        el.addEventListener('click', changeTextOfAnswerOptionBttn);
    });
}

taskSelectionDrpdwn.addEventListener('click', ()=>{
    if(!taskDropdownCtr){
        taskSelectionItems.style.display = 'block';
        taskSelectionItems.style.bottom = -(taskSelectionItems.getBoundingClientRect().height + 10) + 'px';
        taskDropdownCtr++;
    }else{
        taskSelectionItems.style.display = null;
        taskDropdownCtr = 0;
    }

});
radioSubmissionBttn1.addEventListener('click', ()=>{
    if(isOthersSubmissionClicked){
        isOthersSubmissionClicked = false;
        customerSubmissionAttemptTxt.disabled = true;
        customerSubmissionAttemptTxt.style.cursor = 'not-allowed';
        customerSubmissionAttemptTxt.value = '';
    }
});
radioSubmissionBttn2.addEventListener('click', ()=>{
    if(isOthersSubmissionClicked){
        isOthersSubmissionClicked = false;
        customerSubmissionAttemptTxt.disabled = true;
        customerSubmissionAttemptTxt.style.cursor = 'not-allowed';
        customerSubmissionAttemptTxt.value = '';
    }
});
radioSubmissionBttn3.addEventListener('click', ()=>{
    if(isOthersSubmissionClicked){
        isOthersSubmissionClicked = false;
        customerSubmissionAttemptTxt.disabled = true;
        customerSubmissionAttemptTxt.style.cursor = 'not-allowed';
        customerSubmissionAttemptTxt.value = '';
    }
});
radioSubmissionOthers.addEventListener('click', ()=>{
    if(!isOthersSubmissionClicked){
        isOthersSubmissionClicked = true;
        customerSubmissionAttemptTxt.disabled = false;
        customerSubmissionAttemptTxt.style.cursor = 'auto';
        customerSubmissionAttemptTxt.focus();
    }
});

deadlinePicker.onChange('all', function() {
    dateTxt.textContent = deadlinePicker.format('MMM DD, YYYY');
    timeTxt.textContent = deadlinePicker.format('h:mm A');
});

customerSubmissionAttemptTxt.onblur = function (){
    if(parseInt(this.value) === 1){
        radioSubmissionBttn1.click();
        this.value = '';
    }else if(parseInt(this.value) === 2){
        radioSubmissionBttn2.click();
        this.value = '';
    }else if(parseInt(this.value) === 3){
        radioSubmissionBttn3.click();
        this.value = '';
    }
}
//DOM HELPERS
function getSelectedTaskItem(e){
    taskSelectionDrpdwn.textContent = e.currentTarget.textContent;
    taskDescriptionTitle.textContent = e.currentTarget.textContent.toLowerCase();
    taskSelectionItems.style.display = null;
    taskDropdownCtr = 0;
}
function showSelectionAnswerType(e){
    let nextEl = e.currentTarget.nextElementSibling;
    targetedAnswerOptionBttn = nextEl;
    targetedAnswerOptionParent = targetedAnswerOptionBttn.parentNode;
    if(!isShowAnswerOptionBttnClicked){
        nextEl.style.display = 'block';
        isShowAnswerOptionBttnClicked = true;
    }else{
        nextEl.style.display = null;
        isShowAnswerOptionBttnClicked = false;
    }
}








