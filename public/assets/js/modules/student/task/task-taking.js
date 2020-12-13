let date = new Date();
let timer = date.setTime(date.getTime() + 20*60*1000);

function getTimeRemaining(endtime){
    const total = endtime - Date.now();
    const seconds = clockFormat(Math.round((total % (1000 * 60)) / 1000));
    const minutes = clockFormat(Math.floor((total % (1000 * 60 * 60)) / (1000 * 60)));
    return {
        seconds,
        minutes
    };
}
let timerHtml = document.querySelector('.question__timer');
callTimer();
function callTimer(){
    let time = getTimeRemaining(timer);
    let seconds = parseInt(time.seconds);
    let minutes = parseInt(time.minutes);
    if(minutes === 0 && seconds === 0){
        timerHtml.textContent = 'Timer: 00:00';
        alert('Times up!');
    }else{
        timerHtml.textContent = 'Timer: '+time.minutes+':'+time.seconds;
        setTimeout(function(){
            callTimer();
        }, 1000);
    }
}
function clockFormat(time){
    if(time < 10){
        return "0"+time;
    }else{
        return time.toString();
    }
}
let cheatCtr = 0;
let cheatHtml = document.querySelector('.question__cheating-attempt');
window.addEventListener('visibilitychange', function(){
   if(document.hidden){
       //During cheating attempt
   } else{
       if(cheatCtr !== 3){
           cheatHtml.classList.add('attention-seeker');
           cheatCtr++;
           cheatHtml.textContent = 'Cheating attempt: '+cheatCtr+'/3';
           setTimeout(function(){
               cheatHtml.classList.remove('attention-seeker');
           },1000);
           if(cheatCtr === 2){
               cheatHtml.style.color = '#ff5656'
           }
       }
   }
});
