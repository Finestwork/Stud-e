let hamburgerBttn = document.getElementById('hamburgerBttn'),
    hamburgerCollapse = document.getElementById('hamburgerCollapse'),
    headerNav = document.getElementById('headerNav');

let links = document.querySelectorAll('.ghost--header__nav-link'),
    targetDivs = [], totalDivs = 0;

let smoothScroll = new scrollToSmooth('.ghost--header__nav-link', {
    targetAttribute: 'href',
    duration: 1000,
    easing: 'easeOutQuad',
    fixedHeader: '.ghost--header__nav',
});
smoothScroll.init();

getActiveSections();

//Click Events
hamburgerBttn.addEventListener('click', function(e){
    this.classList.toggle('hamburger-bttn--active');
    if(this.classList.contains('hamburger-bttn--active')){
        hamburgerCollapse.classList.add('collapse--active');
        headerNav.classList.add('ghost--header__nav--active');
    }else{
        hamburgerCollapse.classList.remove('collapse--active');
        headerNav.classList.remove('ghost--header__nav--active');
    }
});
hamburgerCollapse.addEventListener('click', function(e){
   if(e.target.tagName === 'A'){
       removeNavClasses();
   }
}, true);

// Change Active Link Through Scroll
function getActiveSections(){
    for(let i = 0; i<links.length - 1; i++){
        targetDivs.push(document.querySelector(links[i].getAttribute('href')));
    }
    totalDivs = targetDivs.length;
}
function changeActiveLink(){
    let scrollPosition = document.documentElement.scrollTop;
    for(let i = 0; i < totalDivs; i++){
        if(scrollPosition >= targetDivs[i].offsetTop
            && scrollPosition < targetDivs[i].offsetTop + targetDivs[i].offsetHeight){
            let id = targetDivs[i].getAttribute('id');
            removeActiveClasses();
            addActiveClass(id)
        }
    }
}
function removeActiveClasses(){
    for(let i = 0; i < links.length; i++){
        links[i].classList.remove('link--active');
    }
}
function addActiveClass(id){
    document.querySelector('[href="#'+ id +'"]').classList.add('link--active');
}

//Custom Functions
function removeNavClasses(){
    hamburgerBttn.classList.remove('hamburger-bttn--active');
    hamburgerCollapse.classList.remove('collapse--active');
    headerNav.classList.remove('ghost--header__nav--active');
}

window.addEventListener('resize', function(e){
    if(document.documentElement.clientWidth > 768){
        removeNavClasses();
    }
});
window.addEventListener('scroll', function(){
    if(window.scrollY > 5){
        headerNav.style.backgroundColor = 'white';
    }else{
        headerNav.style.backgroundColor = 'transparent';
    }
    changeActiveLink();
});
