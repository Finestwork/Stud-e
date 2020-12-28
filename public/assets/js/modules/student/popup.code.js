let enrollAddCodeBttn = document.getElementById('enrollAddCodeBttn'),
    enrollRemoveBttn = document.getElementById('enrollRemoveCodeBttn'),
    enrollSubmitBttn = document.getElementById('enrollSubmitBttn');

let notExistWrapper = document.querySelector('.enroll__warning-not-exist'),
    codeBlockWrapper = document.querySelector('.enroll__warning-not-allowed'),
    successWrapper = document.querySelector('.enroll__success'),
    alreadyApproved = document.querySelector('.enroll__already-enrolled'),
    unSuccessWrapper = document.querySelector('.enroll__Unsuccessful');
    warningEmpty = document.querySelector('.enroll__warning-empty');

let enrollMainWrapper = document.querySelector('.enroll');
let enrollGroupContainer = document.querySelector('.enroll__group-container');
let sideBarBttns = document.querySelectorAll('.sidebar__bttn'),
    closeCodePanel = document.querySelector('.enroll__close-bttn');

let codeCtr = 1, removeBttnCtr = 0;
let test = null;

enrollAddCodeBttn.addEventListener('click', e=>{
    makeCodeElement(e.currentTarget);
});
enrollSubmitBttn.addEventListener('click', ()=>{
    let codes = [];
    resetCodeWarnings();
    let inputs = enrollGroupContainer.querySelectorAll('input');
    if(inputs.length === 0){
        toggleWarningEmpty(true);
    }else{
        for(let i = 0; i<inputs.length; i++){
            if(inputs[i].value == ''){
                enrollGroupContainer.scrollTop = 0;
                toggleSuccess(false);
                toggleWarningEmpty(true);
                break;
            }else{
                codes.push(inputs[i].value);
            }
        }
    }
    if(codes.length !== 0 && codes.length === inputs.length){
        sendCode(codes);
        toggleWarningEmpty(false);
    }
});
enrollRemoveBttn.addEventListener('click', ()=>{

    removeCodeElement(enrollSubmitBttn);
});
sideBarBttns.forEach(el =>{
   el.addEventListener('click',()=>{
       let isFixSeen = document.querySelector('.fixed-bg--active');
       if(isFixSeen !== null){
           bttnCtr = 0;
           isFixSeen.classList.remove('fixed-bg--active');
       }
       enrollMainWrapper.style.display = 'block';
       setTimeout(()=>{
           enrollMainWrapper.classList.add('enroll--active');
       }, 150);
   });
});
closeCodePanel.addEventListener('click', ()=>{
    enrollMainWrapper.classList.remove('enroll--active');
    setTimeout(()=>{
        let popCode1 = document.getElementById('popCode1');
        popCode1.value = '';
        enrollMainWrapper.style.display = 'none';
        resetClosePanel(closeCodePanel);
    }, 150);
});

//FUNCTIONS

