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

let fillInTheBlankBttns = document.querySelectorAll('.js-fitb-button'),
    resetAnswerFillInTheBlankBttns = document.querySelectorAll('.js-fitb-reset-button');


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
if(fillInTheBlankBttns){
    fillInTheBlankBttns.forEach(el =>{
        el.addEventListener('click', getFillInTheBlankAnswer);
    }) ;
}
if(resetAnswerFillInTheBlankBttns){
    resetAnswerFillInTheBlankBttns.forEach(el =>{
        el.addEventListener('click', resetFillInTheBlankAnswer);
    }) ;
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
function changeTextOfAnswerOptionBttn(e){
    let sibling = e.currentTarget.parentNode.previousSibling.previousSibling;
    sibling.textContent = e.currentTarget.textContent;
    e.currentTarget.parentNode.style.display = null;
    let allEls = e.currentTarget.parentNode.childElementCount;
    for(let i = 0; i<allEls; i++){
        e.currentTarget.parentNode.children[i].classList.remove('selected-item');
    }
    isShowAnswerOptionBttnClicked = false;
    e.currentTarget.classList.add('selected-item');
    whichFormat(e.currentTarget.textContent);
}
function getFillInTheBlankAnswer(e){
    let mainWrapper = e.currentTarget.parentNode.parentNode;
    let input = mainWrapper.children[0].children[0],
        fullText = input.value,
        selectedText = getSelectedText(input).trim();

    if(selectedText !== ""){
        let fillInTheBlankArr = null;
        if(mainWrapper.getAttribute('data-arr-val')){
            fillInTheBlankArr = mainWrapper.getAttribute('data-arr-val').split(',');
        }else{
            fillInTheBlankArr = [];
        }
        let correctAnswersPrev = mainWrapper.querySelector('.task-create__preview-fitb-answers');
        if(fillInTheBlankArr.length === 0){
            correctAnswersPrev.textContent = 'Here is the correct answer: ';
        }else{
            correctAnswersPrev.textContent = 'Here are the correct answers: ';
        }
        fillInTheBlankArr.unshift(selectedText);
        fillInTheBlankArr.sort((a,b)=>{
            console.log(fullText.search(a),fullText.search(b));
            return fullText.search(a)-fullText.search(b);
        })

        for (let i = 0; i<fillInTheBlankArr.length; i++){
            if(fillInTheBlankArr.length === 1){
                correctAnswersPrev.textContent += fillInTheBlankArr[i];
            }else{
                correctAnswersPrev.textContent += fillInTheBlankArr[i] + ', ';
            }
        }
        mainWrapper.setAttribute('data-arr-val', fillInTheBlankArr);
        displayFITBPrev(fullText, mainWrapper, fillInTheBlankArr);
    }

}
function resetFillInTheBlankAnswer(e){
    let mainWrapper = e.currentTarget.parentNode.parentNode;
    let fitbWrapper = mainWrapper.querySelector('.task-create__preview-fitb-wrapper'),
        correntAnswerWrapper = mainWrapper.querySelector('.task-create__preview-fitb-answers');
    let fitbWrapperLength = fitbWrapper.childElementCount;
    mainWrapper.removeAttribute('data-arr-val');
    for(let i = fitbWrapperLength - 1; i>=0; i--){
        fitbWrapper.children[i].remove();
    }
    correntAnswerWrapper.textContent = 'No correct answers to be displayed yet.';
}


//GENERATE
function displayFITBPrev(fullText, parent, fillInTheBlankArr){
    let fitbWrapper = parent.querySelector('.task-create__preview-fitb-wrapper');
    let text = fullText, newText = null;
    let newArr = fillInTheBlankArr;
    let newTextCtr = 0, fitbWrapperLength = fitbWrapper.childElementCount;
    if(fillInTheBlankArr){
        newArr.forEach(item =>{
            text = text.replace(item, '**');
        })
        newText = text.split('*');
        for(let i = fitbWrapperLength - 1; i>=0; i--){
            fitbWrapper.children[i].remove();
        }
        console.log(newText)
        for(let i = 0; i<newText.length; i++){
            if(newText[i] === ""){
                let inputTag =document.createElement('INPUT'),
                    divInputMainWrapper = document.createElement('DIV'),
                    blankDiv = document.createElement('DIV'),
                    divLine = document.createElement('DIV');

                divInputMainWrapper.classList.add('task-create__preview-correct-answer-wrapper');
                blankDiv.classList.add('task-create__default-question-title');
                divLine.classList.add('task-create__question-line');
                inputTag.setAttribute('disabled', true);
                inputTag.style.cursor = 'not-allowed';
                inputTag.value = fillInTheBlankArr[newTextCtr];
                blankDiv.append(inputTag, divLine);
                divInputMainWrapper.append(blankDiv);
                fitbWrapper.append(divInputMainWrapper);
                newTextCtr++;
            }else{
                let pTag = document.createElement('P');
                pTag.classList.add('task-create__preview-answer-fitb');
                pTag.textContent = newText[i]
                fitbWrapper.append(pTag);
            }
        }
    }
}


//HELPERS
function whichFormat(txt){
    if(txt === 'Fill in the blanks'){
        console.log('Fill in the blanks');
    }
}
function getSelectedText(input) {
    return input.value.substring(input.selectionStart, input.selectionEnd);
}



document.addEventListener('click', e =>{
    if(!taskSelectionDrpdwnParent.contains(e.target)){
        taskSelectionItems.style.display = null;
        taskDropdownCtr = 0;
    }
    if(targetedAnswerOptionParent){
        if(!targetedAnswerOptionParent.contains(e.target)){
            if(targetedAnswerOptionBttn){
                targetedAnswerOptionBttn.style.display = null;
                isShowAnswerOptionBttnClicked = false;
            }
        }
    }
});




