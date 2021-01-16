let hourTxt = document.getElementById('hourTimerTxt'),
    minuteTxt = document.getElementById('minuteTimerTxt');
let dateTxt = document.querySelector('.js-date-txt'),
    timeTxt = document.querySelector('.js-time-txt');

let taskDescriptionTitle = document.querySelectorAll('.task-create__task-description-title');
let taskSelectionDrpdwn = document.querySelector('.js-task-dropdown'),
    taskSelectionItems = document.querySelector('.js-task-dropdown-items'),
    taskTypeSelectionDrpdwn = document.querySelector('.js-type-task-dropdown'),
    taskTypeSelectionItems = document.querySelector('.js-type-task-dropdown-items');
let taskTypeSelectionItem = taskTypeSelectionDrpdwn.parentNode.querySelectorAll('.task-create__selection-item'),
    taskModuleSelection = document.querySelectorAll('.js-modules-selection');
let taskTypeSelectionDrpdwnParent = taskTypeSelectionDrpdwn.parentNode,
    taskSelectionDrpdwnParent = taskSelectionDrpdwn.parentNode;
let taskDropdownCtr = 0, taskTypeDropdownCtr = 0;

let radioSubmissionBttn1 = document.getElementById('radioSubmissionBttn1'),
    radioSubmissionBttn2 = document.getElementById('radioSubmissionBttn2'),
    radioSubmissionBttn3 = document.getElementById('radioSubmissionBttn3'),
    radioSubmissionOthers = document.getElementById('radioSubmissionOthers'),
    customerSubmissionAttemptTxt = document.getElementById('customerSubmissionAttemptTxt'),
    cheatingAttempTxt = document.getElementById('cheatingAttemptTxt');
let radioCheatingBttn1 = document.getElementById('radioCheatingBttn1'),
    radioCheatingBttn2 = document.getElementById('radioCheatingBttn2'),
    radioCheatingBttn3 = document.getElementById('radioCheatingBttn3'),
    radioCheatingOthersBttm = document.getElementById('radioCheatingOthersBttn');

let saveChangesbttn = document.querySelector('.js-save-changes-bttn');
let bgBttns = document.querySelectorAll('.task-create__bttn-checkbox-bg');