//FETCH
function sendCode(codes){
    let url = '/enroll';
    let jsonData = JSON.stringify({code: codes});
    const options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: jsonData
    };
    fetch(url, options)
        .then((response)=>{
            return response.text();
        })
        .then((body)=>{
            let result = JSON.parse(body);
            test = result;
            if(result.error){
                toggleSuccess(false);
            }else{
                //Checked values
                if(result.codeNotExist.length > 0){
                    codeDoesNotExist(result.codeNotExist);
                }
                if(result.codeBlock.length > 0){
                    codeBlock(result.codeBlock);
                }
                if(result.codeSuccess.length > 0){
                    codeSuccess(result.codeSuccess);
                }
                if(result.requestExist.length > 0){
                    codeRequestExist(result.requestExist);
                }
                if(result.requestAlreadyApproved.length > 0){
                    codeAlreadyApproved(result.requestAlreadyApproved);
                }
                if(result.requestIsNotAllowed.length > 0){
                    codeBlock(result.requestIsNotAllowed);
                }
                enrollGroupContainer.scrollTop = 0;
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
//DOM
function removeCodeElement(child){
    codeCtr--;
    if(7+removeBttnCtr > 7){
        child.parentNode.children[7+removeBttnCtr].remove();
    }
    if(removeBttnCtr > 0){
        removeBttnCtr--;
    }
    if(removeBttnCtr === 0){
        enrollRemoveBttn.style.display = 'none';
    }
}
function makeCodeElement(child){
    codeCtr++;
    removeBttnCtr++;
    let enrollCodeGroup = document.createElement('DIV'),
        label = document.createElement('LABEL'),
        input = document.createElement('INPUT');
    enrollCodeGroup.classList.add('enroll__code-group');
    label.setAttribute('for', 'popCode' + codeCtr);
    label.textContent = 'Class code: '+codeCtr;
    input.setAttribute('type', 'text');
    input.setAttribute('Placeholder', 'Place your class code here');
    input.setAttribute('id', 'popCode' + codeCtr);
    enrollCodeGroup.append(label, input);
    child.parentNode.insertBefore(enrollCodeGroup, child);
    input.focus();
    if(removeBttnCtr > 0){
        enrollRemoveBttn.style.display = 'block';
    }

}
function toggleWarningEmpty(cond){
    if(cond){
        warningEmpty.style.display = 'block';
    }else{
        warningEmpty.style.display = 'none';
    }
}
function toggleSuccess(cond){
    let el = document.querySelector('.enroll__success');
    if(cond){
        el.style.display = 'block';
    }else{
        el.style.display = 'none';
    }
}
function codeDoesNotExist(arr){
    let ulTag = document.createElement('UL');
    ulTag.classList.add('enroll__warning-list-container');
    for(let i = 0; i<arr.length; i++){
        let el = document.createElement('LI');
        el.classList.add('enroll__warning-list');
        el.textContent = '• '+arr[i];
        ulTag.append(el);
    }
    notExistWrapper.append(ulTag);
    notExistWrapper.style.display = 'block';
}
function codeBlock(arr){
    let ulTag = document.createElement('UL');
    ulTag.classList.add('enroll__warning-list-container');
    for(let i = 0; i<arr.length; i++){
        let el = document.createElement('LI');
        el.classList.add('enroll__warning-list');
        el.textContent = '• '+arr[i];
        ulTag.append(el);
    }
    codeBlockWrapper.append(ulTag);
    codeBlockWrapper.style.display = 'block';
}
function codeSuccess(arr){
    let ulTag = document.createElement('UL');
    ulTag.classList.add('enroll__success-list-container');
    for(let i = 0; i<arr.length; i++){
        let el = document.createElement('LI');
        el.classList.add('enroll__success-list');
        el.textContent = '• '+arr[i];
        ulTag.append(el);
    }
    successWrapper.append(ulTag);
    successWrapper.style.display = 'block';
}
function codeAlreadyApproved(arr){
    let ulTag = document.createElement('UL');
    ulTag.classList.add('enroll__success-list-container');
    for(let i = 0; i<arr.length; i++){
        let el = document.createElement('LI');
        el.classList.add('enroll__success-list');
        el.textContent = '• '+arr[i];
        ulTag.append(el);
    }
    alreadyApproved.append(ulTag);
    alreadyApproved.style.display = 'block';
}
function codeRequestExist(arr){
    let ulTag = document.createElement('UL');
    ulTag.classList.add('enroll__Unsuccessful-list-container');
    for(let i = 0; i<arr.length; i++){
        let el = document.createElement('LI');
        el.classList.add('enroll__Unsuccessful-list');
        el.textContent = '• '+arr[i];
        ulTag.append(el);
    }
    unSuccessWrapper.append(ulTag);
    unSuccessWrapper.style.display = 'block';
}
function resetCodeWarnings(){
    toggleWarningEmpty(false);
    if(notExistWrapper.lastElementChild.tagName === 'UL'){
        notExistWrapper.removeChild(notExistWrapper.lastElementChild);
    }
    if(codeBlockWrapper.lastElementChild.tagName === 'UL'){
        codeBlockWrapper.removeChild(codeBlockWrapper.lastElementChild);
    }
    if(successWrapper.lastElementChild.tagName === 'UL'){
        successWrapper.removeChild(successWrapper.lastElementChild);
    }
    if(unSuccessWrapper.lastElementChild.tagName === 'UL'){
        unSuccessWrapper.removeChild(unSuccessWrapper.lastElementChild);
    }
    notExistWrapper.style.display = 'none';
    codeBlockWrapper.style.display = 'none';
    successWrapper.style.display = 'none';
    unSuccessWrapper.style.display = 'none';
}
function resetClosePanel(child){
    let enrollGroups = enrollGroupContainer.querySelectorAll('.enroll__code-group');
    let totalLength = enrollGroups.length-1;
    for(let i = 7+totalLength; 7<i; i--){
        console.log('Loop: '+i + ', boolean: '+ (i+7));
        console.log(child.parentNode.children[i]);
        child.parentNode.children[i].remove();
    }

    resetCodeWarnings();
    codeCtr = 1;
    removeBttnCtr = 0;
    enrollRemoveBttn.style.display = 'none';
    //remove warning
}
