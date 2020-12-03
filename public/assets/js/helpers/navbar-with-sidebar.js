//NAVBAR
let profileBox = document.getElementById('profileBox'),
    notifBox = document.getElementById('notifBox'),
    mssgBox = document.getElementById('mssgBox');

let formSearchToggleBttn = document.getElementById('formSearchToggleBttn');
let formWrapper = document.querySelector('.navbar--mid__form-wrapper');

let notifItemScrollbar = document.getElementById('notifItemScrollbar'),
    mssgItemScrollbar = document.getElementById('mssgItemScrollbar');
let navbarHambugerBttn = document.getElementById('navbarHambugerBttn');


scrollBar(notifItemScrollbar, notifItemScrollbar, true);
scrollBar(mssgItemScrollbar, mssgItemScrollbar, true);
let mainContent = document.querySelector('.main-content');
navbarHambugerBttn.addEventListener('click', function(){
    if(window.innerWidth < 1024){
        if(bttnCtr === 0 ){
            drawer.classList.add('fixed-bg--active');
            bttnCtr++;
        }else{
            drawer.classList.remove('fixed-bg--active');
            bttnCtr = 0;
        }
    }else if(window.innerWidth >= 1024) {
        if(bttnCtr === 0){
            sidebar.classList.add('sidebar--md');
            mainContent.classList.add('main-content--md');
            sidebar.classList.remove('sidebar');
            bttnCtr++;

        }else{
            sidebar.classList.add('sidebar');
            mainContent.classList.remove('main-content--md');
            sidebar.classList.remove('sidebar--md');
            bttnCtr = 0;
        }
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

//SIDEBAR
let drawer = document.querySelector('.fixed-bg');
let bttnCtr = 0, formCtr = 0;
let sidebar = document.getElementById('sidebar'),
    sidebarScrollbar = document.getElementById('scrollBar');
let fixedScrollbar = document.getElementById('fixedScrollbar'),
    fixedSidebar = document.getElementById('fixedSidebar');
scrollBar(fixedScrollbar, fixedSidebar, false);
scrollBar(sidebarScrollbar, sidebar, false);

drawer.addEventListener('click', function(e){
    if(e.target.classList[0] === "fixed-bg"){
        this.classList.remove('fixed-bg--active');
        bttnCtr = 0;
    }
});
//Window
let windowFunc = function(){

    imgChecker.imgLoader(mssgItemScrollbar);
    imgChecker.imgLoader(notifItemScrollbar);
}
//NEXT TRACK WHEN SIDEBAR MD IS TRIGGERED
let windowReisze = function(){
    if(window.innerWidth >= 1024){
        drawer.classList.remove('fixed-bg--active');
    }
    bttnCtr = 0;
    if(window.innerWidth < 810){
        formWrapper.setAttribute('style', '');
        formCtr = 0;
        formSearchToggleBttn.classList.remove('toggle--active');
    }
}
window.onresize = windowReisze;
window.onload = windowFunc;