hourTxt.addEventListener('keyup', acceptNumbersOnly);
hourTxt.onchange = (e)=>{
    if(parseInt(e.currentTarget.value) <= 1){
        e.currentTarget.nextElementSibling.textContent = 'hour';
    }else{
        e.currentTarget.nextElementSibling.textContent = 'hours';
    }
}
minuteTxt.addEventListener('keyup', acceptNumbersOnly);
minuteTxt.onchange = (e)=>{
    if(parseInt(e.currentTarget.value) <= 1){
        e.currentTarget.nextElementSibling.textContent = 'minute';
    }else{
        e.currentTarget.nextElementSibling.textContent = 'minutes';
    }
}
let config = {
    target: 'task-deadline-picker',
    smartHours: true,
    timestamp: deadlineDate,
    future: false,
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
let deadlinePicker = new MtrDatepicker(config);
deadlinePicker.onChange('all', function() {
    let date = deadlinePicker.format('MMM DD, YYYY');
    if(date.substr(0,1) === '3' || date.substr(0,1) === '5'){
        date = date.replace(date.charAt(0), 'M');
    }
    dateTxt.textContent = date;
    timeTxt.textContent = deadlinePicker.format('h:mm A');
});


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
taskModuleSelection.forEach(el =>{
    el.addEventListener('click', getSelectedModule);
});
taskTypeSelectionItem.forEach(el =>{
    el.addEventListener('click', getSelectedTaskItem);
});

let isOthersSubmissionClicked = false, isCheatingAttemptClicked = false;
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

radioCheatingBttn1.addEventListener('click', ()=>{
    if(isCheatingAttemptClicked){
        isCheatingAttemptClicked = false;
        cheatingAttempTxt.disabled = true;
        cheatingAttempTxt.style.cursor = 'not-allowed';
        cheatingAttempTxt.value = '';
    }
});
radioCheatingBttn2.addEventListener('click', ()=>{
    if(isCheatingAttemptClicked){
        isCheatingAttemptClicked = false;
        cheatingAttempTxt.disabled = true;
        cheatingAttempTxt.style.cursor = 'not-allowed';
        cheatingAttempTxt.value = '';
    }
});
radioCheatingBttn3.addEventListener('click', ()=>{
    if(isCheatingAttemptClicked){
        isCheatingAttemptClicked = false;
        cheatingAttempTxt.disabled = true;
        cheatingAttempTxt.style.cursor = 'not-allowed';
        cheatingAttempTxt.value = '';
    }
});
radioCheatingOthersBttm.addEventListener('click', ()=>{
    if(!isCheatingAttemptClicked){
        isCheatingAttemptClicked = true;
        cheatingAttempTxt.disabled = false;
        cheatingAttempTxt.style.cursor = 'auto';
        cheatingAttempTxt.focus();
    }
});

saveChangesbttn.addEventListener('click', e=>{
    let classroomSettings = {};

    let child = e.currentTarget;
    //TASK INTRO
    //SETTINGS
    let sharedClasses = [],
        timer = [],
        deadline = [];

    classroomSettings['taskTitle'] =  document.getElementById('descriptionTitleTxt').value;
    classroomSettings['underModule'] = taskIntroWrapper.querySelector('.task-create__selection-txt').getAttribute('data-module-id');
    classroomSettings['taskType'] = taskIntroWrapper.querySelector('.js-type-task-dropdown').textContent.toLowerCase();

    let otherClasses = taskIntroWrapper.querySelectorAll('.task-create__options-checkboxes input[type="checkbox"]:checked');
    if(otherClasses.length !== 0){
        for(let i = 0; i<otherClasses.length; i++){
            sharedClasses.push(otherClasses[i].value);
        }
    }
    classroomSettings['sharedClasses'] = sharedClasses;

    let timeRadBttns = taskIntroWrapper.querySelector('.task-create__options-radio-bttn-group input[type="radio"]:checked');
    if(timeRadBttns.value === 'yes'){
        let hour = document.getElementById('hourTimerTxt').value,
            minute = document.getElementById('minuteTimerTxt').value;
        timer.push([hour,minute]);
    }
    classroomSettings['timer'] = timer;

    let dateDeadline = taskIntroWrapper.querySelector('.js-date-txt'),
        timeDeadline = taskIntroWrapper.querySelector('.js-time-txt');
    if(dateDeadline && timeDeadline){
        deadline.push(dateDeadline.textContent, timeDeadline.textContent);
    }
    classroomSettings['deadline'] = deadline;

    let submission = taskIntroWrapper.querySelector('.js-submission input[type="radio"]:checked').value;
    let cheatingAttempt = taskIntroWrapper.querySelector('.js-cheating-attempt input[type="radio"]:checked').value;
    let instruction = document.getElementById('instructionTxt').value;
    if(submission){
        classroomSettings['submission'] = submission;
    }else{
        classroomSettings['submission'] = '';
    }
    if(cheatingAttempt){
        classroomSettings['cheatingAttempt'] = cheatingAttempt;
    }else{
        classroomSettings['cheatingAttempt'] = '';
    }
    if(instruction){
        classroomSettings['instruction'] = instruction;
    }else{
        classroomSettings['instruction'] = '';
    }


    let url = '/task/save-changes';
    const options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({settings: classroomSettings, contents: content, cID: classID})
    };
    fetch(url, options)
        .then((response)=>{
            return response.text();
        })
        .then((body)=>{
            let result = JSON.parse(body);
            if(result.success) {
                location.href = '/task/'+classroomUrl;
            }else{
                //ERROR SCROLL TO TOP
            }
        })
        .catch(error=>{
            console.log(error);
        });
});

bgBttns.forEach(el=>{
    el.style.width = el.parentNode.children[0].offsetWidth + 'px';
    el.style.height = el.parentNode.children[0].offsetHeight + 'px';
    el.style.top = el.parentNode.children[0].offsetTop + 'px';
    el.style.left = el.parentNode.children[0].offsetLeft + 'px';
    el.parentNode.children[0].addEventListener('click', mcPlainTxtBttn);
    el.parentNode.children[1].addEventListener('click', mcImageBttn);
});



















