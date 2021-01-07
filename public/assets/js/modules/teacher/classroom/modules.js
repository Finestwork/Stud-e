
let addModuleTitleBttn = document.querySelector('.js-add-title-bttn');
let modulesEmptyWrapper = document.querySelector('.modules__empty'),
    moduleMainWrapper = document.querySelector('.modules__container'),
    editPanelMainWrapper = document.querySelector('.js-update-container');

let editTitleBttn = document.querySelectorAll('.js-edit-title'),
    deleteTitleBttn = document.querySelectorAll('.js-delete-title'),
    addModuleBttn = document.querySelectorAll('.js-add-modules'),
    deleteModuleBttn = document.querySelectorAll('.js-delete-module'),
    closePanelBttn = document.querySelector('.js-close-panel'),
    closeUpdatePanelBttn = document.querySelector('.js-close-update-panel'),
    addLinkBttn = document.querySelector('.js-add-link'),
    addNewLinkBttn = document.querySelector('.js-add-new-link'),
    publishBttn = document.querySelector('.js-pusblish-bttn');

let moduleTitleTxt = document.getElementById('moduleTitleTxt'),
    moduleDescriptionTxt = document.getElementById('descriptionTxt');
let modulesUploaderMainWrapper = document.querySelector('.js-add-module-container');
let warningBlankTxt = document.querySelector('.js-warning-blank'),
    warningUploadBalnkTxt = document.querySelector('.js-upload-warning-blank');
let primaryTitleID = null, secondaryTitleID = null;
let moduleTopBttn = document.querySelectorAll('.modules__list-top');
let imgs = document.querySelectorAll('.modules__img');

let editModuleBttns = document.querySelectorAll('.js-edit-module');
let saveChangesInModuleBttn = document.querySelector('.js-save-modules-changes-bttn');

let shouldContinue = true;
let links = [], origNames = [], ids = [];
let canChangeTitle = true;
let uploadQueue = [];
let fileCtr = 0, elCtr = 0;
let addFilesCtr = 0;
let uploadCtr = 0;
let uploadedFilesCtr = 0;

let fileInputBttn = document.getElementById('fileInput'),
    dropZone = fileInputBttn.parentNode;

