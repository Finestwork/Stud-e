let taskIntroWrapper = document.querySelector('.task-create__intro');

//DROPDOWN INTRO
let taskSelectionDrpdwn = taskIntroWrapper.querySelector('.js-task-dropdown'),
    taskSelectionItems = taskIntroWrapper.querySelector('.js-task-dropdown-items'),
    taskTypeSelectionDrpdwn = taskIntroWrapper.querySelector('.js-type-task-dropdown'),
    taskTypeSelectionItems = taskIntroWrapper.querySelector('.js-type-task-dropdown-items');

let taskTypeSelectionItem = taskTypeSelectionDrpdwn.parentNode.querySelectorAll('.task-create__selection-item');
let taskTypeSelectionDrpdwnParent = taskTypeSelectionDrpdwn.parentNode,
    taskSelectionDrpdwnParent = taskSelectionDrpdwn.parentNode;

let taskDescriptionTitle = taskIntroWrapper.querySelectorAll('.task-create__task-description-title');
let dateTxt = document.querySelector('.js-date-txt'),
    timeTxt = document.querySelector('.js-time-txt');
let radioSubmissionBttn1 = document.getElementById('radioSubmissionBttn1'),
    radioSubmissionBttn2 = document.getElementById('radioSubmissionBttn2'),
    radioSubmissionBttn3 = document.getElementById('radioSubmissionBttn3'),
    radioSubmissionOthers = document.getElementById('radioSubmissionOthers'),
    customerSubmissionAttemptTxt = document.getElementById('customerSubmissionAttemptTxt');

let hourTxt = document.getElementById('hourTimerTxt'),
    minuteTxt = document.getElementById('minuteTimerTxt');

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

let taskDropdownCtr = 0, taskTypeDropdownCtr = 0;
let deadlinePicker = new MtrDatepicker(config);

dateTxt.textContent = deadlinePicker.format('MMM DD, YYYY');
timeTxt.textContent = deadlinePicker.format('h:mm A');
if(taskTypeSelectionItem){
    taskTypeSelectionItem.forEach(el =>{
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
        taskSelectionItems.style.display = '-webkit-flex';
        taskSelectionItems.style.display = 'flex';
        taskSelectionItems.style.bottom = -(taskSelectionItems.getBoundingClientRect().height + 10) + 'px';
        taskDropdownCtr++;
    }else{
        taskSelectionItems.style.display = null;
        taskDropdownCtr = 0;
    }
});
taskTypeSelectionDrpdwn.addEventListener('click', ()=>{
    if(!taskTypeDropdownCtr){
        taskTypeSelectionItems.style.display = 'block';
        taskTypeSelectionItems.style.bottom = -(taskTypeSelectionItems.getBoundingClientRect().height + 10) + 'px';
        taskTypeDropdownCtr++;
    }else{
        taskTypeSelectionItems.style.display = null;
        taskTypeDropdownCtr = 0;
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

//ON CHANGE
deadlinePicker.onChange('all', function() {
    let date = deadlinePicker.format('MMM DD, YYYY');
    if(date.substr(0,1) === '3' || date.substr(0,1) === '5'){
        date = date.replace(date.charAt(0), 'M');
    }
    dateTxt.textContent = date;
    timeTxt.textContent = deadlinePicker.format('h:mm A');
});
hourTxt.addEventListener('keyup', acceptNumbersOnly);
hourTxt.onchange = (e)=>{
    if(parseInt(e.currentTarget.value) === 1){
        e.currentTarget.nextElementSibling.textContent = 'hour';
    }else{
        e.currentTarget.nextElementSibling.textContent = 'hours';
    }
}
minuteTxt.addEventListener('keyup', acceptNumbersOnly);
minuteTxt.onchange = (e)=>{
    if(parseInt(e.currentTarget.value) === 1){
        e.currentTarget.nextElementSibling.textContent = 'minute';
    }else{
        e.currentTarget.nextElementSibling.textContent = 'minutes';
    }
}

//ON BLUR
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
    taskTypeSelectionDrpdwn.textContent = e.currentTarget.textContent;
    taskDescriptionTitle.forEach(el=>{
        el.textContent = e.currentTarget.textContent.toLowerCase();
    });
    taskTypeSelectionItems.style.display = null;
    taskTypeDropdownCtr = 0;
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
