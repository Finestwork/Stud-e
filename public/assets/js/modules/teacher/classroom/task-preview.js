let previewBttn = document.querySelector('.js-view-bttn'),
    previewCloseBttn = document.querySelector('.preview__close-bttn');

let previewWrapper = document.getElementById('preview-wrapper');

previewBttn.addEventListener('click', e=>{
    document.documentElement.style.overflowY = 'hidden';
    previewAllQuestions();
    previewWrapper.style.display = 'block';
    previewWrapper.classList.add('zoomIn');
   setTimeout(()=>{
       previewWrapper.classList.remove('zoomIn');
   }, 1000);
});
previewCloseBttn.addEventListener('click', e=>{
   previewWrapper.classList.add('zoomOutDown');
    document.documentElement.style.overflowY = null;
    previewWrapper.querySelector('.question__list-wrapper').remove();
   setTimeout(()=>{
       previewWrapper.classList.remove('zoomOutDown');
       previewWrapper.style.display = null;
   }, 800);
});

function previewAllQuestions(){
    let questions = document.querySelectorAll('.task-create__question-maker-panel');
    let olTag = document.createElement('OL');
    olTag.classList.add('question__list-wrapper');
    previewWrapper.children[0].append(olTag);
    for(let i = 0; i <questions.length; i++){
        let type = questions[i].getAttribute('data-question-type');
        if(type === 'fitb'){
            let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
            showFITBQuestion(input, olTag);
        }else if(type === 'la'){
            let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
            showLAQuestion(input, olTag);
        }else if(type === 'ma'){
            let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
            showMAQuestion(input, olTag);
        }else if(type === 'mc'){
            let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
            showMCQuestion(input, olTag);
        }else if(type === 'id'){
            let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
            showIDQuestion(input, olTag);
        }
    }
}


