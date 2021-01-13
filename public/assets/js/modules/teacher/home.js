let teachersNoteScrollbar = document.getElementById('teachersNoteScrollbar'),
    enrolledSubjectsScrollbar = document.querySelector('.enrolled-subjects-scrollbar'),
    teachersScrollbar = document.querySelector('.teachers__scrollbar');
scrollBar(teachersNoteScrollbar, teachersNoteScrollbar, true);
scrollBar(enrolledSubjectsScrollbar, enrolledSubjectsScrollbar, true);
imgChecker.imgLoader(teachersNoteScrollbar);

let scheduleItemWrapper = document.querySelector('.schedule__item-wrapper');
(function fillSchedule(){
    let days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'][new Date().getDay()];
    let isDayFound = false;
    if(classrooms.length !== 0){
        for(let i = 0; i<classrooms.length; i++){
            let parsedSchedule = JSON.parse(classrooms[i].classroom_schedule);
            for(let k = 0; k < parsedSchedule.length; k++){
                if(days === parsedSchedule[k][0].toLowerCase()){
                    let liTag = document.createElement('LI'),
                        aTag = document.createElement('A'),
                        subject = document.createElement('SPAN'),
                        day = document.createElement('SPAN'),
                        time = document.createElement('SPAN');
                    isDayFound = true;

                    liTag.classList.add('schedule__item');
                    aTag.classList.add('schedule__item-link');
                    aTag.setAttribute('href','/schedules/'+classrooms[i].classroom_unique_url);
                    subject.classList.add('schedule__item-subject');
                    day.classList.add('schedule__item-day');
                    time.classList.add('schedule__item-tim');

                    subject.textContent = classrooms[i].classroom_name;
                    for(let ctr = 0; ctr<parsedSchedule.length; ctr++){
                        if(parsedSchedule.length - 1 !== parsedSchedule.indexOf(parsedSchedule[ctr[0]])){
                            day.textContent += parsedSchedule[ctr][0] + ' / ';
                            time.textContent += parsedSchedule[ctr][1] + ' / ';

                        }else{
                            day.textContent += parsedSchedule[ctr][0];
                            time.textContent += parsedSchedule[ctr][1];
                        }
                    }
                }
            }
        }
        if(!isDayFound){
            let pTag = document.createElement('p');
            pTag.classList.add('schedule__no-classes');
            pTag.textContent = 'No classes for today.';
            scheduleItemWrapper.append(pTag);
        }
    }else{
        let pTag = document.createElement('p');
        pTag.classList.add('schedule__no-classes');
        pTag.textContent = 'No classes for today.';
        scheduleItemWrapper.append(pTag);
    }
})();





