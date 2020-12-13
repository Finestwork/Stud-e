let modulesTopContainer = document.querySelectorAll('.modules__container-top');

modulesTopContainer.forEach(el=>{
    el.addEventListener('click', toggleModuleContainer);
});
let activeModules = [];
function toggleModuleContainer(e){
    e.currentTarget.classList.toggle('container--active');
    activeModules.push(e.currentTarget);
    pastElPosition = e.currentTarget.nextSibling.nextElementSibling;
    const ch = pastElPosition.clientHeight,
        sh = pastElPosition.scrollHeight,
        isCollapsed = !ch,
        noHeightSet = !pastElPosition.style.height;
    pastElPosition.style.height = (isCollapsed || noHeightSet ? sh : 0) + "px";
}

window.onresize = function(){
    activeModules.forEach(el =>{
       el.classList.remove('container--active');
       el.nextSibling.nextElementSibling.style.height = 0;
    });
}

