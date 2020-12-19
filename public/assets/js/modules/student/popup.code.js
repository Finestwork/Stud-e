let enrollAddCodeBttn = document.getElementById('enrollAddCodeBttn'),
    enrollSubmitBttn = document.getElementById('enrollSubmitBttn');

let notExistWrapper = document.querySelector('.enroll__warning-not-exist'),
    codeBlockWrapper = document.querySelector('.enroll__warning-not-allowed'),
    successWrapper = document.querySelector('.enroll__success'),
    alreadyApproved = document.querySelector('.enroll__already-enrolled'),
    unSuccessWrapper = document.querySelector('.enroll__Unsuccessful');

let enrollMainWrapper = document.querySelector('.enroll');
let enrollGroupContainer = document.querySelector('.enroll__group-container');
let sideBarBttns = document.querySelectorAll('.sidebar__bttn'),
    closeCodePanel = document.querySelector('.enroll__close-bttn');

let codeCtr = 1;
let test = null;

enrollAddCodeBttn.addEventListener('click', e=>{
    makeCodeElement(e.currentTarget);
});
enrollSubmitBttn.addEventListener('click', ()=>{
    let codes = [];
    resetCodeWarnings();
    let parentContainer = document.querySelector('.enroll__group-container');
    let inputs = parentContainer.querySelectorAll('input');
    if(inputs.length === 0){
        toggleWarningEmpty(true);
    }else{
        for(let i = 0; i<inputs.length; i++){
            if(inputs[i].value == ''){
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
        enrollMainWrapper.style.display = 'none';
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
                enrollGroupContainer.scrollTop = 0;
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
//DOM
function makeCodeElement(child){
    codeCtr++;
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
}
function toggleWarningEmpty(cond){
    let el = document.querySelector('.enroll__warning-empty');
    if(cond){
        el.style.display = 'block';
    }else{
        el.style.display = 'none';
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
    if(notExistWrapper.lastElementChild.tagName === 'UL'){
        notExistWrapper.removeChild(notExistWrapper.lastElementChild);
    }
    if(notExistWrapper.lastElementChild.tagName === 'UL'){
        codeBlockWrapper.removeChild(codeBlockWrapper.lastElementChild);
    }
    if(notExistWrapper.lastElementChild.tagName === 'UL'){
        successWrapper.removeChild(successWrapper.lastElementChild);
    }
    if(notExistWrapper.lastElementChild.tagName === 'UL'){
        unSuccessWrapper.removeChild(unSuccessWrapper.lastElementChild);
    }
    notExistWrapper.style.display = 'hidden';
    codeBlockWrapper.style.display = 'hidden';
    successWrapper.style.display = 'hidden';
    unSuccessWrapper.style.display = 'hidden';
}

