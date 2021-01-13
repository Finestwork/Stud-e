//TAKE NOTE ATTACHMENT BUTTON IN DROPDOWN AREA IS NOT WORKING YET


let targetetedParentTaskTypDrpdwn = null;

let pointsInput = document.querySelectorAll('.task-create__question-how-many-points input');
let showAnswerOptionBttn = document.querySelectorAll('.js-select-option-answer'),
    selectionAnswerList = document.querySelectorAll('.task-create__question-option-choice-list-item'),
    targetedAnswerOptionBttn = null, targetedAnswerOptionParent = null;
let addMoreQuestion = document.querySelector('.js-add-more-question'),
    publishBttn = document.querySelector('.js-publish-bttn');

let hourTimerTxt = document.getElementById('hourTimerTxt');

hourTimerTxt.onblur = function(e){
    if(e.currentTarget.value === '0'){
        e.currentTarget.value = '1';
    }
}

//REFRESH
refreshSelectionTaskTypeDrpdwn();
refreshselectionTaskItems();
function refreshSelectionTaskTypeDrpdwn(){
    let selectionTaskTypeDrpdwn = document.querySelectorAll('.js-selection-pop');
    if(selectionTaskTypeDrpdwn){
        selectionTaskTypeDrpdwn.forEach(el=>{
            el.addEventListener('click', chooseQuestionType);
        });
    }
}
function refreshselectionTaskItems(){
    let selectionTaskItems = document.querySelectorAll('.task-create__option-selection-item');
    if(selectionTaskItems){
        selectionTaskItems.forEach(el=>{
            el.addEventListener('click', selectItemInDrpdwn);
        });
    }
}
if(pointsInput){
    pointsInput.forEach(el =>{
        el.addEventListener('keyup', acceptNumbersOnly);
    });
}
addMoreQuestion.addEventListener('click', e=>{
   let questionMakerPanel = document.createElement('DIV'),
        questionMainContent = document.createElement('DIV');
    questionMakerPanel.classList.add('task-create__question-maker-panel');
    questionMainContent.classList.add('task-create__question-main-content');
   //TOP
    let questionMainContentTop = document.createElement('DIV'),
        questionOptions = document.createElement('DIV'),
        deleteQuestionBttn = document.createElement('BUTTON'),
        optionSelectedItem = document.createElement('P'),
        optionSelection = document.createElement('UL');

    optionSelection.classList.add('task-create__option-selection');
    for(let i = 0; i<5; i++){
        let liTag = document.createElement('LI');
        liTag.classList.add('task-create__option-selection-item');
        if(i === 0){
            liTag.setAttribute('data-value', 'fitb');
            liTag.textContent = 'Fill in the blank';
        }else if(i === 1){
            liTag.setAttribute('data-value', 'la');
            liTag.textContent = 'Long answer (Ex. essay)';
        }else if(i === 2){
            liTag.setAttribute('data-value', 'ma');
            liTag.textContent = 'Multiple Answer';
        }else if(i === 3){
            liTag.setAttribute('data-value', 'mc');
            liTag.textContent = 'Multiple choice';
        }else if(i === 4) {
            liTag.setAttribute('data-value', 'id');
            liTag.textContent = 'Identification';
        }
        optionSelection.append(liTag);
    }
    optionSelectedItem.classList.add('task-create__option-selected-item', 'js-selection-pop');
    optionSelectedItem.textContent = '--Select an option--';
    questionOptions.classList.add('task-create__question-options');
    questionOptions.append(optionSelectedItem, optionSelection);
    questionMainContentTop.classList.add('task-create__question-main-content--top');
    deleteQuestionBttn.setAttribute('type', 'button');
    deleteQuestionBttn.classList.add('bttn', 'task-create__bttn-delete', 'js-delete-question');
    deleteQuestionBttn.textContent = 'Delete';
    questionMainContentTop.append(questionOptions, deleteQuestionBttn);

    //MIDDLE
    let questionContentHolder = document.createElement('DIV'),
        questionMainHolderPreview = document.createElement('DIV'),
        questionMainHolderAttachment = document.createElement('DIV');

    questionContentHolder.classList.add('task-create__question-main-content');
    questionMainHolderPreview.classList.add('task-create__answer-preview');
    questionMainHolderAttachment.classList.add('task-create__attachment-wrapper');

    //MIDDLE CONTENT
    let previewNote = document.createElement('P');
        previewNote.classList.add('task-create__answer-preview-note');
        previewNote.textContent = 'Choices';
        questionMainHolderPreview.append(previewNote);

    //BOTTOM CONTENT
    let attachmentArea = document.createElement('DIV'),
        attachmentInput = document.createElement('INPUT'),
        attachmentBttn = document.createElement('BUTTON'),
        attachmentPTag = document.createElement('P');

    attachmentArea.classList.add('task-create__attachment-area');
    attachmentInput.setAttribute('type', 'file');
    attachmentInput.setAttribute('name', 'pictureAttachment[]');
    attachmentInput.classList.add('js-upload-picture');
    attachmentInput.setAttribute('multiple', null);
    attachmentBttn.setAttribute('type', 'button');
    attachmentBttn.classList.add('task-create__attach-bttn', 'bttn');
    attachmentBttn.textContent = 'Add a picture';
    attachmentPTag.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
    questionMainHolderAttachment.append(attachmentArea, attachmentInput, attachmentBttn, attachmentPTag);

    questionContentHolder.append(questionMainHolderPreview, questionMainHolderAttachment);

    //BOTTOM
    let questionBottom = document.createElement('DIV'),
        questionPointsHolder = document.createElement('DIV'),
        questionPointsLbl = document.createElement('LABEL'),
        questionPointsInput = document.createElement('INPUT');

    questionPointsLbl.setAttribute('for', 'pointsTxt') //CHANGE LETTER
    questionPointsLbl.textContent = 'Points for this question: ';
    questionPointsInput.setAttribute('type', 'number');
    questionPointsInput.setAttribute('placeholder', '1');
    questionPointsInput.setAttribute('min', '1');
    questionPointsInput.setAttribute('value', '1');
    questionPointsInput.setAttribute('id', 'pointsTxt'); //CHANGE LETTER

    questionPointsHolder.classList.add('task-create__question-how-many-points');
    questionPointsHolder.append(questionPointsLbl, questionPointsInput);
    questionBottom.classList.add('task-create__question-bottom');
    questionBottom.append(questionPointsHolder);

    questionMainContent.append(questionMainContentTop, questionContentHolder, questionBottom);
    questionMakerPanel.append(questionMainContent);

    let parent = e.currentTarget.parentNode.parentNode;
    parent.children[0].append(questionMakerPanel);
    deleteQuestionBttn.addEventListener('click', deleteQuestion);
    refreshSelectionTaskTypeDrpdwn();
    refreshselectionTaskItems();
    addEventInputFile();
    addAttachmentPicture();
    removeAttachedPicture();
});
let classroomSettings = {};
publishBttn.addEventListener('click', e=>{
    let child = e.currentTarget;
    //TASK INTRO
    //SETTINGS
    let sharedClasses = [],
        timer = [],
        deadline = [];

    classroomSettings['taskTitle'] =  document.getElementById('descriptionTitleTxt').value;
    classroomSettings['underModule'] = taskIntroWrapper.querySelector('.task-create__selection-txt').getAttribute('data-module-id');
    classroomSettings['taskType'] = taskIntroWrapper.querySelector('.js-type-task-dropdown').textContent.toLowerCase();

    let otherClasses = taskIntroWrapper.querySelectorAll('.task-create__options-checkboxes input[type="checkbox"]:checked');
    if(otherClasses.length !== 0){
        for(let i = 0; i<otherClasses.length; i++){
            sharedClasses.push(otherClasses[i].value);
        }
    }
    classroomSettings['sharedClasses'] = sharedClasses;

    let timeRadBttns = taskIntroWrapper.querySelector('.task-create__options-radio-bttn-group input[type="radio"]:checked');
    if(timeRadBttns.value === 'yes'){
        let hour = document.getElementById('hourTimerTxt').value,
            minute = document.getElementById('minuteTimerTxt').value;
        timer.push([hour,minute]);
    }
    classroomSettings['timer'] = timer;

    let dateDeadline = taskIntroWrapper.querySelector('.js-date-txt'),
        timeDeadline = taskIntroWrapper.querySelector('.js-time-txt');
    if(dateDeadline && timeDeadline){
        deadline.push(dateDeadline.textContent, timeDeadline.textContent);
    }
    classroomSettings['deadline'] = deadline;

    let submission = taskIntroWrapper.querySelector('.js-submission input[type="radio"]:checked').value;
    let cheatingAttempt = taskIntroWrapper.querySelector('.js-cheating-attempt input[type="radio"]:checked').value;
    let instruction = document.getElementById('instructionTxt').value;
    if(submission){
        classroomSettings['submission'] = submission;
    }else{
        classroomSettings['submission'] = '';
    }
    if(cheatingAttempt){
        classroomSettings['cheatingAttempt'] = cheatingAttempt;
    }else{
        classroomSettings['cheatingAttempt'] = '';
    }
    if(instruction){
        classroomSettings['instruction'] = instruction;
    }else{
        classroomSettings['instruction'] = '';
    }

    getAllQuestions();

    //CHANGE THE VALIDATION LATER
    if(true){
        publishTask();
    }else{
        //THROW AN ERROR
    }
});
//CLICK FUNCTIONS
function deleteQuestion(e){
    let questionPanelCtr = taskMainContainer.querySelectorAll('.task-create__question-maker-panel');
    let rootParent = e.currentTarget.parentNode.parentNode.parentNode;
    let attachmentPicBox = rootParent.querySelectorAll('.task-create__attachment-holder');
    let checkboxImgBox = rootParent.querySelectorAll('.task-create__ma-choice-wrapper');
    if(attachmentPicBox.length !== 0 || checkboxImgBox.length !== 0){
        let imgPath = [];
        rootParent.classList.add('show-loading');
        if(attachmentPicBox){
            let attachmentLength = attachmentPicBox.length;
            for(let i = attachmentLength - 1; i>=0; i--){
                imgPath.push(attachmentPicBox[i].getAttribute('data-img-path'));
                attachmentPicBox[i].children[1].disabled = true;
            }
        }
        if(checkboxImgBox){
            let checkboxImgBoxLength = checkboxImgBox.length;
            for(let i = checkboxImgBoxLength -1; i>=0; i--){
                imgPath.push(checkboxImgBox[i].children[1].getAttribute('data-img-path'));
                checkboxImgBox[i].querySelector('.task-create__choice-close-bttn').disabled = true;
            }
        }
        let url = '/classroom/delete-multiple-picture';
        const options = {
            method: 'POST',
            headers:{
                'Accept': 'application/json',
                'Content-Type': 'application/json;charset=UTF-8',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({data: imgPath})
        };
        fetch(url, options)
            .then((response)=>{
                return response.text();
            })
            .then((body)=>{
                let result = JSON.parse(body);
                if(result.success){
                    rootParent.classList.add('anim-fadeOutBigRight');
                    setTimeout(()=>{
                        rootParent.remove();
                        questionPanelCtr.forEach(el=>{
                            let questionCtr = el.querySelector('.task-create__question-counter');
                            let index = Array.from(taskMainContainer.children).indexOf(el);
                            if(questionCtr){
                                questionCtr.textContent = 'Question '+(index+1);
                            }
                        });
                    }, 600);
                }else{
                    //FAILED
                    if(attachmentPicBox){
                        rootParent.classList.remove('show-loading');
                        let attachmentLength = attachmentPicBox.length;
                        for(let i = attachmentLength -1; i>=0; i--){
                            attachmentPicBox[1].disabled = false;
                        }
                    }
                }
            })
            .catch(error=>{
                console.log(error);
            });
    }else{
        rootParent.classList.add('anim-fadeOutBigRight');
        setTimeout(()=>{
            rootParent.remove();
            questionPanelCtr.forEach(el=>{
                let questionCtr = el.querySelector('.task-create__question-counter');
                let index = Array.from(taskMainContainer.children).indexOf(el);
                if(questionCtr){
                    questionCtr.textContent = 'Question '+(index+1);
                }
            });
        }, 600);
    }
}
function chooseQuestionType(e){
    let nextElSibling = e.currentTarget.nextElementSibling;
    targetetedParentTaskTypDrpdwn = e.currentTarget.parentNode;
    nextElSibling.classList.toggle('dropdown--active');
}
function selectItemInDrpdwn(e){
    let currentItem = e.currentTarget;
    if(currentItem.getAttribute('data-the-same') !== currentItem.getAttribute('data-value')){
        let prevSibling = currentItem.parentNode.previousSibling;
        prevSibling.textContent = currentItem.textContent;
        prevSibling.setAttribute('data-question-type', currentItem.getAttribute('data-value'));
        whichQuestionTypeToDisplay(e.currentTarget);
        for (let i = 0; i<currentItem.parentNode.childElementCount; i++){
            currentItem.parentNode.children[i].removeAttribute('data-the-same');
        }
        currentItem.setAttribute('data-the-same', currentItem.getAttribute('data-value'));
    }
    e.currentTarget.parentNode.classList.remove('dropdown--active');
}
function markTheCorrectAns(e){
    let highlightedTxt = window.getSelection().toString();
    if(highlightedTxt !== "" && highlightedTxt !== " " && highlightedTxt.length !== 0){
        let rootParentNode = e.currentTarget.parentNode.parentNode;
        let answerKey = rootParentNode.parentNode.querySelector('.task-create__answer-key');
        let input = rootParentNode.querySelector('input');
        window.getSelection().removeAllRanges();
        let pastValue = input.getAttribute('data-past-value'),
            getStoredAnsKey = input.getAttribute('data-answer-key');
        let selectionStart = 0, selectionEnd = 0;
        if(highlightedTxt.charAt(highlightedTxt.length - 1) === ' '){
            selectionStart = input.selectionStart - 1;
            selectionEnd = input.selectionEnd - 1;
        }else{
            selectionStart = input.selectionStart;
            selectionEnd = input.selectionEnd;
        }
        if(pastValue){
            let arrLoc = JSON.parse(pastValue);
            arrLoc.push([selectionStart,selectionEnd]);
            arrLoc.sort((a,b)=>{
                return a[0]-b[0]
            });
            input.setAttribute('data-past-value', JSON.stringify(arrLoc));
        }else{
            input.setAttribute('data-past-value', JSON.stringify([[selectionStart, selectionEnd]]));
        }
        if(getStoredAnsKey){
            getStoredAnsKey = getStoredAnsKey +', '+ highlightedTxt.trim();
            input.setAttribute('data-answer-key', getStoredAnsKey);
            answerKey.textContent = 'Answer keys: '+getStoredAnsKey;
        }else{
            input.setAttribute('data-answer-key', highlightedTxt.trim());
            answerKey.textContent = 'Answer key: '+highlightedTxt.trim();
        }
    }
}
function resetTheCorrectAns(e){
    let rootParentNode = e.currentTarget.parentNode.parentNode;
    let answerKey = rootParentNode.parentNode.querySelector('.task-create__answer-key');
    let input = rootParentNode.querySelector('input');
    input.removeAttribute('data-past-value');
    input.removeAttribute('data-answer-key');
    answerKey.textContent = 'No answer key to display yet.';
}
function checkboxPlainTxtBttn(e){
    let currentBttn = e.currentTarget;
    let parent = currentBttn.parentNode;
    let checkIfElementsExist = currentBttn.parentNode.parentNode.querySelectorAll('.task-create__checkbox-img-wrapper');
    if(checkIfElementsExist.length !== 0){
       if(confirm('Are you sure you want switch to plain text?')){
           let path = [];
           let maChoiceWrapper = parent.parentNode.querySelectorAll('.task-create__ma-choice-wrapper');
           for (let i = 0; i<checkIfElementsExist.length; i++){
               let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
               let checkBox = maChoiceWrapper[i].querySelector('input[type="checkbox"');
               maChoiceWrapper[i].classList.add('show-loading');
               closebttn.disabled =true;
               checkBox.disabled = true;
               path.push(checkIfElementsExist[i].getAttribute('data-img-path'));
           }
           let url = '/classroom/delete-multiple-picture';
           const options = {
               method: 'POST',
               headers:{
                   'Accept': 'application/json',
                   'Content-Type': 'application/json;charset=UTF-8',
                   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
               },
               body: JSON.stringify({data: path})
           };
           fetch(url, options)
               .then((response)=>{
                   return response.text();
               })
               .then((body)=>{
                   let result = JSON.parse(body);
                   if(result.success){
                       for (let i = maChoiceWrapper.length - 1; i>= 0; i--){
                           maChoiceWrapper[i].remove();
                       }
                       parent.setAttribute('data-txt-only', true);
                       let nextSibling = currentBttn.nextElementSibling;
                       let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
                       let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
                       noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
                       nextSibling.style.color = '#7f2aff';
                       currentBttn.style.color = '#fff';
                       bg.style.transformOrigin = 'right';
                       bg.style['webkit'+'Transform'] = 'scaleX(3)';
                       bg.style.transform = 'scaleX(3)';
                       setTimeout(()=>{
                           bg.style.width = currentBttn.offsetWidth + 'px';
                           bg.style.left = currentBttn.offsetLeft + 'px';
                       }, 300);
                   }else{
                       for (let i = 0; i<checkIfElementsExist.length; i++){
                           let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
                           let checkBox = maChoiceWrapper[i].querySelector('input[type="checkbox"');
                           maChoiceWrapper[i].classList.remove('show-loading');
                           closebttn.disabled = false;
                           checkBox.disabled = false;
                           path = [];
                           parent.setAttribute('data-txt-only', false);
                       }
                   }
               })
               .catch(error=>{
                   console.log(error);
               });
       }
    }else{
        parent.setAttribute('data-txt-only', true);
        let nextSibling = currentBttn.nextElementSibling;
        let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
        let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
        noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
        nextSibling.style.color = '#7f2aff';
        currentBttn.style.color = '#fff';
        bg.style.transformOrigin = 'right';
        bg.style['webkit'+'Transform'] = 'scaleX(3)';
        bg.style.transform = 'scaleX(3)';
        setTimeout(()=>{
            bg.style.width = currentBttn.offsetWidth + 'px';
            bg.style.left = currentBttn.offsetLeft + 'px';
        }, 300);
    }
}
function checkboxImageBttn(e){
    let currentBttn = e.currentTarget;
    let prevSibling = currentBttn.previousElementSibling;
    let parent = currentBttn.parentNode;
    parent.setAttribute('data-txt-only', false);
    let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
    let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
    let txtWrapper = parent.parentNode.parentNode.querySelectorAll('.task-create__ma-choice-wrapper');
    if(txtWrapper){
        let txtWrapperLength = txtWrapper.length;
        for(let i = txtWrapperLength - 1; i>= 0; i--){
            txtWrapper[i].remove();
        }
    }
    noteTxt.textContent = 'Note: You are only allowed to add choices with pictures. Switch to plain text if you want to add choices with plain texts.';
    prevSibling.style.color = '#7f2aff';
    currentBttn.style.color = '#fff';
    bg.style.transformOrigin = 'left';
    bg.style['webkit'+'Transform'] = 'scaleX(3)';
    bg.style.transform = 'scaleX(3)';
    setTimeout(()=>{
        bg.style.width = currentBttn.offsetWidth + 'px';
        bg.style.left = currentBttn.offsetLeft + 'px';
    }, 300);
}
function addChoicesInMAFormat(e){
    let child = e.currentTarget;
    let txtOnly = child.parentNode.parentNode.querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
    if(txtOnly === 'true'){
        let choiceWrapper = document.createElement('DIV'),
            checkboxWrapper = document.createElement('DIV'),
            checkInputWrapper = document.createElement('DIV'),
            checkInputWrapperLine = document.createElement('DIV'),
            choiceInput = document.createElement('INPUT'),
            choiceLbl = document.createElement('LABEL'),
            choiceTxt = document.createElement('p');

        let closeBttn = document.createElement('BUTTON'),
            closeBttnLine = document.createElement('SPAN');
        closeBttn.classList.add('task-create__choice-close-bttn');
        closeBttnLine.classList.add('task-create__choice-close-bttn-line');
        closeBttn.setAttribute('type', 'button');
        closeBttn.classList.add('bttn');
        closeBttn.append(closeBttnLine);

        choiceWrapper.classList.add('task-create__ma-choice-wrapper');
        checkboxWrapper.classList.add('task-create__ma-checkbox-wrapper');
        checkInputWrapper.classList.add('task-create__ma-checkinput-wrapper');
        checkInputWrapperLine.classList.add('task-create__ma-checkinput-wrapper-line');
        choiceInput.setAttribute('type', 'checkbox');

        let randomString = Math.random().toString(36).substr(7);
        choiceInput.setAttribute('id', randomString);
        choiceInput.setAttribute('value', 'null');
        choiceLbl.setAttribute('for', randomString);
        choiceTxt.textContent = 'Place the choice name here';
        choiceTxt.classList.add('task-create__ma-txt-input');

        checkInputWrapper.append(choiceTxt, checkInputWrapperLine);
        checkboxWrapper.append(choiceInput, choiceLbl);
        choiceWrapper.append(checkboxWrapper, checkInputWrapper, closeBttn);
        child.parentNode.insertBefore(choiceWrapper, child);

        choiceTxt.addEventListener('click', e=>{
            choiceTxt.contentEditable = true;
            choiceTxt.focus();
            let range = document.createRange(),
                sel = window.getSelection();
            range.selectNodeContents(choiceTxt);
            sel.removeAllRanges();
            sel.addRange(range);
        });
        choiceTxt.onblur = function(){
            choiceTxt.contentEditable = false;
            if(choiceTxt.textContent.trim() === "" && choiceTxt.textContent.trim().length === 0){
                choiceInput.value = "";
                choiceTxt.textContent = "Place choice name here";
            }
        }
        choiceTxt.addEventListener('keyup', e=>{
            choiceInput.value = choiceTxt.textContent;
        });
        closeBttn.addEventListener('click', e=>{
            let parent = e.currentTarget.parentNode;
            parent.remove();
        });
    }else{
        let inputFile = document.createElement('INPUT');
        inputFile.setAttribute('type', 'file');
        inputFile.style.display = 'none';
        inputFile.click();
        inputFile.onchange = function(e){
            if(e.target.files.length){
                inputFile.files = e.target.files;
                let choiceWrapper = document.createElement('DIV'),
                    checkboxWrapper = document.createElement('DIV'),
                    choiceInput = document.createElement('INPUT'),
                    choiceLbl = document.createElement('LABEL');

                choiceWrapper.classList.add('task-create__ma-choice-wrapper');
                checkboxWrapper.classList.add('task-create__ma-checkbox-wrapper');
                choiceInput.setAttribute('type', 'checkbox');
                choiceInput.disabled = true;
                let randomString = Math.random().toString(36).substr(7);
                choiceInput.setAttribute('id', randomString);
                choiceInput.setAttribute('value', randomString);
                choiceLbl.setAttribute('for', randomString);
                checkboxWrapper.append(choiceInput, choiceLbl);

                let imgWrapper = document.createElement('DIV'),
                    img = document.createElement('IMG'),
                    closeBttnWrapper = document.createElement('DIV'),
                    closeBttn = document.createElement('BUTTON'),
                    closeSpan = document.createElement('SPAN');

                imgWrapper.classList.add('task-create__checkbox-img-wrapper', 'show-loading');
                closeSpan.classList.add('task-create__choice-close-bttn-line');
                closeBttn.classList.add('task-create__choice-close-bttn', 'bttn');
                closeBttn.append(closeSpan);
                closeBttnWrapper.append(closeBttn);
                closeBttnWrapper.style.display = 'none';
                const reader = new FileReader();
                reader.addEventListener('load', function(){
                    img.setAttribute('src', this.result);
                    img.setAttribute('alt', "Image for checkbox");
                    img.classList.add('img-fluid', 'task-create__checkbox-img');
                });
                reader.readAsDataURL(inputFile.files[0]);

                //ADD DELETE/EDIT BUTTON
                imgWrapper.append(img);
                choiceWrapper.append(checkboxWrapper, imgWrapper, closeBttnWrapper);
                child.parentNode.insertBefore(choiceWrapper, child);

                let formData = new FormData();
                formData.append('file', inputFile.files[0]);
                formData.append('classUrl', classroomUrl);
                let url = '/classroom/upload-checkbox-picture';
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
                            imgWrapper.setAttribute('data-img-id', result.imageID);
                            imgWrapper.setAttribute('data-img-path', result.storagePath);
                            imgWrapper.classList.remove('show-loading');
                            choiceInput.disabled = false;
                            closeBttnWrapper.style.display = null;
                            imgWrapper.addEventListener('click', e=>{
                                e.currentTarget.parentNode.querySelector('input[type="checkbox"]').click();
                            });
                            closeBttn.addEventListener('click', e=>{
                                let childBttn = e.currentTarget;
                                let childBttnWrapper = childBttn.parentNode.parentNode;
                                childBttn.disabled = true;
                                childBttnWrapper.classList.add('show-loading');
                                let data = {
                                    path: childBttnWrapper.querySelector('.task-create__checkbox-img-wrapper').getAttribute('data-img-path')
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
                                        childBttnWrapper.classList.remove('show-loading');
                                        childBttnWrapper.remove();
                                    }else{
                                        childBttnWrapper.classList.remove('show-loading');
                                        alert('Something went wrong please try again later.');
                                    }
                                    childBttn.disabled = false
                                }).catch((error)=>{
                                    console.log(error);
                                });
                            });
                        }
                    })
                    .catch(error=>{
                        console.log(error);
                    });
            }
        }
    }
}
//MANIPULATORS
function whichQuestionTypeToDisplay(target){
    let rootParentNode = target.parentNode.parentNode.parentNode.parentNode;
    let answerPreviewContainer = rootParentNode.querySelector('.task-create__answer-preview');
    let questionHolder = rootParentNode.querySelector('.task-create__question-main--top');
    let questionAnsTop = rootParentNode.querySelector('.task-create__ans-question-top');
    let correctAnsHolder = rootParentNode.querySelector('.task-create__correct-ans-wrapper');
    let attachmentTxt = rootParentNode.querySelector('.task-create__attachment-wrapper p');
    let questionPanelCtr = Array.from(taskMainContainer.children).indexOf(rootParentNode.parentNode) + 1;
    if(questionAnsTop){
        questionAnsTop.remove();
    }
    if(correctAnsHolder){
        correctAnsHolder.remove();
    }
    if(questionHolder){
        questionHolder.remove();
    }
    let parentOrigLength = answerPreviewContainer.childElementCount - 1;
    if(parentOrigLength){
        for (let i = parentOrigLength; i>0; i--){
            answerPreviewContainer.children[i].remove();
        }
    }
    let type = target.getAttribute('data-value');
    rootParentNode.parentNode.setAttribute('data-question-type', type);
    switch (type) {
        case 'fitb':
            showFITBFormat(target,answerPreviewContainer, questionPanelCtr);
            attachmentTxt.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
            break;
        case 'la':
            showLAFormat(target, answerPreviewContainer, questionPanelCtr);
            attachmentTxt.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
            break;
        case 'id':
            showIDFormat(target, answerPreviewContainer, questionPanelCtr);
            attachmentTxt.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
            break;
        case 'ma':
            showMAFormat(target, answerPreviewContainer, questionPanelCtr);
            attachmentTxt.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
            break;
        case 'mc':
            showMCFormat(target, answerPreviewContainer, questionPanelCtr);
            attachmentTxt.textContent = 'Teachers are only allowed to upload pictures with following extensions: .gif, .png, .jpeg/.jpg';
            break;
        default:
            break;
    }
}
let content = [];
function getAllQuestions(){
    content = [];
    let questions = document.querySelectorAll('.task-create__question-maker-panel');
    if(questions.length !== 0){
        for (let i = 0; i < questions.length; i++){
            let type = questions[i].getAttribute('data-question-type');
            let attachments = questions[i].querySelectorAll('.task-create__attachment-holder');
            let attachmentsID = [];
            if(attachments.length !== 0){
                for(let i = 0;i<attachments.length; i++){
                    attachmentsID.push(attachments[i].getAttribute('data-img-id'));
                }
            }
            if(type === 'fitb'){
                let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
                let points = questions[i].querySelector('.task-create__question-how-many-points input[type="number"]').value;
                content.push(['fitb', input.value, input.getAttribute('data-past-value'), points, attachmentsID]);
            }else if(type === 'la'){
                let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
                let points = questions[i].querySelector('.task-create__question-how-many-points input[type="number"]').value;
                content.push(['la', input.value, points, attachmentsID]);
            }else if(type === 'ma'){
                let txtOnly = questions[i].querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
                let answerValues = [], choices = [];
                let checkboxes = questions[i].querySelectorAll('.task-create__ma-wrapper input[type="checkbox"]');
                let points = questions[i].querySelector('.task-create__question-how-many-points input[type="number"]').value;
                if(txtOnly === 'true'){
                    if(checkboxes.length !== 0){
                        for(let i = 0; i<checkboxes.length; i++){
                            choices.push(checkboxes[i].value);
                            if(checkboxes[i].checked){
                                answerValues.push(checkboxes[i].value);
                            }
                        }
                    }
                    content.push(['ma', 'true', choices, answerValues, points, attachmentsID]);
                }else if(txtOnly === 'false'){
                    if(checkboxes.length !== 0){
                        for(let i = 0; i<checkboxes.length; i++){
                            let img = checkboxes[i].parentNode.parentNode.querySelector('.task-create__checkbox-img-wrapper').getAttribute('data-img-id');
                            choices.push(img);
                            if(checkboxes[i].checked){
                                answerValues.push(img);
                            }
                        }
                    }
                    content.push(['ma', 'false', choices, answerValues, points, attachmentsID]);
                }
            }else if(type === 'mc'){
                let txtOnly = questions[i].querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
                let answerValues = [], choices = [];
                let radios = questions[i].querySelectorAll('.task-create__mc-choice-wrapper input[type="radio"]');
                let points = questions[i].querySelector('.task-create__question-how-many-points input[type="number"]').value;
                if(txtOnly === 'true'){
                    if(radios.length !== 0){
                        for(let i = 0; i<radios.length; i++){
                            choices.push(radios[i].value);
                            if(radios[i].checked){
                                answerValues.push(radios[i].value);
                            }
                        }
                    }
                    content.push(['mc', 'true', choices, answerValues, points, attachmentsID]);
                }else if(txtOnly === 'false'){
                    if(radios.length !== 0){
                        for(let i = 0; i<radios.length; i++){
                            let img = radios[i].parentNode.parentNode.querySelector('.task-create__checkbox-img-wrapper').getAttribute('data-img-id');
                            choices.push(img);
                            if(radios[i].checked){
                                answerValues.push(img);
                            }
                        }
                    }
                    content.push(['mc', 'false', choices, answerValues, points, attachmentsID]);
                }
            }else if(type === 'id'){
                let input = questions[i].querySelector('.task-create__question-wrapper input[type="text"]');
                let correctAns = questions[i].querySelector('.task-create__correct-ans-wrapper input[type="text"]');
                let points = questions[i].querySelector('.task-create__question-how-many-points input[type="number"]').value;
                content.push(['id', input.value, correctAns.value, points, attachmentsID]);
            }
        }
    }
}
//AUTO GENERATE
function showLAFormat(target, answerPreviewContainer, questionPanelCtr){
    let parentNode = answerPreviewContainer.parentNode;
    let questionMainHolderTop = document.createElement('DIV')
    questionMainHolderTop.classList.add('task-create__question-main--top');
    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');

    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question '+questionPanelCtr;
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Students are expected to have a long answer which can\'t be checked automatically.';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote);

    parentNode.insertBefore(questionMainHolderTop, answerPreviewContainer)

    let LATxtArea = document.createElement('TEXTAREA');
    LATxtArea.disabled = true;
    answerPreviewContainer.append(LATxtArea);
}
function showFITBFormat(target, answerPreviewContainer, questionPanelCtr){
    let parentNode = answerPreviewContainer.parentNode;
    let questionMainHolderTop = document.createElement('DIV')
    questionMainHolderTop.classList.add('task-create__question-main--top');
    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');

    let bttnWrapper = document.createElement('DIV'),
        correctAnsBttn = document.createElement('BUTTON'),
        resetBttn = document.createElement('BUTTON');

    bttnWrapper.classList.add('task-create__question-bttn-controls')
    correctAnsBttn.setAttribute('type', 'button');
    correctAnsBttn.classList.add('bttn', 'task-create__mark-as-correct-ans-bttn');
    correctAnsBttn.textContent = 'Mark as correct answer';

    resetBttn.setAttribute('type', 'button');
    resetBttn.classList.add('bttn', 'task-create__reset-question-bttn');
    resetBttn.textContent = 'Reset Answer key';

    bttnWrapper.append(correctAnsBttn, resetBttn);

    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question '+questionPanelCtr;
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Highlight the word that you want to be the correct answer then click the "Mark as correct answer" button below.';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote, bttnWrapper);

    let answerKey = document.createElement('P');
    answerKey.classList.add('task-create__answer-key');
    answerKey.textContent = 'No answer key to display yet.';
    answerPreviewContainer.append(answerKey);

    parentNode.insertBefore(questionMainHolderTop, answerPreviewContainer);
    correctAnsBttn.addEventListener('click', markTheCorrectAns);
    resetBttn.addEventListener('click', resetTheCorrectAns);
}
function showIDFormat(target, answerPreviewContainer, questionPanelCtr){
    let parentNode = answerPreviewContainer.parentNode;
    let questionMainHolderTop = document.createElement('DIV');
    questionMainHolderTop.classList.add('task-create__question-main--top');
    let ansMainHolderTop = document.createElement('DIV');
    ansMainHolderTop.classList.add('task-create__ans-question-top');

    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');


    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question '+questionPanelCtr;
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Dummy text here';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote);

    let correctAnsLbl = document.createElement('H3'),
        correctAnsWrapper = document.createElement('DIV'),
        correctAnsInput = document.createElement('INPUT'),
        correctAnsLine = document.createElement('DIV'),
        correctAnsNote = document.createElement('DIV');


    correctAnsLbl.classList.add('task-create__correct-ans-counter');
    correctAnsLbl.textContent = 'Correct Answer';
    correctAnsWrapper.classList.add('task-create__correct-ans-wrapper');
    correctAnsInput.setAttribute('type', 'text');
    correctAnsInput.setAttribute('placeholder', 'Place your correct answer here');
    correctAnsLine.classList.add('task-create__correct-ans-wrapper-line');
    correctAnsNote.classList.add('task-create__note');
    correctAnsNote.textContent = 'Note: Dummy text here';

    correctAnsWrapper.append(correctAnsInput, correctAnsLine);
    ansMainHolderTop.append(correctAnsLbl, correctAnsWrapper, correctAnsNote);


    parentNode.insertBefore(questionMainHolderTop, answerPreviewContainer);
    parentNode.insertBefore(ansMainHolderTop, answerPreviewContainer);
}
function showMAFormat(target, answerPreviewContainer, questionPanelCtr){
    let parentNode = answerPreviewContainer.parentNode;
    let questionMainHolderTop = document.createElement('DIV');
    questionMainHolderTop.classList.add('task-create__question-main--top');

    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');

    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question '+questionPanelCtr;
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Dummy text here';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote);
    parentNode.insertBefore(questionMainHolderTop, answerPreviewContainer);

    let bttnControlsWrapper = document.createElement('DIV'),
        bttnBG = document.createElement('DIV'),
        plainTxtBttn = document.createElement('BUTTON'),
        imageBttn = document.createElement('BUTTON'),
        bttnControlTxt = document.createElement('P'),
        maWrapper = document.createElement('DIV'),
        maWrapperAddBttn = document.createElement('BUTTON');

    bttnBG.classList.add('task-create__bttn-checkbox-bg');
    bttnControlsWrapper.classList.add('task-create__bttn-controls');
    bttnControlsWrapper.setAttribute('data-txt-only', true);
    plainTxtBttn.setAttribute('type','button');
    plainTxtBttn.classList.add('bttn','task-create__bttn-checkbox');
    plainTxtBttn.style.color = '#fff';
    imageBttn.setAttribute('type','button');
    imageBttn.classList.add('bttn','task-create__bttn-checkbox');
    maWrapperAddBttn.setAttribute('type','button');
    maWrapperAddBttn.classList.add('bttn','task-create__ma-wrapper-bttn');
    plainTxtBttn.textContent = 'Plain text only';
    imageBttn.textContent = 'Image only';
    maWrapperAddBttn.textContent = 'Add choices';
    bttnControlTxt.classList.add('task-create__checkbox-note');
    bttnControlTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
    maWrapper.classList.add('task-create__ma-wrapper');

    plainTxtBttn.addEventListener('click', checkboxPlainTxtBttn);
    imageBttn.addEventListener('click', checkboxImageBttn);
    maWrapperAddBttn.addEventListener('click', addChoicesInMAFormat);

    maWrapper.append(maWrapperAddBttn);
    bttnControlsWrapper.append(plainTxtBttn, imageBttn, bttnBG);
    answerPreviewContainer.append(bttnControlsWrapper, bttnControlTxt, maWrapper);
    bttnBG.style.width = plainTxtBttn.offsetWidth + 'px';
    bttnBG.style.height = plainTxtBttn.offsetHeight + 'px';
    bttnBG.style.top = plainTxtBttn.offsetTop + 'px';
    bttnBG.style.left = plainTxtBttn.offsetLeft + 'px';
}
function showMCFormat(target, answerPreviewContainer, questionPanelCtr){
    let parentNode = answerPreviewContainer.parentNode;
    let questionMainHolderTop = document.createElement('DIV');
    questionMainHolderTop.classList.add('task-create__question-main--top');

    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');

    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question '+questionPanelCtr;
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Dummy text here';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote);
    parentNode.insertBefore(questionMainHolderTop, answerPreviewContainer);

    let bttnControlsWrapper = document.createElement('DIV'),
        bttnBG = document.createElement('DIV'),
        plainTxtBttn = document.createElement('BUTTON'),
        imageBttn = document.createElement('BUTTON'),
        bttnControlTxt = document.createElement('P'),
        maWrapper = document.createElement('DIV'),
        maWrapperAddBttn = document.createElement('BUTTON');

    bttnBG.classList.add('task-create__bttn-checkbox-bg');
    bttnControlsWrapper.classList.add('task-create__bttn-controls');
    bttnControlsWrapper.setAttribute('data-txt-only', 'true');
    plainTxtBttn.setAttribute('type','button');
    plainTxtBttn.classList.add('bttn','task-create__bttn-checkbox');
    plainTxtBttn.style.color = '#fff';
    imageBttn.setAttribute('type','button');
    imageBttn.classList.add('bttn','task-create__bttn-checkbox');
    maWrapperAddBttn.setAttribute('type','button');
    maWrapperAddBttn.classList.add('bttn','task-create__ma-wrapper-bttn');
    plainTxtBttn.textContent = 'Plain text only';
    imageBttn.textContent = 'Image only';
    maWrapperAddBttn.textContent = 'Add choices';
    bttnControlTxt.classList.add('task-create__checkbox-note');
    bttnControlTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
    maWrapper.classList.add('task-create__mc-wrapper');
    let randomString = Math.random().toString(36).substr(7);
    maWrapper.setAttribute('data-name-value', randomString);
    plainTxtBttn.addEventListener('click', mcPlainTxtBttn);
    imageBttn.addEventListener('click', mcImageBttn);
    maWrapperAddBttn.addEventListener('click', mcChoicesInMAFormat);

    maWrapper.append(maWrapperAddBttn);
    bttnControlsWrapper.append(plainTxtBttn, imageBttn, bttnBG);
    answerPreviewContainer.append(bttnControlsWrapper, bttnControlTxt, maWrapper);
    bttnBG.style.width = plainTxtBttn.offsetWidth + 'px';
    bttnBG.style.height = plainTxtBttn.offsetHeight + 'px';
    bttnBG.style.top = plainTxtBttn.offsetTop + 'px';
    bttnBG.style.left = plainTxtBttn.offsetLeft + 'px';
}
function mcPlainTxtBttn(e){
    let currentBttn = e.currentTarget;
    let parent = currentBttn.parentNode;
    let checkIfElementsExist = currentBttn.parentNode.parentNode.querySelectorAll('.task-create__checkbox-img-wrapper');
    if(checkIfElementsExist.length !== 0){
        if(confirm('Are you sure you want switch to plain text?')){
            let path = [];
            let maChoiceWrapper = parent.parentNode.querySelectorAll('.task-create__mc-choice-wrapper');
            for (let i = 0; i<checkIfElementsExist.length; i++){
                let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
                let checkBox = maChoiceWrapper[i].querySelector('input[type="radio"');
                maChoiceWrapper[i].classList.add('show-loading');
                closebttn.disabled =true;
                checkBox.disabled = true;
                path.push(checkIfElementsExist[i].getAttribute('data-img-path'));
            }
            let url = '/classroom/delete-multiple-picture';
            const options = {
                method: 'POST',
                headers:{
                    'Accept': 'application/json',
                    'Content-Type': 'application/json;charset=UTF-8',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({data: path})
            };
            fetch(url, options)
                .then((response)=>{
                    return response.text();
                })
                .then((body)=>{
                    let result = JSON.parse(body);
                    if(result.success){
                        for (let i = maChoiceWrapper.length - 1; i>= 0; i--){
                            maChoiceWrapper[i].remove();
                        }
                        parent.setAttribute('data-txt-only', true);
                        let nextSibling = currentBttn.nextElementSibling;
                        let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
                        let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
                        noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
                        nextSibling.style.color = '#7f2aff';
                        currentBttn.style.color = '#fff';
                        bg.style.transformOrigin = 'right';
                        bg.style['webkit'+'Transform'] = 'scaleX(3)';
                        bg.style.transform = 'scaleX(3)';
                        setTimeout(()=>{
                            bg.style.width = currentBttn.offsetWidth + 'px';
                            bg.style.left = currentBttn.offsetLeft + 'px';
                        }, 300);
                    }else{
                        for (let i = 0; i<checkIfElementsExist.length; i++){
                            let closebttn = maChoiceWrapper[i].querySelector('.task-create__choice-close-bttn');
                            let checkBox = maChoiceWrapper[i].querySelector('input[type="checkbox"');
                            maChoiceWrapper[i].classList.remove('show-loading');
                            closebttn.disabled = false;
                            checkBox.disabled = false;
                            path = [];
                            parent.setAttribute('data-txt-only', false);
                        }
                    }
                })
                .catch(error=>{
                    console.log(error);
                });
        }
    }else{
        parent.setAttribute('data-txt-only', true);
        let nextSibling = currentBttn.nextElementSibling;
        let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
        let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
        noteTxt.textContent = 'Note: You are only allowed to add choices with plain text. Switch to image only if you want to add choices with pictures.';
        nextSibling.style.color = '#7f2aff';
        currentBttn.style.color = '#fff';
        bg.style.transformOrigin = 'right';
        bg.style['webkit'+'Transform'] = 'scaleX(3)';
        bg.style.transform = 'scaleX(3)';
        setTimeout(()=>{
            bg.style.width = currentBttn.offsetWidth + 'px';
            bg.style.left = currentBttn.offsetLeft + 'px';
        }, 300);
    }
}
function mcImageBttn(e){
    let currentBttn = e.currentTarget;
    let prevSibling = currentBttn.previousElementSibling;
    let parent = currentBttn.parentNode;
    parent.setAttribute('data-txt-only', false);
    let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
    let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
    let txtWrapper = parent.parentNode.parentNode.querySelectorAll('.task-create__mc-choice-wrapper');
    if(txtWrapper){
        let txtWrapperLength = txtWrapper.length;
        for(let i = txtWrapperLength - 1; i>= 0; i--){
            txtWrapper[i].remove();
        }
    }
    noteTxt.textContent = 'Note: You are only allowed to add choices with pictures. Switch to plain text if you want to add choices with plain texts.';
    prevSibling.style.color = '#7f2aff';
    currentBttn.style.color = '#fff';
    bg.style.transformOrigin = 'left';
    bg.style['webkit'+'Transform'] = 'scaleX(3)';
    bg.style.transform = 'scaleX(3)';
    setTimeout(()=>{
        bg.style.width = currentBttn.offsetWidth + 'px';
        bg.style.left = currentBttn.offsetLeft + 'px';
    }, 300);
}
function mcChoicesInMAFormat(e) {
    let child = e.currentTarget;
    let txtOnly = child.parentNode.parentNode.querySelector('.task-create__bttn-controls').getAttribute('data-txt-only');
    if (txtOnly === 'true') {
        let choiceWrapper = document.createElement('DIV'),
            checkboxWrapper = document.createElement('DIV'),
            checkInputWrapper = document.createElement('DIV'),
            checkInputWrapperLine = document.createElement('DIV'),
            choiceInput = document.createElement('INPUT'),
            choiceLbl = document.createElement('LABEL'),
            choiceTxt = document.createElement('p');

        let closeBttn = document.createElement('BUTTON'),
            closeBttnLine = document.createElement('SPAN');
        closeBttn.classList.add('task-create__choice-close-bttn');
        closeBttnLine.classList.add('task-create__choice-close-bttn-line');
        closeBttn.setAttribute('type', 'button');
        closeBttn.classList.add('bttn');
        closeBttn.append(closeBttnLine);

        choiceWrapper.classList.add('task-create__mc-choice-wrapper');
        checkboxWrapper.classList.add('task-create__mc-checkbox-wrapper');
        checkInputWrapper.classList.add('task-create__mc-checkinput-wrapper');
        checkInputWrapperLine.classList.add('task-create__mc-checkinput-wrapper-line');
        choiceInput.setAttribute('type', 'radio');
        let randomString = Math.random().toString(36).substr(7);
        choiceInput.setAttribute('id', randomString);
        choiceInput.setAttribute('value', 'null');
        choiceLbl.setAttribute('for', randomString);
        choiceTxt.textContent = 'Place the choice name here';
        choiceTxt.classList.add('task-create__mc-txt-input');

        checkInputWrapper.append(choiceTxt, checkInputWrapperLine);
        checkboxWrapper.append(choiceInput, choiceLbl);
        choiceWrapper.append(checkboxWrapper, checkInputWrapper, closeBttn);
        child.parentNode.insertBefore(choiceWrapper, child);
        choiceInput.setAttribute('name', child.parentNode.getAttribute('data-name-value'));
        choiceTxt.addEventListener('click', e => {
            choiceTxt.contentEditable = true;
            choiceTxt.focus();
            let range = document.createRange(),
                sel = window.getSelection();
            range.selectNodeContents(choiceTxt);
            sel.removeAllRanges();
            sel.addRange(range);
        });
        choiceTxt.onblur = function () {
            choiceTxt.contentEditable = false;
            if (choiceTxt.textContent.trim() === "" && choiceTxt.textContent.trim().length === 0) {
                choiceInput.value = "";
                choiceTxt.textContent = "Place choice name here";
            }
        }
        choiceTxt.addEventListener('keyup', e => {
            choiceInput.value = choiceTxt.textContent;
        });
        closeBttn.addEventListener('click', e => {
            let parent = e.currentTarget.parentNode;
            parent.remove();
        });
    } else {
        let child = e.currentTarget;
        let inputFile = document.createElement('INPUT');
        inputFile.setAttribute('type', 'file');
        inputFile.style.display = 'none';
        inputFile.click();
        inputFile.onchange = function (e) {
            if (e.target.files.length) {
                inputFile.files = e.target.files;
                let choiceWrapper = document.createElement('DIV'),
                    checkboxWrapper = document.createElement('DIV'),
                    choiceInput = document.createElement('INPUT'),
                    choiceLbl = document.createElement('LABEL');

                choiceWrapper.classList.add('task-create__mc-choice-wrapper');
                checkboxWrapper.classList.add('task-create__mc-checkbox-wrapper');
                choiceInput.setAttribute('type', 'radio');
                choiceInput.disabled = true;
                let randomString = Math.random().toString(36).substr(7);
                choiceInput.setAttribute('id', randomString);
                choiceInput.setAttribute('value', randomString);
                choiceLbl.setAttribute('for', randomString);
                checkboxWrapper.append(choiceInput, choiceLbl);

                let imgWrapper = document.createElement('DIV'),
                    img = document.createElement('IMG'),
                    closeBttnWrapper = document.createElement('DIV'),
                    closeBttn = document.createElement('BUTTON'),
                    closeSpan = document.createElement('SPAN');

                imgWrapper.classList.add('task-create__checkbox-img-wrapper', 'show-loading');
                closeSpan.classList.add('task-create__choice-close-bttn-line');
                closeBttn.classList.add('task-create__choice-close-bttn', 'bttn');
                closeBttn.append(closeSpan);
                closeBttnWrapper.append(closeBttn);
                closeBttnWrapper.style.display = 'none';
                choiceInput.setAttribute('name', child.parentNode.getAttribute('data-name-value'));
                const reader = new FileReader();
                reader.addEventListener('load', function () {
                    img.setAttribute('src', this.result);
                    img.setAttribute('alt', "Image for checkbox");
                    img.classList.add('img-fluid', 'task-create__checkbox-img');
                });
                reader.readAsDataURL(inputFile.files[0]);

                imgWrapper.append(img);
                choiceWrapper.append(checkboxWrapper, imgWrapper, closeBttnWrapper);
                child.parentNode.insertBefore(choiceWrapper, child);
                let formData = new FormData();
                formData.append('file', inputFile.files[0]);
                formData.append('classUrl', classroomUrl);
                let url = '/classroom/upload-checkbox-picture';
                const options = {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                };
                fetch(url, options)
                    .then((response) => {
                        return response.text();
                    })
                    .then((body) => {
                        let result = JSON.parse(body);
                        if (result.success) {
                            imgWrapper.setAttribute('data-img-id', result.imageID);
                            imgWrapper.setAttribute('data-img-path', result.storagePath);
                            imgWrapper.classList.remove('show-loading');
                            choiceInput.disabled = false;
                            closeBttnWrapper.style.display = null;
                            imgWrapper.addEventListener('click', e => {
                                e.currentTarget.parentNode.querySelector('input[type="radio"]').click();
                            });
                            closeBttn.addEventListener('click', e => {
                                let childBttn = e.currentTarget;
                                let childBttnWrapper = childBttn.parentNode.parentNode;
                                childBttn.disabled = true;
                                childBttnWrapper.classList.add('show-loading');
                                let data = {
                                    path: childBttnWrapper.querySelector('.task-create__checkbox-img-wrapper').getAttribute('data-img-path')
                                }
                                let url = '/classroom/delete-task-picture';
                                let options = {
                                    method: 'POST',
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json;charset=UTF-8',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify(data)
                                }
                                fetch(url, options).then((response) => {
                                    return response.text();
                                }).then((body) => {
                                    let result = JSON.parse(body);
                                    if (result.success) {
                                        childBttnWrapper.classList.remove('show-loading');
                                        childBttnWrapper.remove();
                                    } else {
                                        childBttnWrapper.classList.remove('show-loading');
                                        alert('Something went wrong please try again later.');
                                    }
                                    childBttn.disabled = false
                                }).catch((error) => {
                                    console.log(error);
                                });
                            });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        }
    }
}

//FETCH
function publishTask(){
    let url = '/task/publish';
    const options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({settings: classroomSettings, contents: content, cID: classID})
    };
    fetch(url, options)
        .then((response)=>{
            return response.text();
        })
        .then((body)=>{
            let result = JSON.parse(body);
            if(result.success) {
                location.href = '/task/'+classroomUrl;
            }else{
                //ERROR SCROLL TO TOP
            }
        })
        .catch(error=>{
            console.log(error);
        });
}
