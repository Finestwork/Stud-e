document.addEventListener('click', e =>{
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
