
let addModuleTitleBttn = document.querySelector('.js-add-title-bttn');
let modulesEmptyWrapper = document.querySelector('.modules__empty'),
    moduleMainWrapper = document.querySelector('.modules__container');

let editTitleBttn = document.querySelectorAll('.js-edit-title'),
    addModuleBttn = document.querySelectorAll('.js-add-modules'),
    closePanelBttn = document.querySelector('.js-close-panel'),
    addLinkBttn = document.querySelector('.js-add-link'),
    publishBttn = document.querySelector('.js-pusblish-bttn');

let moduleTitleTxt = document.getElementById('moduleTitleTxt'),
    moduleDescriptionTxt = document.getElementById('descriptionTxt');
let modulesUploaderMainWrapper = document.querySelector('.modules__controls-container');
let warningBlankTxt = document.querySelector('.js-warning-blank');
let primaryTitleID = null;
let moduleTopBttn = document.querySelectorAll('.modules__list-top');
let imgs = document.querySelectorAll('.modules__img');




if(imgs){
    imgs.forEach(el =>{
        el.addEventListener('click', galleryMaker);
    })
}
if(editTitleBttn){
    editTitleBttn.forEach(el =>{
        el.addEventListener('click', editTitle);
    })
}
if(addModuleBttn){
    addModuleBttn.forEach(el =>{
        el.addEventListener('click', addAModule);
    })
}
if(moduleTopBttn){
    moduleTopBttn.forEach(el=>{
       el.addEventListener('click', showModuleBottomPart);
    });
}
addModuleTitleBttn.addEventListener('click', function(){
    if(modulesEmptyWrapper){
        modulesEmptyWrapper.classList.add('exit-anim-fadeOutDown');
        setTimeout(()=>{
            modulesEmptyWrapper.classList.remove('exit-anim-fadeOutDown');
            modulesEmptyWrapper.style.display = 'none';
            addModuleTitleBttn.style.display = 'none';
            createDivider();
        }, 600);
    }else{
        addModuleTitleBttn.style.display = 'none';
        createDivider();
    }
});
closePanelBttn.addEventListener('click', ()=>{
    modulesUploaderMainWrapper.style.display = 'none';
});
addLinkBttn.addEventListener('click', e=>{
    let child = e.currentTarget.parentNode;
    let inputLinkWrapper = document.createElement('DIV'),
        inputLink = document.createElement('INPUT'),
        bttnLink = document.createElement('BUTTON');

    inputLinkWrapper.classList.add('modules__input-link');
    inputLink.setAttribute('type', 'text');
    inputLink.setAttribute('placeholder', 'Place your link here');
    inputLink.classList.add('modules__link');
    bttnLink.setAttribute('type', 'button');
    bttnLink.classList.add('bttn', 'modules__remove-link', 'js-remove-link');
    bttnLink.textContent = 'Remove this link';
    inputLinkWrapper.append(inputLink);
    inputLinkWrapper.append(bttnLink);
    child.parentNode.insertBefore(inputLinkWrapper, child);

    let removeLinkbttn = document.querySelectorAll('.js-remove-link');
    removeLinkbttn.forEach(el =>{
      el.addEventListener('click', e=>{
          e.currentTarget.parentNode.remove();
      })
    });
});
publishBttn.addEventListener('click', ()=>{
    let moduleTitle = moduleTitleTxt.value,
        moduleDescription = moduleDescriptionTxt.value;
    let modulesDroppedFiles = document.querySelectorAll('.upload-done');
    let links = document.querySelectorAll('.modules__link');
    let audioArr = [], documentArr = [], imgArr = [], pdfArr = [], videoArr = [], linksArr = [];
    for(let i = 0; i<modulesDroppedFiles.length; i++){
        let txt = modulesDroppedFiles[i].getAttribute('data-type');
        let identity = modulesDroppedFiles[i].getAttribute('data-identity');
        if(txt === 'image'){
            imgArr.push(identity);
        }else if(txt === 'audio'){
            audioArr.push(identity);
        }else if(txt === 'video'){
            videoArr.push(identity);
        }else if(txt === 'pdf'){
            pdfArr.push(identity);
        }else if(txt === 'document'){
            documentArr.push(identity);
        }
    }
    if(links){
        for(let i =0; i<links.length; i++){
            linksArr.push(links[i].value);
        }
    }
    publishBttn.textContent = 'Please wait';
    if((moduleTitle.trim() !== "" && moduleTitle.trim().length !== 0) &&
        (moduleDescription.trim() !== "" && moduleDescription.trim().length !== 0)
    && primaryTitleID !== null){
        warningBlankTxt.style.display = null;
        let data = {
            primaryID: primaryTitleID,
            classroomUrl: classUrl,
            title: moduleTitle,
            description: moduleDescription,
            audio: audioArr,
            document: documentArr,
            image: imgArr,
            pdf: pdfArr,
            video: videoArr,
            external_links: linksArr
        }
        createModule(data);
    }else{
        warningBlankTxt.style.display = 'block';
        setTimeout(function(){
            let scroll = new SmoothScroll();
            let options = { speed: 2000, easing: 'easeOutQuart' , offset: 20};
            setTimeout(function(){
                scroll.animateScroll(modulesUploaderMainWrapper,modulesUploaderMainWrapper, options);
            },250);
            publishBttn.textContent = 'Publish'
        }, 1000);
    }
});


