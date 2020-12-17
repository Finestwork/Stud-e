let classCard = document.querySelector('.main-content');
imgChecker.imgLoader(classCard);

let optionBttn = document.getElementById('optionBttn'),
    selectionContainer = document.querySelector('.option__selection-container');

//TEMPORARY VARIABLES
let completedContainer = document.getElementById('completed'),
    currentContainer = document.getElementById('current');
optionBttn.addEventListener('click', function(){
    this.classList.toggle('option--active');
});

//WHEN AXIOS IS IMPLEMENT
//MAIN CONTAINER SHOULD BE CLEAR THEN LOAD THE NEWLY FETCHED DATA
//NOT BY SWITCHING DISPLAY PROPERTY
selectionContainer.addEventListener('click', function(e){
    if(e.target.tagName === 'LI'){
        let text = e.target.textContent;
        completedContainer.style.display = 'none';
        currentContainer.style.display = 'none';
        fetchPrototype(text);
        optionBttn.children[0].textContent = text;
        optionBttn.classList.remove('option--active');
    }
});
document.addEventListener('click', function(e){
    if(!optionBttn.contains(e.target)){
        optionBttn.classList.remove('option--active');
    }
});

function fetchPrototype(text){
    let loader = classCard.querySelector('.loader-box');
    loader.style.display = 'block';
    setTimeout(function(){
        loader.style.display = 'none';
        //SHOW FETCHED ELEMENTS VIA JSON OR AXIOS
        if(text === 'Currently Active'){
            completedContainer.style.display = 'none';
            currentContainer.style.display = 'block';
        }else if(text === 'Completed'){
            currentContainer.style.display = 'none';
            completedContainer.style.display = 'block';
        }
    },3000);
}
