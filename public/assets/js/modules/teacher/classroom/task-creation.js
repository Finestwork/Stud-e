let targetetedParentTaskTypDrpdwn = null;

let pointsInput = document.querySelectorAll('.task-create__question-how-many-points input');
let showAnswerOptionBttn = document.querySelectorAll('.js-select-option-answer'),
    selectionAnswerList = document.querySelectorAll('.task-create__question-option-choice-list-item'),
    targetedAnswerOptionBttn = null, targetedAnswerOptionParent = null;
let addMoreQuestion = document.querySelector('.task-create__add-more-question');




//AUTO GENERATE
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
    optionSelectedItem.textContent = '-- Select an option --';
    questionOptions.classList.add('task-create__question-options');
    questionOptions.append(optionSelectedItem, optionSelection);
    questionMainContentTop.classList.add('task-create__question-main-content--top');
    deleteQuestionBttn.setAttribute('type', 'button');
    deleteQuestionBttn.classList.add('bttn', 'task-create__bttn-delete');
    deleteQuestionBttn.textContent = 'Delete';
    questionMainContentTop.append(questionOptions, deleteQuestionBttn);

    //MIDDLE
    let questionContentHolder = document.createElement('DIV'),
        questionMainHolderTop = document.createElement('DIV'),
        questionMainHolderPreview = document.createElement('DIV'),
        questionMainHolderAttachment = document.createElement('DIV');

    questionContentHolder.classList.add('task-create__question-main-content');
    questionMainHolderTop.classList.add('task-create__question-main--top');
    questionMainHolderPreview.classList.add('task-create__answer-preview');
    questionMainHolderAttachment.classList.add('task-create__attachment-wrapper');

    //TOP CONTENT
    let questionCounter = document.createElement('H3'),
        questionWrapper = document.createElement('DIV'),
        questionInput = document.createElement('INPUT'),
        questionLine = document.createElement('DIV'),
        questionNote = document.createElement('DIV');

    questionCounter.classList.add('task-create__question-counter');
    questionCounter.textContent = 'Question 1'; //WILL CHANGE LATE
    questionWrapper.classList.add('task-create__question-wrapper');
    questionInput.setAttribute('type', 'text');
    questionInput.setAttribute('placeholder', 'Place your question here');
    questionLine.classList.add('task-create__question-wrapper-line');
    questionNote.classList.add('task-create__note');
    questionNote.textContent = 'Note: Students are expected to have a long answer which can\'t be checked automatically.';

    questionWrapper.append(questionInput, questionLine);
    questionMainHolderTop.append(questionCounter, questionWrapper, questionNote);

    //MIDDLE CONTENT
    let previewNote = document.createElement('P');
        previewNote.classList.add('task-create__answer-preview-note');
        previewNote.textContent = 'Answer preview';
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

    questionContentHolder.append(questionMainHolderTop, questionMainHolderPreview, questionMainHolderAttachment);

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
    addEventInputFile();
    addAttachmentPicture();
    removeAttachedPicture();
});
//CLICK FUNCTIONS
function chooseQuestionType(e){
    let nextElSibling = e.currentTarget.nextElementSibling;
    targetetedParentTaskTypDrpdwn = e.currentTarget.parentNode;
    nextElSibling.classList.toggle('dropdown--active');
}
function selectItemInDrpdwn(e){
    let prevSibling = e.currentTarget.parentNode.previousSibling;
    prevSibling.textContent = e.currentTarget.textContent;
    prevSibling.setAttribute('data-question-type', e.currentTarget.getAttribute('data-value'));
    e.currentTarget.parentNode.classList.remove('dropdown--active');
}