//FETCH
function createTitle(frontTxt, backTxt, bttn, data){
    let backTxtBttn = backTxt, frontTxtBttn = frontTxt, mainBttn = bttn;
    let url = '/classroom/create-title';
    let jsonData = JSON.stringify(data);
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
                if(result.id){
                    backTxtBttn.textContent = 'Save changes';
                    mainBttn.classList.remove('primary-title-loading');
                    canChangeTitle = true;
                    mainBttn.enabled = true;
                    mainBttn.style.cursor = 'pointer';
                    mainBttn.parentNode.parentNode.children[0].setAttribute('contenteditable', false);
                    document.getSelection().removeAllRanges();
                    backTxtBttn.style.display = 'none';
                    frontTxtBttn.style.display = null;
                    saveDataInDOM(result.id, mainBttn);
                    let deleteBttn = moduleMainWrapper.querySelector('.js-delete-title');
                    let addModuleBttn = mainBttn.parentNode.querySelector('.js-add-modules');
                    deleteBttn.style.display = 'none';
                    addModuleBttn.style.display = null;
                    let moduleBttns = document.querySelectorAll('.js-add-modules');
                    moduleBttns.forEach(el =>{
                        el.addEventListener('click', addAModule);
                    });
                }
            }

        })
        .catch(error=>{
            console.log(error);
        });
}
function createModule(data){
    let url = '/classroom/create-module';
    let jsonData = JSON.stringify(data);
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
                location.reload();
            }
            publishBttn.textContent = 'Publish';
        })
        .catch(error=>{
            publishBttn.textContent = 'Publish';
        });
}
//GENERATE
function createDivider(){
    let moduleDivider = document.createElement('DIV'),
        controlsWrapper = document.createElement('DIV'),
        moduleDivTitle = document.createElement('h2'),
        saveChangesBttn = document.createElement('BUTTON'),
        addModulesBttn = document.createElement('BUTTON'),
        deleteBttn = document.createElement('BUTTON');

    let bttnFront = document.createElement('SPAN'),
        bttnBack = document.createElement('SPAN');

    moduleDivider.classList.add('modules__divider');
    controlsWrapper.classList.add('modules__controls-wrapper');
    moduleDivTitle.classList.add('modules__divider-title');
    moduleDivTitle.textContent = 'Place your primary title here';
    saveChangesBttn.classList.add('bttn','modules__change-title-bttn','js-edit-title');
    addModulesBttn.classList.add('bttn','modules__change-title-bttn','js-add-modules');
    saveChangesBttn.setAttribute('type', 'button');
    addModulesBttn.setAttribute('type', 'button');
    addModulesBttn.textContent = 'Add a module';

    bttnFront.classList.add('modules__change-title-bttn-front');
    bttnFront.textContent = 'Edit Title';

    bttnBack.classList.add('modules__change-title-bttn-back');
    bttnBack.textContent = 'Save';
    deleteBttn.classList.add('bttn', 'modules__delete-title-bttn', 'js-delete-title');
    deleteBttn.textContent = 'DELETE';
    deleteBttn.setAttribute('type', 'button');
    bttnFront.style.display = 'none';
    saveChangesBttn.append(bttnFront);
    saveChangesBttn.append(bttnBack);

    addModulesBttn.style.display = 'none';
    controlsWrapper.append(saveChangesBttn);
    controlsWrapper.append(addModulesBttn);
    controlsWrapper.append(deleteBttn);
    moduleDivider.append(moduleDivTitle);
    moduleDivider.append(controlsWrapper);
    moduleMainWrapper.insertBefore(moduleDivider, addModuleTitleBttn);
    deleteBttn.style.right = saveChangesBttn.offsetWidth + 10 +'px';

        moduleDivTitle.setAttribute('contenteditable', true);
    moduleDivTitle.focus();
    selectElementContents(moduleDivTitle);
    canChangeTitle = false;
    addTitleBttnEvent();
    refreshDeleteTitleEvent();
}
//HELPERS
let canChangeTitle = true;
function editTitle(e){
    let frontTxt = e.currentTarget.parentNode.querySelector('.modules__change-title-bttn-front'),
        backTxt = e.currentTarget.parentNode.querySelector('.modules__change-title-bttn-back');
    let title = e.currentTarget.parentNode.parentNode.children[0];
    if(canChangeTitle){
        title.setAttribute('contenteditable', true);
        title.focus();
        selectElementContents(title);
        frontTxt.style.display = 'none';
        backTxt.style.display = null;
        canChangeTitle = false;
    }else{
        backTxt.textContent = 'Please wait';
        e.currentTarget.classList.add('primary-title-loading');
        e.currentTarget.enabled = false;
        let currentID =e.currentTarget.parentNode.getAttribute('data-id');
        let data = {
            url: classUrl,
            primaryTitle: title.textContent,
            id: currentID
        };
        createTitle(frontTxt, backTxt, e.currentTarget, data);
    }

}
function addTitleBttnEvent(){
    let editTitleBttn = document.querySelectorAll('.js-edit-title');
    editTitleBttn.forEach(el =>{
        el.addEventListener('click', editTitle);
    })
}
function refreshDeleteTitleEvent(){
    let deleteBttn = moduleMainWrapper.querySelector('.js-delete-title');
    deleteBttn.addEventListener('click', ()=>{
        deleteBttn.parentNode.parentNode.remove();
        addModuleTitleBttn.style.display = null;
        if(modulesEmptyWrapper){
            modulesEmptyWrapper.style.display = 'block';
        }
        canChangeTitle = true;
    });

}
function addAModule(e){
    let child = e.currentTarget;
    let parent = child.parentNode;
    primaryTitleID = parent.getAttribute('data-id');
    modulesUploaderMainWrapper.style.display = 'block';
    let scroll = new SmoothScroll();
    let options = { speed: 2000, easing: 'easeOutQuart' , offset: 20};
    setTimeout(function(){
        scroll.animateScroll(modulesUploaderMainWrapper.offsetTop, options);
    },250);
    publishBttn.textContent = 'Publish'
}
function selectElementContents(el) {
    let range = document.createRange(),
        sel = window.getSelection();
    range.selectNodeContents(el);
    sel.removeAllRanges();
    sel.addRange(range);
}
function saveDataInDOM($id, child){
    child.parentNode.setAttribute('data-id', $id);
}
function showModuleBottomPart(e){
    let parent = e.currentTarget.parentNode;
    parent.classList.toggle('module-card--active');
}