//GENERATE
function showFITBQuestion(input, olTag){
    let strLoc = JSON.parse(input.getAttribute('data-past-value'));
    let fullTxt = input.value, copiedTxt = fullTxt;
    let rootParent = input.parentNode.parentNode.parentNode;
    let clonedImg = rootParent.querySelectorAll('img');
    if(strLoc.length !== 0){
        for(let i = 0; i<strLoc.length; i++){
            if(i === 0){
                copiedTxt = copiedTxt.replace(copiedTxt.substring(strLoc[i][0], strLoc[i][1]), '*');
            }else{
                let currentStrLength = 0;
                for(let k = 1; k<=i; k++){
                    currentStrLength += fullTxt.substring(strLoc[k - 1][0], strLoc[k - 1][1]).length - 1;
                }
                copiedTxt = copiedTxt.replace(copiedTxt.substring(strLoc[i][0] - currentStrLength, strLoc[i][1] - currentStrLength), '*');
            }
        }
        let strArr = copiedTxt.split(/(\*+)/);
        let liTag = document.createElement('LI'),
            pTag = document.createElement('P'),
            attachmentWrapper = document.createElement('DIV'),
            questionNote = document.createElement('P');
        let questionPoints = rootParent.parentNode.querySelector('.task-create__question-how-many-points input[type="number"]').value;
        liTag.classList.add('question__list-item', 'fill-in-the-blank');
        pTag.classList.add('answer-sheet__question');
        attachmentWrapper.classList.add('question__attachment-wrapper');
        questionNote.classList.add('question__note');
        if(parseInt(questionPoints) === 1){
            questionNote.textContent = 'FILL IN THE BLANK ( ' + questionPoints.trim() + ' POINT )';
        }else if(parseInt(questionPoints) > 1){
            questionNote.textContent = 'FILL IN THE BLANK ( '+ questionPoints.trim() + ' POINTS )';
        }
        if(strArr[0] === ""){
            strArr.shift();

        }
        for(let i = 0; i<strArr.length; i++){
            if(strArr[i] === '*'){
                let inputTag = document.createElement('INPUT');
                inputTag.setAttribute('type', 'text');
                inputTag.setAttribute('placeholder', 'Place your answer here');
                pTag.append(inputTag);
            }else{
                let spanTag = document.createElement('SPAN');
                spanTag.textContent = strArr[i];
                pTag.append(spanTag);
            }
        }
        if(clonedImg.length !== 0){
            for(let i = 0; i<clonedImg.length; i++){
                let imgWrapper = document.createElement('DIV');
                imgWrapper.classList.add('question__attachment-img');
                imgWrapper.append(clonedImg[i].cloneNode(true));
                imgWrapper.addEventListener('click', galleryMaker);
                attachmentWrapper.append(imgWrapper);
            }
        }else{
            attachmentWrapper.style.marginTop = '0';
        }
        liTag.append(questionNote, pTag, attachmentWrapper);
        olTag.append(liTag);
    }
}
function showLAQuestion(input, olTag){
    let question = input.value;
    let rootParent = input.parentNode.parentNode.parentNode;
    let clonedImg = rootParent.querySelectorAll('img');
    let liTag = document.createElement('LI'),
        pTag = document.createElement('P'),
        attachmentWrapper = document.createElement('DIV'),
        textArea = document.createElement('TEXTAREA'),
        questionNote = document.createElement('P');

    let questionPoints = rootParent.parentNode.querySelector('.task-create__question-how-many-points input[type="number"]').value;
    questionNote.classList.add('question__note');
    questionNote.style.marginBottom = '10px';
    if(parseInt(questionPoints) === 1){
        questionNote.textContent = 'LONG ANSWER ( ' + questionPoints.trim() + ' POINT )';
    }else if(parseInt(questionPoints) > 1){
        questionNote.textContent = 'LONG ANSWER ( '+ questionPoints.trim() + ' POINTS )';
    }
    pTag.classList.add('question__list-txt');
    pTag.textContent = 'Question: '+ question;
    textArea.classList.add('question__textarea');
    textArea.setAttribute('placeholder', 'Place your answer here');

    attachmentWrapper.classList.add('question__attachment-wrapper');
    if(clonedImg.length !== 0){
        for(let i = 0; i<clonedImg.length; i++){
            let imgWrapper = document.createElement('DIV');
            imgWrapper.classList.add('question__attachment-img');
            imgWrapper.append(clonedImg[i].cloneNode(true));
            imgWrapper.addEventListener('click', galleryMaker);
            attachmentWrapper.append(imgWrapper);
        }
    }else{
        attachmentWrapper.style.marginTop = '0';
    }

    liTag.classList.add('question__list-item');
    liTag.append(questionNote, pTag, textArea, attachmentWrapper);
    olTag.append(liTag);
}
function showMAQuestion(input, olTag){
    let question = input.value;
    let rootParent = input.parentNode.parentNode.parentNode.parentNode;
    let clonedImg = rootParent.querySelectorAll('.task-create__attachment-box img');
    let isTxt = rootParent.querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
    let liTag = document.createElement('LI'),
        pTag = document.createElement('P'),
        attachmentWrapper = document.createElement('DIV'),
        questionNote = document.createElement('P'),
        mainWrapper = document.createElement('DIV');
        mainWrapper.classList.add('question__checkbox-main-wrapper');
    if(isTxt === 'true'){
        let choices = rootParent.querySelectorAll('.task-create__ma-txt-input');
        for(let i = 0; i<choices.length; i++){
            let  checkboxWrapper = document.createElement('DIV'),
                checkbox = document.createElement('INPUT'),
                lbl = document.createElement('LABEL');

            let randomStr = Math.random().toString(36).substring(6);
            checkbox.setAttribute('type', 'checkbox');
            checkbox.setAttribute('id', randomStr);
            lbl.setAttribute('for', randomStr);
            lbl.textContent = choices[i].textContent.trim();
            checkboxWrapper.classList.add('question__checkbox-wrapper');
            checkboxWrapper.append(checkbox, lbl);
            mainWrapper.append(checkboxWrapper);
        }
    }else{
        let choices = rootParent.querySelectorAll('.task-create__ma-choice-wrapper');
        for(let i = 0; i<choices.length; i++){
            let  checkboxWrapper = document.createElement('DIV'),
                checkboxMainWrapper = document.createElement('DIV'),
                checkboxImgWrapper = document.createElement('DIV'),
                checkbox = document.createElement('INPUT'),
                lbl = document.createElement('LABEL');

            checkboxMainWrapper.classList.add('question__img-wrapper');
            checkboxImgWrapper.classList.add('question__img-box');
            let inputValue = choices[i].querySelector('.task-create__ma-checkbox-wrapper input[type="checkbox"]').value;
            let clonedImg = choices[i].querySelector('.task-create__checkbox-img-wrapper img').cloneNode(true);
            checkbox.setAttribute('type', 'checkbox');
            checkbox.setAttribute('id', inputValue+i);
            lbl.setAttribute('for', inputValue+i);
            checkboxWrapper.classList.add('question__checkbox-wrapper');
            checkboxImgWrapper.append(clonedImg);
            checkboxWrapper.append(checkbox, lbl);
            checkboxMainWrapper.append(checkboxWrapper, checkboxImgWrapper);
            mainWrapper.append(checkboxMainWrapper);
            checkboxImgWrapper.addEventListener('click', e=>{
                e.preventDefault();
                let pswpElement = document.querySelectorAll('.pswp')[0];
                let parent = e.currentTarget.parentNode.parentNode,
                    imgs = parent.querySelectorAll('img'),
                    index = Array.from(parent.children).indexOf(e.currentTarget.parentNode);
                let imgArr = [];
                for(let i = 0; i<imgs.length; i++){
                    let data = {
                        src: imgs[i].getAttribute('src'),
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
            });
        }
    }
    let questionPoints = rootParent.querySelector('.task-create__question-how-many-points input[type="number"]').value;
    questionNote.classList.add('question__note');
    questionNote.style.marginBottom = '10px';
    if(parseInt(questionPoints) === 1){
        questionNote.textContent = 'MULTIPLE ANSWER ( ' + questionPoints.trim() + ' POINT )';
    }else if(parseInt(questionPoints) > 1){
        questionNote.textContent = 'MULTIPLE ANSWER ( '+ questionPoints.trim() + ' POINTS )';
    }
    pTag.classList.add('question__list-txt');
    pTag.textContent = 'Question: '+ question;
    attachmentWrapper.classList.add('question__attachment-wrapper');
    if(clonedImg.length !== 0){
        for(let i = 0; i<clonedImg.length; i++){
            let imgWrapper = document.createElement('DIV');
            imgWrapper.classList.add('question__attachment-img');
            imgWrapper.append(clonedImg[i].cloneNode(true));
            imgWrapper.addEventListener('click', galleryMaker);
            attachmentWrapper.append(imgWrapper);
        }
    }else{
        attachmentWrapper.style.marginTop = '0';
    }
    liTag.classList.add('question__list-item');
    liTag.append(questionNote, pTag, mainWrapper, attachmentWrapper);
    olTag.append(liTag);
}
function showMCQuestion(input, olTag){
    let question = input.value;
    let rootParent = input.parentNode.parentNode.parentNode.parentNode;
    let clonedImg = rootParent.querySelectorAll('.task-create__attachment-box img');
    let isTxt = rootParent.querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
    let liTag = document.createElement('LI'),
        pTag = document.createElement('P'),
        attachmentWrapper = document.createElement('DIV'),
        questionNote = document.createElement('P'),
        mainWrapper = document.createElement('DIV');
    mainWrapper.classList.add('question__radio-bttn-group');
    let randomStr = Math.random().toString(36).substring(6);
    if(isTxt === 'true'){
        let choices = rootParent.querySelectorAll('.task-create__mc-txt-input');
        let choiceMark = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        for(let i = 0; i<choices.length; i++){
            let  radioBttnGroup = document.createElement('DIV'),
                radioBttn = document.createElement('INPUT'),
                lbl = document.createElement('LABEL');

            radioBttn.setAttribute('type', 'radio');
            radioBttn.setAttribute('id', randomStr+i);
            radioBttn.setAttribute('name', randomStr);
            lbl.setAttribute('for', randomStr+i);
            lbl.textContent = choiceMark[i] + '. ' +choices[i].textContent.trim();
            radioBttnGroup.classList.add('question__radio-bttn');
            radioBttnGroup.append(radioBttn, lbl);
            mainWrapper.append(radioBttnGroup);
        }
    }else{
        let choices = rootParent.querySelectorAll('.task-create__mc-choice-wrapper');
        for(let i = 0; i<choices.length; i++){
            let  checkboxWrapper = document.createElement('DIV'),
                checkboxMainWrapper = document.createElement('DIV'),
                checkboxImgWrapper = document.createElement('DIV'),
                radiobttn = document.createElement('INPUT'),
                lbl = document.createElement('LABEL');

            checkboxMainWrapper.classList.add('question__img-wrapper', 'img-adjust-mc');
            checkboxImgWrapper.classList.add('question__img-box');
            let inputValue = choices[i].querySelector('.task-create__mc-checkbox-wrapper input[type="radio"]').value;
            let clonedImg = choices[i].querySelector('.task-create__checkbox-img-wrapper img').cloneNode(true);
            radiobttn.setAttribute('type', 'radio');
            radiobttn.setAttribute('id', inputValue+i);
            lbl.setAttribute('for', inputValue+i);
            checkboxWrapper.classList.add('question__radio-bttn');
            checkboxWrapper.style.marginRight = '0';
            checkboxImgWrapper.append(clonedImg);
            checkboxWrapper.append(radiobttn, lbl);
            checkboxMainWrapper.append(checkboxWrapper, checkboxImgWrapper);
            mainWrapper.append(checkboxMainWrapper);
            checkboxImgWrapper.addEventListener('click', e=>{
                e.preventDefault();
                let pswpElement = document.querySelectorAll('.pswp')[0];
                let parent = e.currentTarget.parentNode.parentNode,
                    imgs = parent.querySelectorAll('img'),
                    index = Array.from(parent.children).indexOf(e.currentTarget.parentNode);
                let imgArr = [];
                for(let i = 0; i<imgs.length; i++){
                    let data = {
                        src: imgs[i].getAttribute('src'),
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
            });
        }
    }
    let questionPoints = rootParent.querySelector('.task-create__question-how-many-points input[type="number"]').value;
    questionNote.classList.add('question__note');
    questionNote.style.marginBottom = '10px';
    if(parseInt(questionPoints) === 1){
        questionNote.textContent = 'MULTIPLE CHOICE ( ' + questionPoints.trim() + ' POINT )';
    }else if(parseInt(questionPoints) > 1){
        questionNote.textContent = 'MULTIPLE CHOICE ( '+ questionPoints.trim() + ' POINTS )';
    }
    pTag.classList.add('question__list-txt');
    pTag.textContent = 'Question: '+ question;
    attachmentWrapper.classList.add('question__attachment-wrapper');
    if(clonedImg.length !== 0){
        for(let i = 0; i<clonedImg.length; i++){
            let imgWrapper = document.createElement('DIV');
            imgWrapper.classList.add('question__attachment-img');
            imgWrapper.append(clonedImg[i].cloneNode(true));
            imgWrapper.addEventListener('click', galleryMaker);
            attachmentWrapper.append(imgWrapper);
        }
    }else{
        attachmentWrapper.style.marginTop = '0';
    }
    liTag.classList.add('question__list-item');
    liTag.append(questionNote, pTag, mainWrapper, attachmentWrapper);
    olTag.append(liTag);
}
function showIDQuestion(input, olTag){
    let question = input.value;
    let rootParent = input.parentNode.parentNode.parentNode.parentNode;
    let clonedImg = rootParent.querySelectorAll('.task-create__attachment-box img');
    let questionPoints = rootParent.querySelector('.task-create__question-how-many-points input[type="number"]').value;
    let liTag = document.createElement('LI'),
        pTag = document.createElement('P'),
        attachmentWrapper = document.createElement('DIV'),
        questionNote = document.createElement('P'),
        mainWrapper = document.createElement('DIV'),
        inputTag = document.createElement('INPUT');

    mainWrapper.classList.add('question__id');
    inputTag.setAttribute('type', 'text');
    inputTag.setAttribute('placeholder', 'Place your answer here');
    mainWrapper.append(inputTag);
    questionNote.classList.add('question__note');
    questionNote.style.marginBottom = '10px';
    if(parseInt(questionPoints) === 1){
        questionNote.textContent = 'IDENTIFICATION ( ' + questionPoints.trim() + ' POINT )';
    }else if(parseInt(questionPoints) > 1){
        questionNote.textContent = 'IDENTIFICATION ( '+ questionPoints.trim() + ' POINTS )';
    }
    pTag.classList.add('question__list-txt');
    pTag.textContent = 'Question: '+ question;
    attachmentWrapper.classList.add('question__attachment-wrapper');
    if(clonedImg.length !== 0){
        for(let i = 0; i<clonedImg.length; i++){
            let imgWrapper = document.createElement('DIV');
            imgWrapper.classList.add('question__attachment-img');
            imgWrapper.append(clonedImg[i].cloneNode(true));
            imgWrapper.addEventListener('click', galleryMaker);
            attachmentWrapper.append(imgWrapper);
        }
    }else{
        attachmentWrapper.style.marginTop = '0';
    }
    liTag.classList.add('question__list-item');
    liTag.append(questionNote, pTag, mainWrapper, attachmentWrapper);
    olTag.append(liTag);
}
function galleryMaker(e){
    e.preventDefault();
    let pswpElement = document.querySelectorAll('.pswp')[0];
    let parent = e.currentTarget.parentNode,
        imgs = parent.querySelectorAll('img'),
        index = Array.from(parent.children).indexOf(e.currentTarget);
    let imgArr = [];
    for(let i = 0; i<imgs.length; i++){
        let data = {
            src: imgs[i].getAttribute('src'),
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
















