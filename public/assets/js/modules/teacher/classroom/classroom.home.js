let linksScrollbar = document.querySelector('.classroom__link-scrollbar'),
    linkWrapper = document.querySelector('.classroom__link-wrapper');

let sName = document.querySelector('.js-cr-name'),
    sSection = document.querySelector('.js-cr-section'),
    sDescription = document.querySelector('.js-cr-description'),
    sSchedule = document.querySelector('.js-schedule'),
    sCode = document.querySelector('.js-cr-code');

let scheduleActiveStatus = document.querySelector('.schedule__inactive-wrapper');

let classroomSettingsWrapper = document.querySelector('.classroom-settings'),
    scheduleWrapper = document.querySelector('.schedule');

let somethingWentWrongTxt = document.querySelector('.js-warning-wrong'),
    successTxt = document.querySelector('.js-success-txt'),
    switchWarningTxt = document.querySelector('.classroom-settings__unable-txt');

let switchBttn1 = document.querySelector('.js-switch-one'),
    switchBttn1TurnOff = switchBttn1.parentNode.children[1],
    switchBttn1TurnOn = switchBttn1.parentNode.children[2];
let switchBttn2 = document.querySelector('.js-switch-two'),
    switchBttn2TurnOff = switchBttn2.parentNode.children[1],
    switchBttn2TurnOn = switchBttn2.parentNode.children[2];
let switchBttn3 = document.querySelector('.js-switch-three'),
    switchBttn3TurnOff = switchBttn3.parentNode.children[1],
    switchBttn3TurnOn = switchBttn3.parentNode.children[2];
let switchBttn4 = document.querySelector('.js-switch-four'),
    switchBttn4TurnOff = switchBttn4.parentNode.children[1],
    switchBttn4TurnOn = switchBttn4.parentNode.children[2];

let classroomNameTxt = document.getElementById('classnameTxt'),
    classroomSectionTxt = document.getElementById('sectionTxt'),
    classroomDescriptionTxt = document.getElementById('descriptionTxt'),
    codeTxt = document.getElementById('codeTxt');
let addScheduleBttn = document.getElementById('addScheduleBttn'),
    removeScheduleBttn = document.getElementById('removeScheduleBttn');

let resetAllFieldsBttn = document.querySelector('.classroom-settings__reset-bttn'),
    saveBttn = document.querySelector('.classroom-settings__save-bttn');

let changeSettingsBttn = document.querySelector('.js-schedule-bttn'),
    closeSettingsBttn = document.querySelector('.js-schedule-close-bttn');

let errorWrapper = document.querySelector('.classroom-settings__error-list');