let fileInputBttn = document.getElementById('fileInput'),
    dropZone = fileInputBttn.parentNode;


//DRAGGING
dropZone.addEventListener('click', ()=>{
    fileInputBttn.click();
})
dropZone.addEventListener('dragover', e =>{
    e.preventDefault();
    dropZone.classList.add('drag-zone--hover');
});
['dragleave','dragend'].forEach(type =>{
   dropZone.addEventListener(type, e =>{
       dropZone.classList.remove('drag-zone--hover');
   }) ;
});

dropZone.addEventListener('drop', e =>{
    e.preventDefault();
    dropZone.classList.remove('drag-zone--hover');
    if(e.dataTransfer.files.length){
        fileInputBttn.files = e.dataTransfer.files;
        initData(e.dataTransfer.files);
    }
});
let uploadCtr = 0;
function initData(files){
    generateLoadingElements(files);
    if(uploadCtr === 0){
        uploadModules(files);
        uploadCtr++;
    }

}

//GENERATE
let uploadQueue = [];
function generateLoadingElements(files){
    let fileLength = files.length;
    for(let i = 0; i<fileLength; i++){
        uploadQueue.push(files[i]);
        let moduleWrapper = document.createElement('DIV'),
            nameTag = document.createElement('P'),
            removeFileBttn = document.createElement('BUTTON'),
            resendBttn = document.createElement('BUTTON'),
            loadingTag = document.createElement('P'),
            loadingWrapper = document.createElement('DIV'),
            loadingWrapperChild = document.createElement('DIV');

        moduleWrapper.classList.add('modules__dropped-files', 'upload-waiting');
        nameTag.classList.add('modules__dropped-fname');
        removeFileBttn.classList.add('bttn','modules__dropped-remove-bttn', 'js-remove-file');
        resendBttn.classList.add('bttn','upload-error-bttn', 'js-resend-file');
        removeFileBttn.setAttribute('type', 'button');
        resendBttn.setAttribute('type', 'button');
        loadingTag.classList.add('modules__dropped-percentage');
        loadingWrapper.classList.add('modules__dropped-progress-bar');
        loadingWrapperChild.classList.add('modules__dropped-progress-bar-image');
        removeFileBttn.textContent = 'remove';
        resendBttn.textContent = 'resend';
        nameTag.textContent = files[i].name;
        loadingTag.textContent = '0%';

        removeFileBttn.style.display = 'none';
        resendBttn.style.display = 'none';

        loadingWrapper.append(loadingWrapperChild);
        moduleWrapper.append(nameTag);
        moduleWrapper.append(removeFileBttn);
        moduleWrapper.append(resendBttn);
        moduleWrapper.append(loadingTag)
        moduleWrapper.append(loadingWrapper);
        dropZone.parentNode.append(moduleWrapper);
    }
}

