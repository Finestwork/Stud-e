let moduleTopBttn = document.querySelectorAll('.modules__list-top');
let imgs = document.querySelectorAll('.modules__img');

let links = [], ids = [];

if(imgs){
    imgs.forEach(el =>{
        el.addEventListener('click', galleryMaker);
    })
}
if(moduleTopBttn){
    moduleTopBttn.forEach(el=>{
        el.addEventListener('click', showModuleBottomPart);
    });
}

//HELPERS
function showModuleBottomPart(e){
    let parent = e.currentTarget.parentNode;
    parent.classList.toggle('module-card--active');
}



//GENERATE
function galleryMaker(e){
    e.preventDefault();
    let pswpElement = document.querySelectorAll('.pswp')[0];
    let parent = e.currentTarget.parentNode,
        imgs = parent.querySelectorAll('.modules__img'),
        index = Array.from(parent.children).indexOf(e.currentTarget);
    let imgArr = [];
    for(let i = 0; i<imgs.length; i++){
        let data = {
            src: imgs[i].getAttribute('href'),
            w: 600,
            h: 600
        }
        imgArr.push(data);
    }
    let options = {
        index: index,
        shareEl: false,
    };

    let gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, imgArr, options);
    gallery.init();
}

(function audio(){
    let audioPlayers = document.querySelectorAll('.audio-player');
    audioPlayers.forEach(el=>{
        new GreenAudioPlayer(el);
        GreenAudioPlayer.init({
            selector: '.player',
            stopOthersOnPlay: true
        });
    });
})();

