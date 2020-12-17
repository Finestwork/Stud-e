let addScheduleBttn = document.getElementById('addScheduleBttn'),
    removeScheduleBttn = document.getElementById('removeScheduleBttn'),
    submitBttn = document.querySelector('.form--secondary__bttn'),
    closePanelBttn = document.querySelector('.js-close-panel');

let childCtr = 0;
let warningTxt = document.querySelector('.form--secondary__warning-txt');

let bttnCreate = document.querySelector('.banner__bttn--create');
let createPanel = document.querySelector('.create-classroom');

let warningWentWrongTxt  = document.querySelector('.js-warning-wrong'),
    warningCodeTxt = document.querySelector('.js-warning-code');

addScheduleBttn.addEventListener('click', function(e){
    childCtr++;
    removeScheduleBttn.style.display = 'inline';
    displayElement(e.currentTarget);
});
removeScheduleBttn.addEventListener('click', function(){
    let wrapper = document.querySelectorAll('.form--secondary__schedule-wrapper');
    wrapper[childCtr].remove();
    childCtr--;
    if(childCtr === 0){
        removeScheduleBttn.style.display = 'none';
    }
});
submitBttn.addEventListener('click', function(){
    warningWentWrongTxt.style.display = 'none';
    warningCodeTxt.style.display = 'none';
    this.classList.add('loading');
    this.disabled = true;
    let schedule = [];
    let classRoomname = document.getElementById('classnameTxt'),
        classSection = document.getElementById('sectionTxt'),
        classDescription = document.getElementById('descriptionTxt'),
        classCode = document.getElementById('codeTxt');

        let scheduleItems = document.querySelectorAll('.form--secondary__schedule-wrapper');

        for(let i = 0; i <scheduleItems.length; i++){
            let day = scheduleItems[i].children[0].children[1].value;
            let time = scheduleItems[i].children[1].children[1].children[0].value;
            if(!isStringEmpty(time)){
                schedule.push([day, time]);
            }
        }
        if(isStringEmpty(classRoomname.value) && isStringEmpty(classSection.value) && isStringEmpty(classDescription.value) && isStringEmpty(classCode.value) && schedule.length === 0){
            this.classList.remove('loading');
            this.disabled = false;
            warningTxt.style.display = 'block';
            scrollToError();
        }else{
            warningTxt.style.display = 'none';
            let obj = {
                crName: classRoomname.value,
                crSection: classSection.value,
                crDescription: classDescription.value,
                crCode: classCode.value,
                crSchedule: schedule
            }
            postData(obj);
        }

});
bttnCreate.addEventListener('click', function(){
    createPanel.classList.remove('show-create-panel');
});
closePanelBttn.addEventListener('click', function(){
    createPanel.classList.add('show-create-panel');
});
function displayElement(el){
    //PARENT WRAPPER
    let scheduleWrapper = document.createElement('DIV');
    addClass(scheduleWrapper, 'form--secondary__schedule-wrapper');
    scheduleWrapper.classList.add('form--secondary__schedule-wrapper');
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
    addClass(timeInput,'date-input');



    dateWrapper.append(dayLabel);
    dateWrapper.append(daySelect);

    timeWrapper.append(timeInput);
    rightWrapper.append(rightLabel);
    rightWrapper.append(timeWrapper);

    scheduleWrapper.append(dateWrapper);
    scheduleWrapper.append(rightWrapper);
    el.before(scheduleWrapper);
}
function populateOption(el){
    let weekday = [];
    weekday[0]="Monday";
    weekday[1]="Tuesday";
    weekday[2]="Wednesday";
    weekday[3]="Thursday";
    weekday[4]="Friday";
    weekday[5]="Saturday";
    weekday[6]="Sunday";
    for (let i = 0; i < weekday.length; i++){
        let opt = document.createElement('OPTION');
        opt.setAttribute('value', weekday[i]);
        opt.textContent = weekday[i];
        el.append(opt);
    }
}
function addClass(el, cl){
    el.classList.add(cl);
}
function postData(obj){
    let url = '/teacher/create-classroom';
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
            if(body === 'true'){
                location.reload();
            }else{
                if(body === '\"Code does exist\"'){
                    warningCodeTxt.style.display = 'block';
                }else{
                    warningWentWrongTxt.style.display = 'block';
                    scrollToError();
                }
                submitBttn.classList.remove('loading');
                submitBttn.disabled = false;
            }
        })
        .catch(error=>{
            console.log(error);
        });
}
function scrollToError(){
    let scroll = new SmoothScroll();
    let element = document.querySelector('.create-classroom')
    let options = { speed: 2000, easing: 'easeOutQuart' , offset: 20};
    setTimeout(function(){
        scroll.animateScroll(element,element, options);
    },250);
}
