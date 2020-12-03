let imgChecker = {
    imgLoader: function(wrapper){
        let imgs = wrapper.querySelectorAll('.adjust-img-js');
        imgs.forEach(img =>{
            img.addEventListener('load', this.fitImg(img));
        });
    },
    fitImg: function(img){
        const ratio = img.naturalWidth / img.naturalHeight;
        if(ratio > 1){
            this.imgLandscapeOrSquare(img);
        }else if(ratio < 1){
            this.imgPortrait(img);
        }else{
            this.imgLandscapeOrSquare(img);
        }
    },
    imgLandscapeOrSquare: function(img){
        img.style.height = '100%';
    },
    imgPortrait: function(img){
        img.style.width = '100%';
    }
}