//CLICK FUNCTIONS
function mcPlainTxtBttn(e){
    let currentBttn = e.currentTarget;
    let parent = currentBttn.parentNode;
    let checkIfElementsExist = currentBttn.parentNode.parentNode.querySelectorAll('.task-create__checkbox-img-wrapper');
    if(checkIfElementsExist.length !== 0){
        if(confirm('Are you sure you want switch to plain text?')){
            let path = [];
            let maChoiceWrapper = parent.parentNode.querySelectorAll('.task-create__mc-choice-wrapper');
            for (let i = 0; i<checkIfElementsExist.length; i++){
                let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
                let checkBox = maChoiceWrapper[i].querySelector('input[type="radio"');
                maChoiceWrapper[i].classList.add('show-loading');
                closebttn.disabled =true;
                checkBox.disabled = true;
                path.push(checkIfElementsExist[i].getAttribute('data-img-path'));
            }
            let url = '/classroom/delete-multiple-picture';
            const options = {
                method: 'POST',
                headers:{
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=UTF-8',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({data: path})
            };
            fetch(url, options)
                .then((response)=>{
                    return response.text();
                })
                .then((body)=>{
                    let result = JSON.parse(body);
                    if(result.success){
                        for (let i = maChoiceWrapper.length - 1; i>= 0; i--){
                            maChoiceWrapper[i].remove();
                        }
                        parent.setAttribute('data-txt-only', true);
                        let nextSibling = currentBttn.nextElementSibling;
                        let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
                        let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
                        noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
                        nextSibling.style.color = '#7f2aff';
                        currentBttn.style.color = '#fff';
                        bg.style.transformOrigin = 'right';
                        bg.style['webkit'+'Transform'] = 'scaleX(3)';
                        bg.style.transform = 'scaleX(3)';
                        setTimeout(()=>{
                            bg.style.width = currentBttn.offsetWidth + 'px';
                            bg.style.left = currentBttn.offsetLeft + 'px';
                        }, 300);
                    }else{
                        for (let i = 0; i<checkIfElementsExist.length; i++){
                            let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
                            let checkBox = maChoiceWrapper[i].querySelector('input[type="checkbox"');
                            maChoiceWrapper[i].classList.remove('show-loading');
                            closebttn.disabled = false;
                            checkBox.disabled = false;
                            path = [];
                            parent.setAttribute('data-txt-only', false);
                        }
                    }
                })
                .catch(error=>{
                    console.log(error);
                });
        }
    }else{
        parent.setAttribute('data-txt-only', true);
        let nextSibling = currentBttn.nextElementSibling;
        let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
        let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
        noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
        nextSibling.style.color = '#7f2aff';
        currentBttn.style.color = '#fff';
        bg.style.transformOrigin = 'right';
        bg.style['webkit'+'Transform'] = 'scaleX(3)';
        bg.style.transform = 'scaleX(3)';
        setTimeout(()=>{
            bg.style.width = currentBttn.offsetWidth + 'px';
            bg.style.left = currentBttn.offsetLeft + 'px';
        }, 300);
    }
}
function mcImageBttn(e){
    let currentBttn = e.currentTarget;
    let prevSibling = currentBttn.previousElementSibling;
    let parent = currentBttn.parentNode;
    parent.setAttribute('data-txt-only', false);
    let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
    let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
    let txtWrapper = parent.parentNode.parentNode.querySelectorAll('.task-create__mc-choice-wrapper');
    if(txtWrapper){
        let txtWrapperLength = txtWrapper.length;
        for(let i = txtWrapperLength - 1; i>= 0; i--){
            txtWrapper[i].remove();
        }
    }
    noteTxt.textContent = 'Note: You are only allowed to add choices with pictures. Switch to plain text if you want to add choices with plain texts.';
    prevSibling.style.color = '#7f2aff';
    currentBttn.style.color = '#fff';
    bg.style.transformOrigin = 'left';
    bg.style['webkit'+'Transform'] = 'scaleX(3)';
    bg.style.transform = 'scaleX(3)';
    setTimeout(()=>{
        bg.style.width = currentBttn.offsetWidth + 'px';
        bg.style.left = currentBttn.offsetLeft + 'px';
    }, 300);
}


//HELPER FUNCTION
function getSelectedTaskItem(e){
    taskTypeSelectionDrpdwn.textContent = e.currentTarget.textContent;
    taskDescriptionTitle.forEach(el=>{
        el.textContent = e.currentTarget.textContent.toLowerCase();
    });
    taskTypeSelectionItems.style.display = null;
    taskTypeDropdownCtr = 0;
}
function getSelectedModule(e){
    let selectedTxt = e.currentTarget.parentNode.parentNode.querySelector('.task-create__selection-txt');
    selectedTxt.textContent = e.currentTarget.textContent;
    selectedTxt.setAttribute('data-module-id', e.currentTarget.getAttribute('data-module-id'));
    e.currentTarget.parentNode.style.display = null;
    taskDropdownCtr = 0;
}
//KEYUPS
function acceptNumbersOnly(e){
    let input = e.currentTarget;
    input.value = input.value.replace(/[^\d]/g,'');
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
    }else{
        radioSubmissionOthers.value = customerSubmissionAttemptTxt.value;
    }
}
cheatingAttempTxt.onblur = function (){
    if(parseInt(this.value) === 1){
        radioCheatingBttn1.click();
        this.value = '';
    }else if(parseInt(this.value) === 2){
        radioCheatingBttn2.click();
        this.value = '';
    }else if(parseInt(this.value) === 3){
        radioCheatingBttn3.click();
        this.value = '';
    }else{
        radioCheatingOthersBttm.value = cheatingAttempTxt.value;
    }
}

document.addEventListener('click', e =>{
    if(!taskTypeSelectionDrpdwnParent.contains(e.target)){
        taskTypeSelectionItems.style.display = null;
        taskTypeDropdownCtr = 0;
    }
    if(!taskSelectionDrpdwnParent.contains(e.target)){
        taskSelectionItems.style.display = null;
        taskDropdownCtr = 0;
    }

});

//AUTO CHECKING
