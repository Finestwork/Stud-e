let modulesTopContainer = document.querySelectorAll('.modules__container-top');

modulesTopContainer.forEach(el=>{
    el.addEventListener('click', toggleModuleContainer);
});

function toggleModuleContainer(e){
    e.currentTarget.classList.toggle('container--active');

    pastElPosition = e.currentTarget.nextSibling.nextElementSibling;
    const ch = pastElPosition.clientHeight,
        sh = pastElPosition.scrollHeight,
        isCollapsed = !ch,
        noHeightSet = !pastElPosition.style.height;
    pastElPosition.style.height = (isCollapsed || noHeightSet ? sh : 0) + "px";
}

