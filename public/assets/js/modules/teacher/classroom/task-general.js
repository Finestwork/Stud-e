let taskMainContainer = document.querySelector('.task-create__main');

//REFRESH FUNCTIONS
addEventInputFile();
addAttachmentPicture();
removeAttachedPicture();
function addEventInputFile(){
    let uploadPictureBttn = document.querySelectorAll('.js-upload-picture');
    if(uploadPictureBttn){
        uploadPictureBttn.forEach(el=>{
            el.onchange = function(e){
                uploadFilesAsync(e.target);
                createAttachElement(e.target);
            }
        });
    }
}
function  addAttachmentPicture() {
    let attachmentPictureBttns = document.querySelectorAll('.task-create__attach-bttn')
    if(attachmentPictureBttns){
        attachmentPictureBttns.forEach(el=>{
            el.addEventListener('click', addPictureToTheQuestion);
        });
    }
}
function removeAttachedPicture(){
    let removePictureAttachmentBttn = document.querySelectorAll('.task-create__attachment-remove-bttn');
    if(removePictureAttachmentBttn){
        removePictureAttachmentBttn.forEach(el=>{
            el.addEventListener('click', removePicture);
        })
    }
}


//GENERATE
function createAttachElement(input){
    let targetedInput = input,
        files = input.files,
        attachmentWrapper = targetedInput.parentNode,
        attachmentArea = attachmentWrapper.querySelector('.task-create__attachment-area');
    for(let i = 0; i < files.length; i++){
        let attachmentHolder = document.createElement('DIV'),
            attachmentBox = document.createElement('DIV'),
            attachmentImg = document.createElement('IMG'),
            attachmentDelBttn = document.createElement('BUTTON'),
            attachmentDelBttnLine = document.createElement('SPAN');

        attachmentDelBttnLine.classList.add('task-create__attachment-bttn-line-wrapper');
        attachmentDelBttn.classList.add('task-create__attachment-remove-bttn', 'bttn');
        attachmentDelBttn.setAttribute('type', 'button');
        attachmentDelBttn.disabled = true;
        attachmentDelBttn.style.display = 'none';
        attachmentDelBttn.append(attachmentDelBttnLine);
        attachmentBox.classList.add('task-create__attachment-box');
        attachmentImg.classList.add('img-fluid');

        const reader = new FileReader();
        reader.addEventListener('load', function(){
            attachmentImg.setAttribute('src', this.result);
            attachmentImg.setAttribute('alt', 'Uploaded image');
        });
        reader.readAsDataURL(files[i]);

        attachmentBox.append(attachmentImg);
        attachmentHolder.classList.add('task-create__attachment-holder', 'show-loading');
        attachmentHolder.append(attachmentBox, attachmentDelBttn);
        attachmentArea.appendChild(attachmentHolder);
    }
    targetedInput.value = "";
    removeAttachedPicture();
}

//FILES UPLOADING
function uploadFilesAsync(input){
    let files = input.files;
    let mainParent = input.parentNode.parentNode.parentNode.parentNode,
        attachmentArea = mainParent.querySelector('.task-create__attachment-area');
    for(let i =0; i<files.length; i++){
        let formData = new FormData();
        formData.append('file', files[i]);
        if(attachmentArea.childElementCount === 0){
            formData.append('orderID', i);
        }else{
            formData.append('orderID', attachmentArea.childElementCount + i);
        }
        formData.append('classUrl', classroomUrl);
        let url = '/classroom/upload-task-picture';
        const options = {
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        };
        fetch(url, options)
            .then((response)=>{
                return response.text();
            })
            .then((body)=>{
                let result = JSON.parse(body);
                if(result.success){
                    let boxAttachment = mainParent.querySelectorAll('.task-create__attachment-holder');
                    boxAttachment[result.orderID].setAttribute('data-img-id', result.imageID);
                    boxAttachment[result.orderID].setAttribute('data-img-path', result.storagePath);
                    boxAttachment[result.orderID].classList.remove('show-loading');
                    boxAttachment[result.orderID].children[1].disabled = false;
                    boxAttachment[result.orderID].children[1].style.display = null;
                }
            })
            .catch(error=>{
                console.log(error);
            });
    }
}
//CLICK FUNCTIONS
function addPictureToTheQuestion(e){
    let input = e.currentTarget.previousElementSibling;
    input.click();
}
function removePicture(e){
    let currentBttn = e.currentTarget;
    let attachmentWrapper = currentBttn.parentNode;
    currentBttn.disabled = true;
    attachmentWrapper.classList.add('show-loading');
    let data = {
        path: attachmentWrapper.getAttribute('data-img-path')
    }
    let url = '/classroom/delete-task-picture';
    let options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    }
    fetch(url, options).then((response)=>{
        return response.text();
    }).then((body)=>{
       let result = JSON.parse(body);
       if(result.success){
           attachmentWrapper.classList.remove('show-loading');
           attachmentWrapper.remove();
       }else{
           attachmentWrapper.classList.remove('show-loading');
           alert('Something went wrong please try again later.');
       }
        currentBttn.disabled = false
    }).catch((error)=>{
        console.log(error);
    });
}








document.addEventListener('click', e =>{
    if(!taskTypeSelectionDrpdwnParent.contains(e.target)){
        taskTypeSelectionItems.style.display = null;
        taskTypeDropdownCtr = 0;
    }
    if(!taskSelectionDrpdwnParent.contains(e.target)){
        taskSelectionItems.style.display = null;
        taskDropdownCtr = 0;
    }

    if(targetetedParentTaskTypDrpdwn) {
        if (!targetetedParentTaskTypDrpdwn.contains(e.target)) {
            targetetedParentTaskTypDrpdwn.children[1].classList.remove('dropdown--active');
        }
    }
});




//GLOBAL HELPERS
//KEYUPS
function acceptNumbersOnly(e){
    let input = e.currentTarget;
    input.value = input.value.replace(/[^\d]/g,'');
}