//FETCH
let fileCtr = 0, elCtr = 0;
function uploadModules(files){
    let loaderTxts = dropZone.parentNode.querySelectorAll('.modules__dropped-percentage');
    let loaderIndicators = dropZone.parentNode.querySelectorAll('.modules__dropped-progress-bar-image');
    let droppedFilesWrapper = dropZone.parentNode.querySelectorAll('.modules__dropped-files');
    let removeFileBttn = dropZone.parentNode.querySelectorAll('.modules__dropped-remove-bttn');
    let resendFileBttn = dropZone.parentNode.querySelectorAll('.js-resend-file');
    if(uploadQueue.length !== fileCtr){
        droppedFilesWrapper[elCtr].classList.remove('upload-waiting');
        let url = '/classroom/upload-modules';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.upload.addEventListener('progress', e =>{
            const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
            loaderTxts[elCtr].textContent = percent.toFixed(2) +'%';
            loaderIndicators[elCtr].style.width = percent.toFixed(2) +'%';
            if(percent === 100){
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        let result = JSON.parse(xhr.responseText);
                        if(result.success){
                            let path = result.path,
                                type = result.type,
                                identity = result.id;
                            loaderTxts[elCtr].style.display = 'none';
                            droppedFilesWrapper[elCtr].classList.add('upload-done');
                            droppedFilesWrapper[elCtr].setAttribute('data-path', path);
                            droppedFilesWrapper[elCtr].setAttribute('data-type', type);
                            droppedFilesWrapper[elCtr].setAttribute('data-identity', identity);
                            removeFileBttn[elCtr].style.display = 'block';
                            removeFileBttn[elCtr].addEventListener('click', deleteFile);
                            fileCtr++;
                            elCtr++;
                            uploadModules(files);
                        }else{
                            droppedFilesWrapper[elCtr].classList.remove('primary-title-loading');
                            droppedFilesWrapper[elCtr].classList.add('upload-error');
                            loaderTxts[elCtr].style.display = 'none';
                            resendFileBttn[elCtr].style.display = null;
                            resendFileBttn[elCtr].addEventListener('click', resendFile);
                            if(uploadQueue.length !== fileCtr){
                                fileCtr++;
                                elCtr++;
                                uploadModules(files);
                            }
                        }
                        if(uploadQueue.length === fileCtr){
                            uploadCtr = 0;
                        }
                    }
                }

            }
        });
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        let formData = new FormData();
        formData.append('file', uploadQueue[fileCtr]);
        xhr.send(formData);
    }

}

