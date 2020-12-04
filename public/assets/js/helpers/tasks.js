let taskItems = document.querySelectorAll('.task__item-top');
taskItems.forEach(el=>{
    el.addEventListener('click', task);
});
let pastElPosition = 0;
function task(e){
    let els = document.querySelectorAll('.task__item-bottom');
    els.forEach(el=>{
        el.style.height = '0';
    });
    pastElPosition = e.currentTarget.nextSibling.nextElementSibling;
    const ch = pastElPosition.clientHeight,
                sh = pastElPosition.scrollHeight,
                isCollapsed = !ch,
                noHeightSet = !pastElPosition.style.height;
    pastElPosition.style.height = (isCollapsed || noHeightSet ? sh : 0) + "px";

}
