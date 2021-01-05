let attachmentPictureBttns = document.querySelectorAll('.task-create__attach-bttn');



if(attachmentPictureBttns){
    attachmentPictureBttns.forEach(el=>{
       el.addEventListener('click', addPictureToTheQuestion);
    });
}


//CLICK FUNCTIONS
function addPictureToTheQuestion(e){
    let input = e.currentTarget.previousElementSibling;
    input.click();
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
