let targetetedParentTaskTypDrpdwn = null;

let pointsInput = document.querySelectorAll('.task-create__question-how-many-points input');
let showAnswerOptionBttn = document.querySelectorAll('.js-select-option-answer'),
    selectionAnswerList = document.querySelectorAll('.task-create__question-option-choice-list-item'),
    targetedAnswerOptionBttn = null, targetedAnswerOptionParent = null;
let addMoreQuestion = document.querySelector('.task-create__add-more-question');

let startStrLoc = null, endStrLoc = null;
let txtOnly = true;


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

    questionPointsLbl.setAttribute('for', 'pointsQuestion1') //CHANGE LETTER
    questionPointsLbl.textContent = 'Points for this question: ';
    questionPointsInput.setAttribute('type', 'number');
    questionPointsInput.setAttribute('placeholder', '1');
    questionPointsInput.setAttribute('min', '1');
    questionPointsInput.setAttribute('id', 'pointsQuestion1'); //CHANGE LETTER

    questionPointsHolder.classList.add('task-create__question-how-many-points');
    questionPointsHolder.append(questionPointsLbl, questionPointsInput);
    questionBottom.classList.add('task-create__question-bottom');
    questionBottom.append(questionPointsHolder);

    questionMainContent.append(questionMainContentTop, questionContentHolder, questionBottom);
    questionMakerPanel.append(questionMainContent);

    let parent = e.currentTarget.parentNode;
    parent.children[0].append(questionMakerPanel);

    refreshSelectionTaskTypeDrpdwn();
    refreshselectionTaskItems();
    refreshDeleteQuestion();
    addEventInputFile();
    addAttachmentPicture();
    removeAttachedPicture();
});
//CLICK FUNCTIONS
function refreshDeleteQuestion(){
    let deleteBttn = taskMainContainer.querySelectorAll('.js-delete-question');
    deleteBttn.forEach(el=>{
       el.addEventListener('click', e=>{
           let questionPanelCtr = taskMainContainer.querySelectorAll('.task-create__question-maker-panel');
           let rootParent = e.currentTarget.parentNode.parentNode.parentNode;
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
       })
    });
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
    let highlightedTxt = window.getSelection().toString().trim();
    if(highlightedTxt !== "" && highlightedTxt.length !== 0){
        let rootParentNode = e.currentTarget.parentNode.parentNode;
        let answerKey = rootParentNode.parentNode.querySelector('.task-create__answer-key');
        let input = rootParentNode.querySelector('input');
        window.getSelection().removeAllRanges();
        let pastValue = input.getAttribute('data-past-value'),
            getStoredAnsKey = input.getAttribute('data-answer-key');
        let selectionStart = input.selectionStart, selectionEnd = input.selectionEnd;
        if(pastValue){
            //BELOW COMMENT IS NEEDED TO CHECK THE LOCATION OF THE STRING
            //pastValue.slice(0,96) + pastValue.slice(96,102).replace(pastValue.substring(selectionStart,selectionEnd), '*') + pastValue.slice(102);
            pastValue = pastValue + `[${selectionStart},${selectionEnd}]`;
            input.setAttribute('data-past-value', pastValue);
        }else{
            input.setAttribute('data-past-value', `[${selectionStart},${selectionEnd}]`);
        }
        if(getStoredAnsKey){
            getStoredAnsKey = getStoredAnsKey +', '+ highlightedTxt;
            input.setAttribute('data-answer-key', getStoredAnsKey);
            answerKey.textContent = 'Answer keys: '+getStoredAnsKey;
        }else{
            input.setAttribute('data-answer-key', highlightedTxt);
            answerKey.textContent = 'Answer key: '+highlightedTxt;
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
                       txtOnly = true;
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
                       }
                   }
               })
               .catch(error=>{
                   console.log(error);
               });
       }
    }else{
        txtOnly = true;
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
    txtOnly = false;
    let currentBttn = e.currentTarget;
    let prevSibling = currentBttn.previousElementSibling;
    let parent = currentBttn.parentNode;
    let bg = parent.querySelector('.task-create__bttn-checkbox-bg');
    let noteTxt = parent.parentNode.querySelector('.task-create__checkbox-note');
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
    if(txtOnly){
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
    txtOnly = false;
    let rootParentNode = target.parentNode.parentNode.parentNode.parentNode;
    let answerPreviewContainer = rootParentNode.querySelector('.task-create__answer-preview');
    let questionHolder = rootParentNode.querySelector('.task-create__question-main--top');
    let questionAnsTop = rootParentNode.querySelector('.task-create__ans-question-top');
    let correctAnsHolder = rootParentNode.querySelector('.task-create__correct-ans-wrapper');
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
    switch (type) {
        case 'fitb':
            showFITBFormat(target,answerPreviewContainer, questionPanelCtr);
            break;
        case 'la':
            showLAFormat(target, answerPreviewContainer, questionPanelCtr);
            break;
        case 'id':
            showIDFormat(target, answerPreviewContainer, questionPanelCtr);
            break;
        case 'ma':
            txtOnly = true;
            showMAFormat(target, answerPreviewContainer, questionPanelCtr);
            break;
        default:
            break;
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
    resetBttn.textContent = 'Reset everything';

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