let editFileInputBttn = document.getElementById('updateFileInput'),
    editDropZone = editFileInputBttn.parentNode;


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
if(editModuleBttns){
    editModuleBttns.forEach(el =>{
        el.addEventListener('click', editAModule);
    })
}
if(deleteTitleBttn){
    deleteTitleBttn.forEach(el=>{
        el.addEventListener('click', prepareTitleForDeleting);
    })
}
if(deleteModuleBttn){
    deleteModuleBttn.forEach(el =>{
        el.addEventListener('click', deleteAModule);
    })
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
    if(confirm('Are you sure you want to close this panel?')){
        let droppedFiles = modulesUploaderMainWrapper.querySelectorAll('.modules__dropped-files');
        let modulesLinks = modulesUploaderMainWrapper.querySelectorAll('.modules__input-link');
        let rejectedFiles = modulesUploaderMainWrapper.querySelectorAll('.modules__drop-rejected-files p');
        for(let i = 0; i<droppedFiles.length; i++){
            droppedFiles[i].remove();
        }
        for(let i = 0; i<modulesLinks.length; i++){
            modulesLinks[i].remove();
        }
        for(let i = 0; i<rejectedFiles.length; i++){
            rejectedFiles[i].remove();
        }
        uploadQueue = [];
        fileCtr = 0;
        elCtr = 0;
        addFilesCtr = 0;
        uploadCtr = 0;
        uploadedFilesCtr = 0;
        primaryTitleID = null;
        shouldContinue = true;
        modulesUploaderMainWrapper.style.display = 'none';
    }
});
closeUpdatePanelBttn.addEventListener('click', ()=>{
    if(confirm('Are you sure you want to close this panel?')){
        let droppedFiles = editPanelMainWrapper.querySelectorAll('.modules__dropped-files');
        let modulesLinks = editPanelMainWrapper.querySelectorAll('.modules__input-link');
        let rejectedFiles = editPanelMainWrapper.querySelectorAll('.modules__drop-rejected-files p');

        for(let i = 0; i<droppedFiles.length; i++){
            droppedFiles[i].remove();
        }
        for(let i = 0; i<modulesLinks.length; i++){
            modulesLinks[i].remove();
        }
        for(let i = 0; i<rejectedFiles.length; i++){
            rejectedFiles[i].remove();
        }
        uploadQueue = [];
        fileCtr = 0;
        elCtr = 0;
        addFilesCtr = 0;
        uploadCtr = 0;
        uploadedFilesCtr = 0;
        shouldContinue = true;
        secondaryTitleID = null;
        editPanelMainWrapper.style.display = 'none';
    }

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
addNewLinkBttn.addEventListener('click', e=>{
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
saveChangesInModuleBttn.addEventListener('click', ()=>{
    let moduleTitle = document.getElementById('updateTitleTxt').value,
        moduleDescription = document.getElementById('updateDescriptionTxt').value;
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
    saveChangesInModuleBttn.textContent = 'Please wait';
    if((moduleTitle.trim() !== "" && moduleTitle.trim().length !== 0) &&
        (moduleDescription.trim() !== "" && moduleDescription.trim().length !== 0)
    && secondaryTitleID !== null){
        warningUploadBalnkTxt.style.display = null;
        let data = {
            moduleID: secondaryTitleID,
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
        updateModule(data);
    }else{
        warningUploadBalnkTxt.style.display = 'block';
        setTimeout(function(){
            let scroll = new SmoothScroll();
            let options = { speed: 2000, easing: 'easeOutQuart' , offset: 20};
            setTimeout(function(){
                scroll.animateScroll(modulesUploaderMainWrapper,modulesUploaderMainWrapper, options);
            },250);
            publishBttn.textContent = 'Save changes'
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
                    let addModuleBttn = mainBttn.parentNode.querySelector('.js-add-modules');
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
            console.log(error)
        });
}
function updateModule(data){
    let url = '/classroom/update-module';
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
            saveChangesInModuleBttn.textContent = 'Save changes';
        })
        .catch(error=>{
            saveChangesInModuleBttn.textContent = 'Save changes';
            console.log(error)
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
    let deleteBttn = moduleMainWrapper.querySelectorAll('.js-delete-title');
    deleteBttn.forEach(el =>{
        el.addEventListener('click', e=>{
            e.currentTarget.parentNode.parentNode.remove();
            addModuleTitleBttn.style.display = null;
            if(modulesEmptyWrapper){
                modulesEmptyWrapper.style.display = 'block';
            }
            canChangeTitle = true;
        })
    })

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
function editAModule(e){
    let moduleWrapper = e.currentTarget.parentNode.parentNode.parentNode;
    let moduleTitle = moduleWrapper.querySelector('.modules__list-title').textContent,
        moduleDescription = moduleWrapper.querySelector('.modules__description-txt').textContent;
    let uploadedLinks = moduleWrapper.querySelectorAll('.modules__external-link');
    let titleTxt = document.getElementById('updateTitleTxt'),
        descriptionTxt = document.getElementById('updateDescriptionTxt');

    secondaryTitleID = moduleWrapper.getAttribute('data-id');
    titleTxt.value = moduleTitle;
    descriptionTxt.value = moduleDescription;

    let imgs = moduleWrapper.querySelectorAll('.modules__img'),
        audios = moduleWrapper.querySelectorAll('.modules__player-item'),
        videos = moduleWrapper.querySelectorAll('.modules__video'),
        pdfs = moduleWrapper.querySelectorAll('.js-pdf-storage'),
        documents = moduleWrapper.querySelectorAll('.js-document-storage');

    //image, audio, video, pdf, document
    for(let i = 0; i<imgs.length; i++) {
        links.push(imgs[i].getAttribute('href'));
        origNames.push(imgs[i].getAttribute('data-img-name'));
        ids.push(imgs[i].getAttribute('data-id'));
    }
    generateUploadElement(links, origNames, ids, 'image');
    links = [];
    origNames = [];
    ids = [];
    for(let i = 0; i<audios.length; i++) {
        links.push(audios[i].getAttribute('data-audio-path'));
        origNames.push(audios[i].getAttribute('data-audio-name'));
        ids.push(audios[i].getAttribute('data-audio-id'));
    }
    generateUploadElement(links, origNames, ids, 'audio');
    links = [];
    origNames = [];
    ids = [];
    for(let i = 0; i<videos.length; i++) {
        links.push(videos[i].getAttribute('data-video-path'));
        origNames.push(videos[i].getAttribute('data-video-name'));
        ids.push(videos[i].getAttribute('data-video-id'));
    }
    generateUploadElement(links, origNames, ids, 'video');
    links = [];
    origNames = [];
    ids = [];
    for(let i = 0; i<pdfs.length; i++) {
        links.push(pdfs[i].getAttribute('data-pdf-path'));
        origNames.push(pdfs[i].getAttribute('data-pdf-name'));
        ids.push(pdfs[i].getAttribute('data-pdf-id'));
    }
    generateUploadElement(links, origNames, ids, 'pdf');
    links = [];
    origNames = [];
    ids = [];
    for(let i = 0; i<documents.length; i++) {
        links.push(documents[i].getAttribute('data-pdf-path'));
        origNames.push(documents[i].getAttribute('data-pdf-name'));
        ids.push(documents[i].getAttribute('data-pdf-id'));
    }
    generateUploadElement(links, origNames, ids, 'document');
    links = [];
    origNames = [];
    ids = [];


    //ADD LINKS
    let newAddedLinksWrapper = document.querySelector('.modules__add-new-links-wrapper');
    for(let i = 0; i < uploadedLinks.length; i++){
        let inputLinkWrapper = document.createElement('DIV'),
            inputLink = document.createElement('INPUT'),
            bttnLink = document.createElement('BUTTON');

        inputLinkWrapper.classList.add('modules__input-link');
        inputLink.setAttribute('type', 'text');
        inputLink.setAttribute('placeholder', 'Place your link here');
        inputLink.classList.add('modules__link');
        inputLink.value = uploadedLinks[i];
        bttnLink.setAttribute('type', 'button');
        bttnLink.classList.add('bttn', 'modules__remove-link', 'js-remove-link');
        bttnLink.textContent = 'Remove this link';
        inputLinkWrapper.append(inputLink);
        inputLinkWrapper.append(bttnLink);
        newAddedLinksWrapper.parentNode.insertBefore(inputLinkWrapper, newAddedLinksWrapper);

        let removeLinkbttn = document.querySelectorAll('.js-remove-link');
        removeLinkbttn.forEach(el =>{
            el.addEventListener('click', e=>{
                e.currentTarget.parentNode.remove();
            })
        });
    }
    setTimeout(function(){
        let scroll = new SmoothScroll();
        let options = { speed: 1000, easing: 'easeOutQuart' , offset: 20};
        setTimeout(function(){
            scroll.animateScroll(modulesUploaderMainWrapper,modulesUploaderMainWrapper, options);
        },250);
        editPanelMainWrapper.style.display = 'block';
    }, 1000);
}
function deleteAModule(e){
    if(confirm("Are you sure you want to delete this module? Once deleted, there is no going back.")){
        let parent = e.currentTarget.parentNode.parentNode.parentNode;
        let moduleID = parent.getAttribute('data-id');
        e.currentTarget.classList.add('primary-title-loading')
        e.currentTarget.textContent = 'Please wait';
        e.currentTarget.enabled = false;
        deleteModule(moduleID, e.currentTarget);
    }
}
function prepareTitleForDeleting(e){
    if(confirm("Are you sure you want to delete this primary title? Once deleted, there is no going back.")){
        let parent = e.currentTarget.parentNode;
        let moduleID = parent.getAttribute('data-id');
        e.currentTarget.classList.add('primary-title-loading')
        e.currentTarget.textContent = 'Please wait';
        e.currentTarget.enabled = false;
        deletePrimaryTitle(moduleID, e.currentTarget);
    }
}
//DRAG ZONE
fileInputBttn.onchange = function(e){
    if(e.target.files.length){
        fileInputBttn.files = e.target.files;
        initData(e.target.files);
    }
}
editFileInputBttn.onchange = function(e){
    if(e.target.files.length){
        editFileInputBttn.files = e.target.files;
        initData(e.target.files);
    }
}
dropZone.addEventListener('click', ()=>{
    fileInputBttn.click();
});

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

editDropZone.addEventListener('click', ()=>{
    fileInputBttn.click();
})

editDropZone.addEventListener('dragover', e =>{
    e.preventDefault();
    editDropZone.classList.add('drag-zone--hover');
});
['dragleave','dragend'].forEach(type =>{
    editDropZone.addEventListener(type, e =>{
        editDropZone.classList.remove('drag-zone--hover');
    }) ;
});

editDropZone.addEventListener('drop', e =>{
    e.preventDefault();
    editDropZone.classList.remove('drag-zone--hover');
    if(e.dataTransfer.files.length){
        editFileInputBttn.files = e.dataTransfer.files;
        addNewFiles(e.dataTransfer.files);
    }
});

function initData(files){
    generateLoadingElements(files);
}
function addNewFiles(files){
    generateLoadingElementsForEditing(files);
}

//GENERATE
function generateLoadingElements(files){
    for(let i = 0; i<files.length; i++){
        if(getFileExtension(files[i]) === 'mp4' ||getFileExtension(files[i]) === 'ogg'
            || getFileExtension(files[i]) === 'webm' || getFileExtension(files[i]) === 'mp3'
            || getFileExtension(files[i]) === 'wav' || getFileExtension(files[i]) === 'gif'
            || getFileExtension(files[i]) === 'jpeg' || getFileExtension(files[i]) === 'jpg'
            || getFileExtension(files[i]) === 'png' || getFileExtension(files[i]) === 'pdf'
            || getFileExtension(files[i]) === 'doc' || getFileExtension(files[i]) === 'docx'
            || getFileExtension(files[i]) === 'pptx' || getFileExtension(files[i]) === 'ppt'
            || getFileExtension(files[i]) === 'xls' || getFileExtension(files[i]) === 'xlsx'){
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
            if(uploadCtr === 0){
                uploadModules(files);
            }
        }else {
            let parent = dropZone.parentNode;
            let rejectedFileContainer = parent.querySelector('.modules__drop-rejected-files');
            let pTag = document.createElement('P');
            pTag.textContent = 'We do not support this file ' + files[i].name;
            rejectedFileContainer.append(pTag);
            if(files.length === 1){
                uploadCtr = 0;
            }
        }
    }
    uploadCtr++;
}
function generateLoadingElementsForEditing(files){
    for(let i = 0; i<files.length; i++){
        if(getFileExtension(files[i]) === 'mp4' ||getFileExtension(files[i]) === 'ogg'
            || getFileExtension(files[i]) === 'webm' || getFileExtension(files[i]) === 'mp3'
            || getFileExtension(files[i]) === 'wav' || getFileExtension(files[i]) === 'gif'
            || getFileExtension(files[i]) === 'jpeg' || getFileExtension(files[i]) === 'jpg'
            || getFileExtension(files[i]) === 'png' || getFileExtension(files[i]) === 'pdf'
            || getFileExtension(files[i]) === 'doc' || getFileExtension(files[i]) === 'docx'
            || getFileExtension(files[i]) === 'pptx' || getFileExtension(files[i]) === 'ppt'
            || getFileExtension(files[i]) === 'xls' || getFileExtension(files[i]) === 'xlsx'){
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
            editDropZone.parentNode.append(moduleWrapper);
            if(addFilesCtr === 0){
                addFiles(files);
            }
        }else {
            let parent = editDropZone.parentNode;
            let rejectedFileContainer = parent.querySelector('.modules__drop-rejected-files');
            let pTag = document.createElement('P');
            pTag.textContent = 'We do not support this file ' + files[i].name;
            rejectedFileContainer.append(pTag);
            if(files.length === 1){
                addFilesCtr = 0;
            }
        }
    }
    addFilesCtr++;
}
function generateNewLoadingElements(files){
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
        editDropZone.parentNode.append(moduleWrapper);
    }
}
function generateUploadElement(arrLinks, arrName, arrID, type){
    let fileLength = arrLinks.length;
    for(let i = 0; i<fileLength; i++){
        let moduleWrapper = document.createElement('DIV'),
            nameTag = document.createElement('P'),
            removeFileBttn = document.createElement('BUTTON'),
            resendBttn = document.createElement('BUTTON'),
            loadingTag = document.createElement('P'),
            loadingWrapper = document.createElement('DIV'),
            loadingWrapperChild = document.createElement('DIV');

        moduleWrapper.classList.add('modules__dropped-files', 'already-uploaded', 'upload-done');
        nameTag.classList.add('modules__dropped-fname');
        removeFileBttn.classList.add('bttn','modules__dropped-remove-bttn', 'js-remove-file');
        resendBttn.classList.add('bttn','upload-error-bttn', 'js-resend-file');
        loadingTag.classList.add('modules__dropped-percentage');
        removeFileBttn.setAttribute('type', 'button');
        resendBttn.setAttribute('type', 'button');
        loadingWrapper.classList.add('modules__dropped-progress-bar');
        loadingWrapperChild.classList.add('modules__dropped-progress-bar-image');

        moduleWrapper.setAttribute('data-path',arrLinks[i]);
        moduleWrapper.setAttribute('data-type',type);
        moduleWrapper.setAttribute('data-identity',arrID[i]);
        loadingWrapperChild.style.width = '100%';
        removeFileBttn.textContent = 'remove';
        resendBttn.textContent = 'resend';
        nameTag.textContent = arrName[i];
        loadingTag.textContent = '0%';
        loadingTag.style.display = 'none';

        removeFileBttn.style.display = 'block';
        resendBttn.style.display = 'none';

        removeFileBttn.addEventListener('click', deleteFileEdit);
        loadingWrapper.append(loadingWrapperChild);
        moduleWrapper.append(nameTag);
        moduleWrapper.append(loadingTag);
        moduleWrapper.append(removeFileBttn);
        moduleWrapper.append(loadingWrapper);
        editDropZone.parentNode.append(moduleWrapper);
    }
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
//FETCH
function uploadModules(files){
    if(uploadQueue.length !== fileCtr){
        let loaderTxts = dropZone.parentNode.querySelectorAll('.modules__dropped-percentage');
        let loaderIndicators = dropZone.parentNode.querySelectorAll('.modules__dropped-progress-bar-image');
        let droppedFilesWrapper = dropZone.parentNode.querySelectorAll('.modules__dropped-files');
        let removeFileBttn = dropZone.parentNode.querySelectorAll('.modules__dropped-remove-bttn');
        let resendFileBttn = dropZone.parentNode.querySelectorAll('.js-resend-file');
        droppedFilesWrapper[elCtr].classList.remove('upload-waiting');


        let url = '/classroom/upload-modules';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.upload.onprogress = function(e){
            if(shouldContinue){
                const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
                loaderTxts[elCtr].textContent = percent.toFixed(2) +'%';
                loaderIndicators[elCtr].style.width = percent.toFixed(2) +'%';
                if(percent === 100){
                    shouldContinue = false;
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState === XMLHttpRequest.DONE){
                            if(xhr.status === 200){
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
                                    shouldContinue = true;
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
                                        shouldContinue = true;
                                        uploadModules(files);
                                    }
                                }
                                if(uploadQueue.length === fileCtr){
                                    uploadCtr = 0;
                                }

                            }
                        }
                    }
                }
            }
        };

        if(shouldContinue){
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            let formData = new FormData();
            formData.append('file', uploadQueue[fileCtr]);
            xhr.send(formData);
        }
    }
}
function addFiles(files){
    let loaderTxts = editDropZone.parentNode.querySelectorAll('.modules__dropped-percentage');
    let loaderIndicators = editDropZone.parentNode.querySelectorAll('.modules__dropped-progress-bar-image');
    let droppedFilesWrapper = editDropZone.parentNode.querySelectorAll('.modules__dropped-files');
    let removeFileBttn = editDropZone.parentNode.querySelectorAll('.modules__dropped-remove-bttn');
    let resendFileBttn = editDropZone.parentNode.querySelectorAll('.js-resend-file');
    let totalUploadedFile = editDropZone.parentNode.querySelectorAll('.already-uploaded').length;
    if(uploadedFilesCtr === 0){
        uploadedFilesCtr = uploadedFilesCtr + totalUploadedFile;
    }
    if(uploadQueue.length !== fileCtr){
        droppedFilesWrapper[uploadedFilesCtr].classList.remove('upload-waiting');
        let url = '/classroom/upload-modules';
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.upload.addEventListener('progress', e =>{
            const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
            loaderTxts[uploadedFilesCtr].textContent = percent.toFixed(2) +'%';
            loaderIndicators[uploadedFilesCtr].style.width = percent.toFixed(2) +'%';
            if(percent === 100){
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        let result = JSON.parse(xhr.responseText);
                        if(result.success){
                            let path = result.path,
                                type = result.type,
                                identity = result.id;
                            loaderTxts[uploadedFilesCtr].style.display = 'none';
                            droppedFilesWrapper[uploadedFilesCtr].classList.add('upload-done');
                            droppedFilesWrapper[uploadedFilesCtr].setAttribute('data-path', path);
                            droppedFilesWrapper[uploadedFilesCtr].setAttribute('data-type', type);
                            droppedFilesWrapper[uploadedFilesCtr].setAttribute('data-identity', identity);
                            removeFileBttn[uploadedFilesCtr].style.display = 'block';
                            removeFileBttn[uploadedFilesCtr].addEventListener('click', deleteFile);
                            fileCtr++;
                            uploadedFilesCtr++;
                            addFiles(files);
                        }else{
                            droppedFilesWrapper[uploadedFilesCtr].classList.remove('primary-title-loading');
                            droppedFilesWrapper[uploadedFilesCtr].classList.add('upload-error');
                            loaderTxts[uploadedFilesCtr].style.display = 'none';
                            resendFileBttn[uploadedFilesCtr].style.display = null;
                            resendFileBttn[uploadedFilesCtr].addEventListener('click', resendFile);
                            if(uploadQueue.length !== fileCtr){
                                fileCtr++;
                                uploadedFilesCtr++;
                                addFiles(files);
                            }
                        }
                        if(uploadQueue.length === fileCtr){
                            addFilesCtr = 0;
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
function deleteFileEdit(e){
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
    let index = Array.from(node.parentNode.parentNode.children).indexOf(node.parentNode) - 4;
    node.parentNode.classList.remove('upload-error');
    let percentageTxt = node.parentNode.querySelector('.modules__dropped-percentage');
    let resendBttn = node.parentNode.querySelector('.js-resend-file');
    percentageTxt.textContent = '0%';
    percentageTxt.style.display = null;
    resendBttn.style.display = 'none';
    sendAgain(index);
}
function sendAgain(index){
    console.log(index);
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
function deleteModule(id, bttn){
    let url = '/classroom/delete-module';
    let jsonData = JSON.stringify({moduleID: id});
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
            }else{
                alert('Something went wrong, please try again later');
            }
            bttn.classList.remove('primary-title-loading')
            bttn.textContent = 'Delete';
            bttn.enabled = true;
        })
        .catch(error=>{
            console.log(error);
        });
}
function deletePrimaryTitle(id, bttn){
    let url = '/classroom/delete-title';
    let jsonData = JSON.stringify({primaryTitleID: id});
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
            }else{
                alert('Something went wrong, please try again later');
            }
            bttn.classList.remove('primary-title-loading')
            bttn.textContent = 'Delete';
            bttn.enabled = true;
        })
        .catch(error=>{
            console.log(error);
        });
}
function getFileExtension(file){
    return file.name.substring(file.name.lastIndexOf('.') + 1)
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