function deleteFile(e){
    elCtr--;
    let parent = e.currentTarget.parentNode;
    parent.classList.add('primary-title-loading');
    let path = parent.getAttribute('data-path'),
        type = parent.getAttribute('data-type');


    let url = '/classroom/delete-file';
    let jsonData = JSON.stringify({url: path, fileType: type});
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
                parent.remove();
                let droppedFilesWrapper = dropZone.parentNode.querySelectorAll('.modules__dropped-files');
                if(droppedFilesWrapper.length){
                    uploadCtr = 0;
                }
            }else{
                //SOMETHING WENT WRONG WHEN DELETING A FILE
            }
        })
        .catch(error=>{
            console.log(error);
        });
}
function resendFile(e){
    let node = e.currentTarget;
    let index = Array.from(node.parentNode.parentNode.children).indexOf(node.parentNode) - 2;
    node.parentNode.classList.remove('upload-error');
    let percentageTxt = node.parentNode.querySelector('.modules__dropped-percentage');
    let resendBttn = node.parentNode.querySelector('.js-resend-file');
    percentageTxt.textContent = '0%';
    percentageTxt.style.display = null;
    resendBttn.style.display = 'none';
    sendAgain(index);
}
function sendAgain(index){
    let loaderTxts = dropZone.parentNode.querySelectorAll('.modules__dropped-percentage');
    let loaderIndicators = dropZone.parentNode.querySelectorAll('.modules__dropped-progress-bar-image');
    let droppedFilesWrapper = dropZone.parentNode.querySelectorAll('.modules__dropped-files');
    let removeFileBttn = dropZone.parentNode.querySelectorAll('.modules__dropped-remove-bttn');
    let resendFileBttn = dropZone.parentNode.querySelectorAll('.js-resend-file');

    let url = '/classroom/upload-modules';
    const xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.upload.addEventListener('progress', e =>{
        const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
        loaderTxts[index].textContent = percent.toFixed(2) +'%';
        loaderIndicators[index].style.width = percent.toFixed(2) +'%';
        if(percent === 100){
            xhr.onreadystatechange = function(){
                if(xhr.readyState === XMLHttpRequest.DONE){
                    let result = JSON.parse(xhr.responseText);
                    console.log(uploadQueue[index]);
                    if(result.success){
                        let path = result.path,
                            type = result.type;
                        loaderTxts[index].style.display = 'none';
                        droppedFilesWrapper[index].classList.add('upload-done');
                        droppedFilesWrapper[index].setAttribute('data-path', path);
                        droppedFilesWrapper[index].setAttribute('data-type', type);
                        removeFileBttn[index].style.display = 'block';
                        removeFileBttn[index].addEventListener('click', deleteFile);
                    }else{
                        droppedFilesWrapper[index].classList.remove('primary-title-loading');
                        droppedFilesWrapper[index].classList.add('upload-error');
                        loaderTxts[index].style.display = 'none';
                        resendFileBttn[index].style.display = null;

                    }
                }
            }

        }
    });

    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    let formData = new FormData();
    formData.append('file', uploadQueue[index]);
    xhr.send(formData);
}
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
    let audioPlayers = document.querySelectorAll('.js-audio-player');
    audioPlayers.forEach(el=>{
        new GreenAudioPlayer(el);
        GreenAudioPlayer.init({
            selector: '.player',
            stopOthersOnPlay: true
        });
    });

})();

