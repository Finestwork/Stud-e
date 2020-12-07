//NAVBAR
let profileBox = document.getElementById('profileBox'),
    notifBox = document.getElementById('notifBox'),
    mssgBox = document.getElementById('mssgBox');

let formSearchToggleBttn = document.getElementById('formSearchToggleBttn');
let formWrapper = document.querySelector('.navbar--mid__form-wrapper');

let notifItemScrollbar = document.getElementById('notifItemScrollbar'),
    mssgItemScrollbar = document.getElementById('mssgItemScrollbar');
let navbarHambugerBttn = document.getElementById('navbarHambugerBttn');

//SIDEBAR
let drawer = document.querySelector('.fixed-bg');
let bttnCtr = 0, formCtr = 0;
let fixedScrollbar = document.getElementById('fixedScrollbar'),
    fixedSidebar = document.getElementById('fixedSidebar');

scrollBar(fixedScrollbar, fixedSidebar, false);
scrollBar(notifItemScrollbar, notifItemScrollbar, true);
scrollBar(mssgItemScrollbar, mssgItemScrollbar, true);


drawer.addEventListener('click', function(e){
    if(e.target.classList[0] === "fixed-bg"){
        this.classList.remove('fixed-bg--active');
        bttnCtr = 0;
    }
});
navbarHambugerBttn.addEventListener('click', function(){
    if(bttnCtr === 0 ){
        drawer.classList.add('fixed-bg--active');
        bttnCtr++;
    }else{
        drawer.classList.remove('fixed-bg--active');
        bttnCtr = 0;
    }
});
formSearchToggleBttn.addEventListener('click', function(e){
    e.stopPropagation();
    if(formCtr === 0){
        formWrapper.style.display = 'block';
        formSearchToggleBttn.classList.add('toggle--active');
        formCtr++;
    }else{
        formWrapper.style.display = 'none';
        formCtr = 0;
        formSearchToggleBttn.classList.remove('toggle--active');
    }
});
profileBox.addEventListener('click', function(e){
    notifBox.classList.remove('notif-box--active');
    mssgBox.classList.remove('mssg-box--active');
    this.classList.toggle('profile-box--active');
});
notifBox.addEventListener('click', function(e){
    profileBox.classList.remove('profile-box--active');
    mssgBox.classList.remove('mssg-box--active');

    let notifItemWrapper = document.getElementById('notifItemWrapper');
    if(!notifItemWrapper.contains(e.target) && e.currentTarget.classList.contains('notif-box--active')){
        this.classList.remove('notif-box--active');
    }else{
        this.classList.add('notif-box--active');
    }

});
mssgBox.addEventListener('click', function(e){
    profileBox.classList.remove('profile-box--active');
    notifBox.classList.remove('notif-box--active');

    let mssgItemWrapper = document.getElementById('mssgItemWrapper');
    if(!mssgItemWrapper.contains(e.target) && e.currentTarget.classList.contains('mssg-box--active')){
        this.classList.remove('mssg-box--active');
    }else{
        this.classList.add('mssg-box--active');
    }

});
document.addEventListener('click', function(e){
    if(!mssgBox.contains(e.target)){
        mssgBox.classList.remove('mssg-box--active');
    }
    if(!notifBox.contains(e.target)){
        notifBox.classList.remove('notif-box--active');
    }
    if(!profileBox.contains(e.target)){
        profileBox.classList.remove('profile-box--active');
    }
    if(window.innerWidth < 810){
        formWrapper.style.display = 'none';
        formCtr = 0;
        formSearchToggleBttn.classList.remove('toggle--active');
    }
});
//Window
let windowFunc = function(){
    imgChecker.imgLoader(mssgItemScrollbar);
    imgChecker.imgLoader(notifItemScrollbar);
}
window.onload = windowFunc;
