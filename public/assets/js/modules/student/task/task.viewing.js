let answerSheet = document.querySelector('.answer-sheet'),
    answerSheetBttn = document.querySelector('.task-viewing__bttn');

//SHOWING OF ANSWER SHEET SHOULD BE DEPEND ON FETCHING (LIVE)
answerSheetBttn.addEventListener('click', function(){
   answerSheet.classList.toggle('answer-sheet--active');
});