let childCtr = classroomOrigValues[0].classroom_schedule.length - 1;
addScheduleBttn.addEventListener('click', e=>{
    childCtr++;
    removeScheduleBttn.style.display = 'inline';
    makeScheduleForm(e.currentTarget);
});
removeScheduleBttn.addEventListener('click', ()=>{
    let wrapper = document.querySelectorAll('.form--secondary__schedule-wrapper');
    wrapper[childCtr].remove();
    childCtr--;
    if(childCtr === 0){
        removeScheduleBttn.style.display = 'none';
    }
});
changeSettingsBttn.addEventListener('click', ()=>{
    changeSettingsBttn.style.display = 'none';
    closeSettingsBttn.style.display = 'block';
    scheduleWrapper.style.display = 'none';
    classroomSettingsWrapper.style.display = 'block';
});
let test = null;
closeSettingsBttn.addEventListener('click', ()=>{
    resetErrors();
    successTxt.style.display = 'none';
    let allScheduleWrapper = document.querySelectorAll('.form--secondary__schedule-wrapper');
    let schedules = [];
    for (let i = 0; i < allScheduleWrapper.length; i++) {
        let day = allScheduleWrapper[i].querySelector('select').value,
            time = allScheduleWrapper[i].querySelector('input').value;
        if (day.trim() !== "" && time.trim() !== "") {
            schedules.push([day, time]);
        }
    }
    if(classroomNameTxt.value !== classroomOrigValues[0].classroom_name
        || classroomSectionTxt.value !== classroomOrigValues[0].classroom_section
        || classroomDescriptionTxt.value !== classroomOrigValues[0].classroom_description
        || !isArrayTheSame(schedules, classroomOrigValues[0].classroom_schedule)
        || codeTxt.value !== classroomOrigValues[0].class_code
        || canDownload !== classroomOrigValues[0].can_student_download
        || canPost !== classroomOrigValues[0].can_student_post
        || canRequest !== classroomOrigValues[0].can_student_join
        || isActive !== classroomOrigValues[0].is_classroom_active){
        if(confirm("Your changes are not saved yet. Are you sure you want to continue?")){
            hideSettingsWrapper();
            resetAllFields();
        }
    }else{
        hideSettingsWrapper();
    }
});
switchBttn1.addEventListener('click', ()=>{
    if(switchBttn4.classList.contains('switch--active')){
        toggleSwitchNote(switchBttn1, switchBttn1TurnOn, switchBttn1TurnOff);
        switchBttn1.classList.toggle('switch--active');
    }else{
        switchWarningTxt.style.display = 'block';
        switchWarningTxt.classList.add('animation-jelly');
    }

});
switchBttn2.addEventListener('click', ()=>{
    if(switchBttn4.classList.contains('switch--active')){
        toggleSwitchNote(switchBttn2, switchBttn2TurnOn, switchBttn2TurnOff);
        switchBttn2.classList.toggle('switch--active');
    }else{
        switchWarningTxt.style.display = 'block';
        switchWarningTxt.classList.add('animation-jelly');
    }
});
switchBttn3.addEventListener('click', ()=>{
    if(switchBttn4.classList.contains('switch--active')){
        toggleSwitchNote(switchBttn3, switchBttn3TurnOn, switchBttn3TurnOff);
        switchBttn3.classList.toggle('switch--active');
    }else{
        switchWarningTxt.style.display = 'block';
        switchWarningTxt.classList.add('animation-jelly');
    }
});
switchBttn4.addEventListener('click', ()=>{
    toggleSwitchNote(switchBttn4, switchBttn4TurnOn, switchBttn4TurnOff);
    switchBttn4.classList.toggle('switch--active');
    if(!switchBttn4.classList.contains('switch--active')){
        turnoffAllSwitch();
    }else{
        switchWarningTxt.classList.add('animation-jelly-out');
        setTimeout(()=>{
            switchWarningTxt.classList.remove('animation-jelly-out');
            switchWarningTxt.style.display = 'none';
        }, 500);
    }
});
saveBttn.addEventListener('click', ()=>{
    saveBttn.disabled = true;
    saveBttn.classList.add('classroom-settings__loading-bttn');
    saveBttn.textContent = 'Please wait...';
    setTimeout(()=>{
        validateForm();
    },500);
})
resetAllFieldsBttn.addEventListener('click', ()=>{
    resetAllFields();
});

scrollBar(linkWrapper, linksScrollbar, false);

