let lineIndicator = document.querySelector('.task-home__line-indicator');
let bttnControls = document.querySelectorAll('.js-control-bttn');

lineIndicator.style.width = bttnControls[0].getBoundingClientRect().width +'px';
lineIndicator.style.left = bttnControls[0].offsetLeft +'px';
let whichBttnWidth = bttnControls[0];



let progressSelection = document.querySelector('.js-selection-type-task'),
    progressSelectionItem = document.querySelector('.js-selection-type-task-item');

let subjectSelection = document.querySelector('.js-selection-subject'),
    subjectSelectionItem = document.querySelector('.js-selection-subject-item');

let statusSelection = document.querySelector('.js-selection-progress'),
    statusSelectionItem = document.querySelector('.js-selection-progress-item');

let labels = document.querySelectorAll('.grade__label');

let assignBttnControl = document.querySelector('.js-control-assigned'),
    pendingBttnControl = document.querySelector('.js-control-pending'),
    missedBttnControl = document.querySelector('.js-control-missed'),
    doneBttnControl = document.querySelector('.js-control-done');

let loader = document.querySelector('.task-home__loader');
let pendingTable = document.querySelector('.task-home__pending'),
    assignedTable = document.querySelector('.grade__table'),
    missedTable = document.querySelector('.task-home__missed'),
    dontTable = document.querySelector('.task-home__done');

bttnControls.forEach(function(el){
    el.addEventListener('click', getPosition);
});

let pendingTableScrollbar = document.querySelector('.pending-scroll-bar'),
    missedTableScrollbar = document.querySelector('.missed-scroll-bar'),
    doneTableScrollbar = document.querySelector('.done-scroll-bar');



scrollBar(pendingTableScrollbar,pendingTableScrollbar, false);
scrollBar(missedTableScrollbar,missedTableScrollbar, false);
scrollBar(doneTableScrollbar,doneTableScrollbar, false);


progressSelection.addEventListener('click', function(){
    selection(this, progressSelectionItem);
});
progressSelectionItem .addEventListener('click', function(e){
    selectedOptionItem(e, progressSelection);
    let index = getIndex(e.target.textContent);
    displaySelectEffects(index);
});
subjectSelection.addEventListener('click', function(){
    selection(this, subjectSelectionItem);
});
subjectSelectionItem .addEventListener('click', function(e){
    selectedOptionItem(e, subjectSelection);
});
statusSelection.addEventListener('click', function(){
    selection(this, statusSelectionItem);
});
statusSelectionItem .addEventListener('click', function(e){
    selectedOptionItem(e, statusSelection);
});


//AFTER HIDING TABLES ALL DATA SHOULD BE FETCH VIA AXIOS
assignBttnControl.addEventListener('click', function(){
    hideAllTables();
    displayLoader();
    setTimeout(function(){
        hideLoader();
        showElement(assignedTable);
    }, 4000);
});
pendingBttnControl.addEventListener('click', function(){
    hideAllTables();
    displayLoader();
    setTimeout(function(){
        hideLoader();
        showElement(pendingTable);
    }, 4000);
});
missedBttnControl.addEventListener('click', function(){
    hideAllTables();
    displayLoader();
    setTimeout(function(){
        hideLoader();
        showElement(missedTable);
    }, 4000);
});
doneBttnControl.addEventListener('click', function(){
    hideAllTables();
    displayLoader();
    setTimeout(function(){
        hideLoader();
        showElement(dontTable);
    }, 4000);
});

function getPosition(el){
    bttnControls.forEach(function(el){
        el.classList.remove('bttn--active');
    });
    el.target.classList.add('bttn--active');
    lineIndicator.style.left = el.target.offsetLeft +'px';
    lineIndicator.style.width = el.target.offsetWidth +'px';
    whichBttnWidth = el.target;
}
function selection(el, nextEl){
    el.classList.toggle('selection--active');
    nextEl.classList.remove('selection--active');
}
function selectedOptionItem(e, el){
    let firstSibling = e.currentTarget.previousElementSibling;
    let text = e.target.textContent;
    firstSibling.children[0].textContent = text;
    el.classList.remove('selection--active');
}
function displaySelectEffects(ind){
    let counter = 0;
    if(ind === 0){
        resetOpacity();
    }else{
        resetOpacity();
        labels.forEach(function(){
            console.log(counter, ind);
            if(counter !== ind - 1){
                labels[counter].style.opacity = '0.15';
            }
            counter++;
        });
    }
}
function resetOpacity(){
    let counter = 0;
    labels.forEach(function(){
        labels[counter].style.opacity = '1';
        counter++;
    });
}
function getIndex(txt){
    switch (txt) {
        case 'All':
            return 0;
            break;
        case 'Exam':
            return 1;
            break;
        case 'Assignment':
            return 2;
            break;
        case 'Quiz':
            return 3;
            break;
        case 'Seatwork':
            return 4;
            break;
        case 'Project':
            return 5;
            break;
        default:
            return -1;
    }
}
function showElement(el){
    el.style.display = 'block';
}
function hideElement(el){
    el.style.display = 'none';
}
function hideAllTables(){
    hideElement(assignedTable);
    hideElement(pendingTable);
    hideElement(missedTable);
    hideElement(dontTable);
}
function displayLoader(){
    showElement(loader);
}
function hideLoader(){
    hideElement(loader);
}


document.addEventListener('click', function(e){
    if(!progressSelection.contains(e.target)){
        progressSelection.classList.remove('selection--active');
    }
    if(!subjectSelection.contains(e.target)){
        subjectSelection.classList.remove('selection--active');
    }
    if(!statusSelection.contains(e.target)){
        statusSelection.classList.remove('selection--active');
    }
})
window.onresize = function(){
    lineIndicator.style.left = whichBttnWidth.offsetLeft + 'px';
    lineIndicator.style.width = whichBttnWidth.offsetWidth + 'px';
}
