
let addModuleTitleBttn = document.querySelector('.js-add-title-bttn');
let modulesEmptyWrapper = document.querySelector('.modules__empty'),
    moduleMainWrapper = document.querySelector('.modules__container');

let editTitleBttn = document.querySelectorAll('.js-edit-title'),
    addModuleBttn = document.querySelectorAll('.js-add-modules'),
    closePanelBttn = document.querySelectorAll('.js-close-panel'),
    addLinkBttn = document.querySelector('.js-add-link');

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
if(closePanelBttn){
    closePanelBttn.forEach(el =>{
       el.addEventListener('click', closePanel)
    });
}

addLinkBttn.addEventListener('click', e=>{
    let child = e.currentTarget.parentNode;

    let inputLinkWrapper = document.createElement('DIV'),
        inputLink = document.createElement('INPUT'),
        bttnLink = document.createElement('BUTTON');

    inputLinkWrapper.classList.add('modules__input-link');
    inputLink.setAttribute('name', 'inputLinks[]');
    inputLink.setAttribute('placeholder', 'Place your link here');
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



//FETCH
function createTitle(frontTxt, backTxt, bttn, data){
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
                if(result.id){
                    saveDataInDOM(result.id, bttn);
                    let deleteBttn = moduleMainWrapper.querySelector('.js-delete-title');
                    let addModuleBttn = moduleMainWrapper.querySelector('.js-add-modules');
                    deleteBttn.style.display = 'none';
                    addModuleBttn.style.display = null;
                    backTxt.style.display = 'none';
                    frontTxt.style.display = null;
                    backTxt.textContent = 'Save changes'
                    bttn.classList.remove('primary-title-loading');
                    canChangeTitle = true;
                    bttn.enabled = true;
                    bttn.parentNode.parentNode.children[0].setAttribute('contenteditable', false);
                    document.getSelection().removeAllRanges();
                    addModuleTitleBttn.style.display = null;
                }
            }

        })
        .catch(error=>{

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
    let title = e.currentTarget.parentNode.children[0];
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
    console.log(e.currentTarget);
}
function closePanel(e){
    console.log(e.currentTarget);
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
let fileCtr = 0;
function uploadModules(files){
    let loaderTxts = dropZone.parentNode.querySelectorAll('.modules__dropped-percentage');
    let loaderIndicators = dropZone.parentNode.querySelectorAll('.modules__dropped-progress-bar-image');
    let droppedFilesWrapper = dropZone.parentNode.querySelectorAll('.modules__dropped-files');
    let removeFileBttn = dropZone.parentNode.querySelectorAll('.modules__dropped-remove-bttn');
    let resendFileBttn = dropZone.parentNode.querySelectorAll('.js-resend-file');
    if(uploadQueue.length !== fileCtr){
        droppedFilesWrapper[fileCtr].classList.remove('upload-waiting');
        let url = '/classroom/upload-modules';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.upload.addEventListener('progress', e =>{
            const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
            loaderTxts[fileCtr].textContent = percent.toFixed(2) +'%';
            loaderIndicators[fileCtr].style.width = percent.toFixed(2) +'%';
            if(percent === 100){
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        let result = JSON.parse(xhr.responseText);
                        if(result.success){
                            let path = result.path,
                                type = result.type;
                            loaderTxts[fileCtr].style.display = 'none';
                            droppedFilesWrapper[fileCtr].classList.add('upload-done');
                            droppedFilesWrapper[fileCtr].setAttribute('data-path', path);
                            droppedFilesWrapper[fileCtr].setAttribute('data-type', type);
                            removeFileBttn[fileCtr].style.display = 'block';
                            removeFileBttn[fileCtr].addEventListener('click', deleteFile);
                            uploadModules(files);
                            fileCtr++;
                        }else{
                            droppedFilesWrapper[fileCtr].classList.remove('primary-title-loading');
                            droppedFilesWrapper[fileCtr].classList.add('upload-error');
                            loaderTxts[fileCtr].style.display = 'none';
                            resendFileBttn[fileCtr].style.display = null;
                            resendFileBttn[fileCtr].addEventListener('click', resendFile);
                            if(uploadQueue.length !== fileCtr){
                                fileCtr++;
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