//HELPERS
function hideSettingsWrapper(){
    closeSettingsBttn.style.display = 'none';
    changeSettingsBttn.style.display = 'block';
    classroomSettingsWrapper.style.display = 'none';
    scheduleWrapper.style.display = 'block';
}
function toggleSwitchNote(el, txtOn, txtOff){
    if(el.classList.contains('switch--active')){
        hideElement(txtOn);
        showElement(txtOff);
        changeSwitchValues(el, 'off');
    }else{
        hideElement(txtOff);
        showElement(txtOn)
        changeSwitchValues(el, 'on');
    }
}
function changeSwitchValues(el, str){
    switch (el) {
        case switchBttn1:
            if(str === 'on'){
                canDownload = 1;
            }else{
                canDownload = 0;
            }
            break;
        case switchBttn2:
            if(str === 'on'){
                canPost = 1;
            }else{
                canPost = 0;
            }
            break;
        case switchBttn3:
            if(str === 'on'){
                canRequest = 1;
            }else{
                canRequest = 0;
            }
            break;
        case switchBttn4:
            if(str === 'on'){
                isActive = 1;
            }else{
                isActive = 0;
                canDownload = 0;
                canPost = 0;
                canRequest = 0;
            }
        default:
            break;
    }
}
function resetAllFields(){
    classroomNameTxt.value = classroomOrigValues[0].classroom_name;
    classroomSectionTxt.value = classroomOrigValues[0].classroom_section;
    classroomDescriptionTxt.value = classroomOrigValues[0].classroom_description;
    codeTxt.value = classroomOrigValues[0].class_code;
    canDownload = classroomOrigValues[0].can_student_download;
    canPost = classroomOrigValues[0].can_student_post;
    canRequest = classroomOrigValues[0].can_student_join;
    isActive = classroomOrigValues[0].is_classroom_active;
    resetScheduleForm();
    if(classroomOrigValues[0].can_student_download){
        switchBttn1.classList.add('switch--active');
        showElement(switchBttn1TurnOn);
        hideElement(switchBttn1TurnOff);
    }else{
        switchBttn1.classList.remove('switch--active');
        showElement(switchBttn1TurnOff);
        hideElement(switchBttn1TurnOn);
    }
    if(classroomOrigValues[0].can_student_post){
        switchBttn2.classList.add('switch--active');
        hideElement(switchBttn2TurnOff);
        showElement(switchBttn2TurnOn);
    }else{
        switchBttn2.classList.remove('switch--active');
        hideElement(switchBttn2TurnOn);
        showElement(switchBttn2TurnOff);
    }
    if(classroomOrigValues[0].can_student_join){
        switchBttn3.classList.add('switch--active');
        hideElement(switchBttn3TurnOff);
        showElement(switchBttn3TurnOn);
    }else{
        switchBttn3.classList.remove('switch--active');
        hideElement(switchBttn3TurnOff);
        showElement(switchBttn3TurnOn);
    }
    if(classroomOrigValues[0].is_classroom_active){
        switchBttn4.classList.add('switch--active');
        hideElement(switchBttn4TurnOff);
        showElement(switchBttn4TurnOn);
    }else{
        switchBttn4.classList.remove('switch--active');
        hideElement(switchBttn4TurnOff);
        showElement(switchBttn4TurnOn);
    }
}
function resetDisplayForms(parent, txt, time) {
    //PARENT WRAPPER
    let scheduleWrapper = document.createElement('DIV');
    addClass(scheduleWrapper,'form--secondary__schedule-wrapper');
    //LEFT
    let dateWrapper = document.createElement('DIV'),
        dayLabel = document.createElement('LABEL'),
        daySelect = document.createElement('SELECT');
    addClass(dateWrapper, 'date--wrapper');
    addClass(dayLabel, 'form--secondary__day-label');
    dayLabel.textContent = 'Select a day:';
    populateOption(daySelect, txt);

    //RIGHT
    let rightWrapper = document.createElement('DIV');
    addClass(rightWrapper, 'form--secondary__group');

    let rightLabel = document.createElement('LABEL');
    addClass(rightLabel, 'form--secondary__day-label');
    rightLabel.textContent = 'Place here your preferred time:';

    let timeWrapper = document.createElement('DIV');
    addClass(timeWrapper, 'time-wrapper');

    let timeInput = document.createElement('INPUT');
    timeInput.setAttribute('type', 'text');
    timeInput.setAttribute('placeholder', 'Ex. 7:00 AM - 7:00 PM')
    timeInput.value = time;
    addClass(timeInput,'date-input');

    dateWrapper.append(dayLabel);
    dateWrapper.append(daySelect);

    timeWrapper.append(timeInput);
    rightWrapper.append(rightLabel);
    rightWrapper.append(timeWrapper);

    scheduleWrapper.append(dateWrapper);
    scheduleWrapper.append(rightWrapper);
    parent.before(scheduleWrapper);
}
function displayErrors(hasError = false) {
    let errors = [];
    let scheduleWrapper = document.querySelectorAll('.form--secondary__schedule-wrapper');
    if(hasError){
        errors.push('Course code already exist, please choose another one.');
    }
    if (classroomNameTxt.value.trim() === "") {
        errors.push('Classroom name field should not be empty.');
    }
    if (classroomSectionTxt.value.trim() === "") {
        errors.push('Classroom section field should not be empty.');
    }
    if (classroomDescriptionTxt.value.trim() === "") {
        errors.push('Classroom description field should not be empty.');
    }
    if (codeTxt.value.trim() === "") {
        errors.push('Classroom code field should not be empty.');
    }else{
        if (codeTxt.value.trim().length <= 5) {
            errors.push('Classroom code should be 6 characters and above.');
        }
    }
    for (let i = 0; i < scheduleWrapper.length; i++) {
        let time = scheduleWrapper[i].querySelector('input').value;
        if(time.trim() === ""){
            errors.push('It seems like there is a blank field on your schedule field.');
            break;
        }
    }
    let liTags = [];
    for (let i = 0; i<errors.length; i++){
        let liTag = document.createElement('LI');
        liTag.textContent = '• '+errors[i];
        liTags.push(liTag);
    }
    for(let i = 0 ; i<liTags.length; i++){
        errorWrapper.append(liTags[i]);
    }
    errorWrapper.style.display = 'block';
    scrollToTop();
    resetSaveBttn();
}
function isArrayTheSame(arr1, arr2){
    if(arr1.length === arr2.length){
        for(let i = 0; i<arr1.length; i++){
            if((arr1[i][0] !== arr2[i][0]) || (arr1[i][1] !== arr2[i][1])){
                return false;
            }
        }
        return true;
    }
    return false;
}
function getLatestValues(result){
    classroomOrigValues[0].classroom_name = result.classroom_name;
    classroomOrigValues[0].classroom_section = result.classroom_section;
    classroomOrigValues[0].classroom_description = result.classroom_description;
    classroomOrigValues[0].classroom_unique_url = result.classroom_unique_url;
    classroomOrigValues[0].can_student_download = result.can_student_download;
    classroomOrigValues[0].can_student_post = result.can_student_post;
    classroomOrigValues[0].can_student_join = result.can_student_join;
    classroomOrigValues[0].is_classroom_active = result.is_classroom_active;
    let schedules = [];
    let scheduleLength = Object.keys(result.classroom_schedule).length;
    test = result;
    for (let i = 0; i<scheduleLength; i++){
        let day = result.classroom_schedule[i][0],
            time = result.classroom_schedule[i][1];
        schedules.push([day, time]);
    }
    classroomOrigValues[0].classroom_schedule = schedules;
}
function changeScheduleWrapperContent(){
    sName.textContent = classroomOrigValues[0].classroom_name;
    sSection.textContent = classroomOrigValues[0].classroom_section;
    sDescription.textContent = classroomOrigValues[0].classroom_description;
    sCode.textContent = classroomOrigValues[0].class_code;

    if(classroomOrigValues[0].is_classroom_active){
        scheduleActiveStatus.classList.remove('schedule--active');

    }else{
        scheduleActiveStatus.classList.add('schedule--active');
    }
    let schedWrapperLength = sSchedule.childElementCount;
    for(let i = schedWrapperLength - 1; i >= 0 ; i--){
        sSchedule.children[i].remove();
    }

    let scheduleLength = classroomOrigValues[0].classroom_schedule.length;
    for(let i = 0; i<scheduleLength; i++){
        let pTag = document.createElement('P');
        pTag.classList.add('schedule__default-sched');
        pTag.textContent = classroomOrigValues[0].classroom_schedule[i][0] + " ( " +classroomOrigValues[0].classroom_schedule[0][1] +" )";
        sSchedule.append(pTag);
    }
}
//DOM
function hideElement(el) {
    el.style.display = 'none';
}
function showElement(el) {
    el.style.display = 'block';
}
function addClass(el, cl) {
    el.classList.add(cl);
}
function resetErrors(){
    let childCount = errorWrapper.childElementCount;
    if(childCount !== 0){
        for(let i = childCount-1; i>=0; i--){
            console.log(i);
            errorWrapper.children[i].remove();
        }
    }
    somethingWentWrongTxt.style.display = 'none';
    errorWrapper.style.display = 'none';
}
function turnoffAllSwitch() {
    toggleSwitchNote(switchBttn3, switchBttn3TurnOn, switchBttn3TurnOff);
    toggleSwitchNote(switchBttn2, switchBttn2TurnOn, switchBttn2TurnOff);
    toggleSwitchNote(switchBttn1, switchBttn1TurnOn, switchBttn1TurnOff);
    switchBttn3.classList.remove('switch--active');
    switchBttn2.classList.remove('switch--active');
    switchBttn1.classList.remove('switch--active');
    canDownload = 0;
    canRequest = 0;
    canPost = 0;
    isActive = 0;
}
function makeScheduleForm(el) {
    //PARENT WRAPPER
    let scheduleWrapper = document.createElement('DIV');
    addClass(scheduleWrapper, 'form--secondary__schedule-wrapper');
    //LEFT
    let dateWrapper = document.createElement('DIV'),
        dayLabel = document.createElement('LABEL'),
        daySelect = document.createElement('SELECT');
    addClass(dateWrapper, 'date--wrapper');
    addClass(dayLabel, 'form--secondary__day-label');
    dayLabel.textContent = 'Select a day:';
    populateOption(daySelect);

    //RIGHT
    let rightWrapper = document.createElement('DIV');
    addClass(rightWrapper, 'form--secondary__group');

    let rightLabel = document.createElement('LABEL');
    addClass(rightLabel, 'form--secondary__day-label');
    rightLabel.textContent = 'Place here your preferred time:';

    let timeWrapper = document.createElement('DIV');
    addClass(timeWrapper, 'time-wrapper');

    let timeInput = document.createElement('INPUT');
    timeInput.setAttribute('type', 'text');
    timeInput.setAttribute('placeholder', 'Ex. 7:00 AM - 7:00 PM');
    addClass(timeInput, 'date-input');


    dateWrapper.append(dayLabel);
    dateWrapper.append(daySelect);

    timeWrapper.append(timeInput);
    rightWrapper.append(rightLabel);
    rightWrapper.append(timeWrapper);

    scheduleWrapper.append(dateWrapper);
    scheduleWrapper.append(rightWrapper);
    el.parentNode.before(scheduleWrapper);
}
function resetScheduleForm() {
    let child = document.querySelector('.classroom-settings__schedule-bttn-controls');
    let parent = child.parentNode;
    for (let i = childCtr; i >= 0; i--) {
        parent.children[i].remove();
    }
    childCtr = classroomOrigValues[0].classroom_schedule.length - 1;
    for (let i = 0; i < classroomOrigValues[0].classroom_schedule.length; i++) {
        resetDisplayForms(child, classroomOrigValues[0].classroom_schedule[i][0], classroomOrigValues[0].classroom_schedule[i][1]);
    }
}
function populateOption(el, txt) {
    let weekday = [];
    weekday[0] = "Monday";
    weekday[1] = "Tuesday";
    weekday[2] = "Wednesday";
    weekday[3] = "Thursday";
    weekday[4] = "Friday";
    weekday[5] = "Saturday";
    weekday[6] = "Sunday";
    for (let i = 0; i < weekday.length; i++) {
        let opt = document.createElement('OPTION');
        opt.setAttribute('value', weekday[i]);
        opt.textContent = weekday[i];
        if (weekday[i] === txt) {
            opt.selected = true;
        }
        el.append(opt);
    }
}
function validateForm() {
    resetErrors();
    successTxt.style.display = 'none';
    let crName = classroomNameTxt.value,
        crSection = classroomSectionTxt.value,
        crDescription = classroomDescriptionTxt.value,
        crCode = codeTxt.value,
        crUrl = classroomOrigValues[0].classroom_unique_url;
    let scheduleWrapper = document.querySelectorAll('.form--secondary__schedule-wrapper');
    let schedule = [];
    let downloadStatus = canDownload,
        requestStatus = canRequest,
        postStatus = canPost,
        activeStatus = isActive;
    for (let i = 0; i < scheduleWrapper.length; i++) {
        let day = scheduleWrapper[i].querySelector('select').value,
            time = scheduleWrapper[i].querySelector('input').value;
        if (day.trim() !== "" && time.trim() !== "") {
            schedule.push([day, time]);
        }
    }
    //VALIDATION STARTS HERE
    if (crName.trim() != "" && crSection.trim() != "" && crDescription.trim() != "" && crCode.trim() != "" && crUrl.trim() !== "" && crCode.trim() != "" && crCode.length >= 6 && schedule.length === scheduleWrapper.length && (downloadStatus <= 1 && downloadStatus >= 0) && (requestStatus <= 1 && requestStatus >= 0) && (postStatus <= 1 && postStatus >= 0) && (activeStatus <= 1 && activeStatus >= 0)) {
        let body = {
            classroom_name: crName,
            classroom_section: crSection,
            classroom_description: crDescription,
            class_code: crCode,
            classroom_schedule: schedule,
            can_student_download: downloadStatus,
            can_student_join: requestStatus,
            can_student_post: postStatus,
            is_classroom_active: activeStatus,
            classroom_unique_url: crUrl
        }
        updateClassroom(body);
    } else {
        if(crCode.length >= 6 && schedule.length === scheduleWrapper.length){
            checkCode(crCode);
        }else{
            displayErrors(false);
        }

    }

}
function scrollToTop(){
    let scroll = new SmoothScroll();
    let options = { speed: 1000, easing: 'easeOutQuart' };
    scroll.animateScroll(0,classroomSettingsWrapper, options);
}
function resetSaveBttn(){
    saveBttn.disabled = false;
    saveBttn.classList.remove('classroom-settings__loading-bttn');
    saveBttn.textContent = 'Save changes';
}
//FETCH
function updateClassroom(obj){
    let url = '/teacher/update-classroom';
    let jsonData = JSON.stringify(obj);
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
            let result = JSON.parse(body);
            if(result.success){
                getLatestValues(result.items);
                changeScheduleWrapperContent();
                successTxt.style.display = 'block';
                scrollToTop();
            }else {
                if (result.reason) {
                    displayErrors(true);
                } else {
                    somethingWentWrongTxt.style.display = 'block';
                }
                scrollToTop();
            }
            resetSaveBttn();
        })
        .catch(error=>{
            console.log(error);
        });
}
function checkCode(code){
    let url = '/teacher/check-classroomCode';
    let jsonData = JSON.stringify({inputCode: code, inputUrl: classroomOrigValues[0].classroom_unique_url});
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
            let result = JSON.parse(body);
            if(result.success){
                displayErrors(false);
            }else{
                displayErrors(true);
            }
        })
        .catch(error=>{
            console.log(error);
        });
}
