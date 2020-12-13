let selectionTaskType = document.querySelector('.js-selection-type-task'),
    selectionProgress = document.querySelector('.js-selection-progress');

let selectionTaskTypeItem = document.querySelector('.js-selection-type-task-item'),
    selectionProgressItem = document.querySelector('.js-selection-progress-item');

selectionTaskType.addEventListener('click', function(){
    this.classList.toggle('selection--active');
    selectionProgress.classList.remove('selection--active');
});
selectionTaskTypeItem.addEventListener('click', function(e){
    let firstSibling = e.currentTarget.previousElementSibling;
    let text = e.target.textContent;
    firstSibling.children[0].textContent = text;
    selectionTaskType.classList.remove('selection--active');
});

selectionProgress.addEventListener('click', function(){
    this.classList.toggle('selection--active');
    selectionTaskType.classList.remove('selection--active');
});
selectionProgressItem .addEventListener('click', function(e){
    let firstSibling = e.currentTarget.previousElementSibling;
    let text = e.target.textContent;
    firstSibling.children[0].textContent = text;
    selectionProgress.classList.remove('selection--active');
});

document.addEventListener('click', function(e){
   if(!selectionTaskType.contains(e.target)){
       selectionTaskType.classList.remove('selection--active')
   }
    if(!selectionProgress.contains(e.target)){
        selectionProgress.classList.remove('selection--active')
    }
});

let tableScrollbarWrapper = document.getElementById('js-scrollbar-table'),
    tableWrapper = document.querySelector('.task__table-container');
scrollBar(tableWrapper, tableScrollbarWrapper, true);

let filterBttn = document.getElementById('filterBttn'), filterCtr = 0;
filterBttn.addEventListener('click', function(e){
    let firstElement = e.currentTarget.parentNode.nextElementSibling;
    if(filterCtr === 0){
        firstElement.style.display = '-webkit-flex';
        firstElement.style.display = 'flex';
        filterCtr++;
    }else{
        firstElement.style.display = 'none';
        filterCtr = 0
    }


});
