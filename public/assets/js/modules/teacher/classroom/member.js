let linksScrollbar = document.querySelector('.classroom__link-scrollbar'),
    linkWrapper = document.querySelector('.classroom__link-wrapper');
let imgs = document.querySelector('.member__lists');
let optionBttns = document.querySelectorAll('.member__bttn--option'),
    panelBttns = document.querySelectorAll('.member__panel-bttn');
let approvedBttn = document.querySelector('.js-bttn-accepted'),
    requestBttn = document.querySelector('.js-bttn-request'),
    blockedBttn = document.querySelector('.js-bttn-blocked');
let emptyBox = document.querySelector('.member__empty');
let loaderBox = document.querySelector('.loader-box');

let popupMssg = document.querySelector('.popup__message'),
    popupContainer = document.querySelector('.popup__bg'),
    popupNoBttn = document.querySelector('.popup__no'),
    popupYesBttn = document.querySelector('.popup__yes'),
    popupErrorBttn = document.querySelector('.popup__error-bttn'),
    txtContainer = document.querySelector('.popup__txt-container'),
    errorContainer = document.querySelector('.popup__error-message'),
    loaderContainer = document.querySelector('.popup__loader-container');

scrollBar(linkWrapper, linksScrollbar, false);



//IF VALUES ARE NOT NULL
if(imgs){
    imgChecker.imgLoader(imgs);
}
if(optionBttns){
    optionBttns.forEach(el =>{
        el.addEventListener('click', bttnOptionFunc)
    });
}
if(panelBttns){
    panelBttns.forEach(el =>{
        el.addEventListener('click', bttnPanelFunc)
    });
}

let targetedEl = null;
//CLICK
let ID = null, type = null;
popupNoBttn.addEventListener('click', function () {
    popupContainer.classList.add('popup--hidden');
});
popupYesBttn.addEventListener('click', function () {
    if(ID && type){
        setTimeout(function(){
            showLoadingContainer();
            if(type === 'accept'){
                approveRequestMember(ID);
            }else if(type === 'fromRequestToBlock'){
                blockMember(ID, type);
            }else if(type === 'fromAcceptedToBlock'){
                blockMember(ID, type);
            }else if(type === 'cancel'){
                cancelRequest(ID);
            }else if(type == 'remove'){
                removeStudent(ID);
            }else if(type == 'unblock'){
                unblockStudent(ID);
            }
        }, 1500)

    }
});
popupErrorBttn.addEventListener('click', function () {
    hidePopupError();
});
document.addEventListener('click', e =>{
    if(targetedEl !== null){
        if(!targetedEl.contains(e.target)){
            hideElement(targetedEl.nextElementSibling);
        }
    }
});
approvedBttn.addEventListener('click', e=>{
    if(!e.currentTarget.classList.contains('member__bttn--active')){
        if(emptyBox){
            emptyBox.style.display = 'none';
        }
        fetchApprovedMembers();
        displayActiveBttn(approvedBttn);
    }
});
requestBttn.addEventListener('click', e=>{
    if(!e.currentTarget.classList.contains('member__bttn--active')){
        if(emptyBox){
            emptyBox.style.display = 'none';
        }
        fetchRequestMembers();
        displayActiveBttn(requestBttn);
    }
});
blockedBttn.addEventListener('click', e=>{
    if(!e.currentTarget.classList.contains('member__bttn--active')){
        if(emptyBox){
            emptyBox.style.display = 'none';
        }
        fetchBlockMembers();
        displayActiveBttn(blockedBttn);
    }
});
//FUNCTIONS

//FETCH
function fetchRequestMembers(){
    let memberMainContainer = document.querySelector('.member__main-container');
    if(memberMainContainer){
        hideMemberContainer();
    }
    let url = '/classroom/request-member/'+classUrl;
    let jsonData = JSON.stringify({'url':classUrl});
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
            if(Object.keys(result).length > 1){
                displayRequestList(result[1]);
            }else{
                $mssg = 'Your request list is empty, it\'s okay! no students, no headaches.';
                showEmptyWrapper($mssg);
            }
        })
        .catch(error=>{
            console.log(error);
            hideLoader();
        });
}
function fetchApprovedMembers(){
    let memberMainContainer = document.querySelector('.member__main-container');
    if(memberMainContainer){
        hideMemberContainer();
    }
    let url = '/classroom/get-approved-members/'+classUrl;
    let jsonData = JSON.stringify({'url':classUrl});
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
            if(Object.keys(result).length > 1){
                displayApprovedList(result[1]);
            }else{
                $mssg = 'Check your request list, your student needs your approval first before completely joining your classroom.';
                showEmptyWrapper($mssg);
            }
        })
        .catch(error=>{
            console.log(error);
            hideLoader();
        });
}
function fetchBlockMembers(){
    let memberMainContainer = document.querySelector('.member__main-container');
    if(memberMainContainer){
        hideMemberContainer();
    }
    let url = '/classroom/get-blocked-members/'+classUrl;
    let jsonData = JSON.stringify({'url':classUrl});
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
            if(Object.keys(result).length > 1){
                displayBlockList(result[1]);
            }else{
                $mssg = 'Your block list is empty this means that you haven\'t blocked any students yet';
                showEmptyWrapper($mssg);
            }
        })
        .catch(error=>{
            console.log(error);
            hideLoader();
        });
}

// FETCH ACTIONS
function approveRequestMember($id){
    let url = '/classroom/approve-member/'+classUrl;
    let jsonData = JSON.stringify({id: $id});
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
            if(result.success){
                location.reload();
            }else{
                //ERROR MESSAGE
                showLoaderError();
                hidePopupError();
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
function blockMember($id, $type){
    showLoadingContainer();
    let url = '/classroom/block-member/'+classUrl;
    let jsonData = JSON.stringify({id: $id, type: $type});
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
            if(result.success){
                location.reload();
            }else{
                showLoaderError();
                hidePopupError();
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
function cancelRequest($id){
    let url = '/classroom/cancel-member/'+classUrl;
    let jsonData = JSON.stringify({id: $id});
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
            if(result.success){
                location.reload();
            }else{
                //ERROR MESSAGE
                showLoaderError();
                hidePopupError();
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
function removeStudent($id){
    let url = '/classroom/remove-member/'+classUrl;
    let jsonData = JSON.stringify({id: $id});
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
            if(result.success){
                location.reload();
            }else{
                //ERROR MESSAGE
                showLoaderError();
                hidePopupError();
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
function unblockStudent($id){
    let url = '/classroom/unblock-student/'+classUrl;
    let jsonData = JSON.stringify({id: $id});
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
            if(result.success){
                location.reload();
            }else{
                //ERROR MESSAGE
                showLoaderError();
                hidePopupError();
            }
        })
        .catch(error=>{
            console.log(error);
            showLoaderError();
        });
}
//DISPLAY DATA FROM FETCH
function displayRequestList(list){
    let listLength = list.students.length;
    setTimeout(function () {
        let memberContainer = document.createElement('DIV');
        memberContainer.classList.add('member__main-container');
        let emptyBoxWrapper = document.querySelector('.member__empty');
        checkIfElementExist('.member__main-container');
        // LABELS
        let lblsWrapper = document.createElement('DIV'),
            nameLbl = document.createElement('p'),
            dateLbl = document.createElement('p');
        lblsWrapper.classList.add('member__labels');
        nameLbl.classList.add('member__labels-txt');
        dateLbl.classList.add('member__labels-txt');
        nameLbl.textContent = 'Name';
        dateLbl.textContent = 'Date of join';

        lblsWrapper.append(nameLbl);
        lblsWrapper.append(dateLbl);

        //LISTS
        let listContainer = document.createElement('ul');
        listContainer.classList.add('member__lists');

        let LIs = [];
        for(let i = 0; i<listLength; i++){
            //TOP
            let liTag = document.createElement('LI');
            liTag.setAttribute('data-identity', list.students[i][0]['id'])
            liTag.classList.add('member__list');

            //LEFT
            let leftPart = document.createElement('DIV'),
                leftImgWrapper = document.createElement('DIV'),
                img = document.createElement('IMG');
            leftPart.classList.add('member__list-left');
            leftImgWrapper.classList.add('member__list-img');

            //IMG SRC WILL BE REPLACED AFTERWARDS
            img.setAttribute('src', '/assets/imgs/test images/professor.jpg');
            img.setAttribute('alt', 'A picture of a member in this class');
            img.classList.add('adjust-img-js');
            leftImgWrapper.append(img);
            leftPart.append(leftImgWrapper);

            let listInfoWrapper = document.createElement('DIV'),
                listName = document.createElement('P'),
                listPosition = document.createElement('P');
            listInfoWrapper.classList.add('member__list-info');
            listName.classList.add('member__list-name');
            listPosition.classList.add('member__list-position');

            let fname = list.students[i][0]['f_name'],
                lname = list.students[i][0]['m_name'];
            listName.textContent = ucfirst(fname)+ ' ' + ucfirst(lname);
            listPosition.textContent = 'Student';

            listInfoWrapper.append(listName);
            listInfoWrapper.append(listPosition);
            leftPart.append(listInfoWrapper);

            liTag.append(leftPart);

            //RIGHT
            let rightWrapper = document.createElement('DIV');
            rightWrapper.classList.add('member__list-right');
            let date = document.createElement('P');
            date.classList.add('member__list-right-p');
            date.textContent = dateFormat(list.students[i][0]['created_at']);
            rightWrapper.append(date);

            let buttonWrapper = document.createElement('BUTTON'),
                circle1 = document.createElement('SPAN'),
                circle2 = document.createElement('SPAN'),
                circle3 = document.createElement('SPAN');
            buttonWrapper.classList.add('bttn', 'member__bttn--option');
            circle1.classList.add('member__bttn--option__circle', 'circle-1');
            circle2.classList.add('member__bttn--option__circle', 'circle-2');
            circle3.classList.add('member__bttn--option__circle', 'circle-3');

            buttonWrapper.append(circle1);
            buttonWrapper.append(circle2);
            buttonWrapper.append(circle3);
            rightWrapper.append(buttonWrapper);

            let optionPanel = document.createElement('DIV'),
                approveStudBttn = document.createElement('BUTTON'),
                cancelStudBttn = document.createElement('BUTTON'),
                blockStudBttn = document.createElement('BUTTON'),
                profileLink = document.createElement('A');
            optionPanel.classList.add('member__option-panel');
            approveStudBttn.classList.add('member__panel-bttn');
            cancelStudBttn.classList.add('member__panel-bttn');
            blockStudBttn.classList.add('member__panel-bttn');
            profileLink.classList.add('member__panel-bttn');
            profileLink.setAttribute('href', '#');

            approveStudBttn.textContent = 'Accept Request';
            cancelStudBttn.textContent = 'Cancel Request';
            blockStudBttn.textContent = 'Block Student';
            profileLink.textContent = 'View Profile';

            optionPanel.append(approveStudBttn);
            optionPanel.append(cancelStudBttn);
            optionPanel.append(blockStudBttn);
            optionPanel.append(profileLink);
            rightWrapper.append(optionPanel);
            liTag.append(rightWrapper);
            LIs.push(liTag);
        }
        for(let i = 0; i<LIs.length; i++){
            listContainer.append(LIs[i]);
        }
        imgChecker.imgLoader(listContainer);
        memberContainer.append(lblsWrapper);
        memberContainer.append(listContainer);
        emptyBoxWrapper.parentNode.insertBefore(memberContainer, emptyBoxWrapper);
        refreshOptEvent();
        refreshPanelBttnEvent();
    }, 1500);
}
function displayApprovedList(list){
    let listLength = list.students.length;
    setTimeout(function () {
        let memberContainer = document.createElement('DIV');
        memberContainer.classList.add('member__main-container');
        let emptyBoxWrapper = document.querySelector('.member__empty');
        checkIfElementExist('.member__main-container');
        // LABELS
        let lblsWrapper = document.createElement('DIV'),
            nameLbl = document.createElement('p'),
            dateLbl = document.createElement('p');
        lblsWrapper.classList.add('member__labels');
        nameLbl.classList.add('member__labels-txt');
        dateLbl.classList.add('member__labels-txt');
        nameLbl.textContent = 'Name';
        dateLbl.textContent = 'Date of join';

        lblsWrapper.append(nameLbl);
        lblsWrapper.append(dateLbl);

        //LISTS
        let listContainer = document.createElement('ul');
        listContainer.classList.add('member__lists');

        let LIs = [];
        for(let i = 0; i<listLength; i++){
            //TOP
            let liTag = document.createElement('LI');
            liTag.setAttribute('data-identity', list.students[i][0]['id'])
            liTag.classList.add('member__list');

            //LEFT
            let leftPart = document.createElement('DIV'),
                leftImgWrapper = document.createElement('DIV'),
                img = document.createElement('IMG');
            leftPart.classList.add('member__list-left');
            leftImgWrapper.classList.add('member__list-img');

            //IMG SRC WILL BE REPLACED AFTERWARDS
            img.setAttribute('src', '/assets/imgs/test images/professor.jpg');
            img.setAttribute('alt', 'A picture of a member in this class');
            img.classList.add('adjust-img-js');
            leftImgWrapper.append(img);
            leftPart.append(leftImgWrapper);

            let listInfoWrapper = document.createElement('DIV'),
                listName = document.createElement('P'),
                listPosition = document.createElement('P');
            listInfoWrapper.classList.add('member__list-info');
            listName.classList.add('member__list-name');
            listPosition.classList.add('member__list-position');

            let fname = list.students[i][0]['f_name'],
                lname = list.students[i][0]['m_name'];
            listName.textContent = ucfirst(fname)+ ' ' + ucfirst(lname);
            listPosition.textContent = 'Student';

            listInfoWrapper.append(listName);
            listInfoWrapper.append(listPosition);
            leftPart.append(listInfoWrapper);

            liTag.append(leftPart);

            //RIGHT
            let rightWrapper = document.createElement('DIV');
            rightWrapper.classList.add('member__list-right');
            let date = document.createElement('P');
            date.classList.add('member__list-right-p');
            date.textContent = dateFormat(list.students[i][0]['created_at']);
            rightWrapper.append(date);

            let buttonWrapper = document.createElement('BUTTON'),
                circle1 = document.createElement('SPAN'),
                circle2 = document.createElement('SPAN'),
                circle3 = document.createElement('SPAN');
            buttonWrapper.classList.add('bttn', 'member__bttn--option');
            circle1.classList.add('member__bttn--option__circle', 'circle-1');
            circle2.classList.add('member__bttn--option__circle', 'circle-2');
            circle3.classList.add('member__bttn--option__circle', 'circle-3');

            buttonWrapper.append(circle1);
            buttonWrapper.append(circle2);
            buttonWrapper.append(circle3);
            rightWrapper.append(buttonWrapper);

            let optionPanel = document.createElement('DIV'),
                approveStudBttn = document.createElement('BUTTON'),
                blockStudBttn = document.createElement('BUTTON'),
                profileLink = document.createElement('A');
            optionPanel.classList.add('member__option-panel');
            approveStudBttn.classList.add('member__panel-bttn');
            blockStudBttn.classList.add('member__panel-bttn');
            profileLink.classList.add('member__panel-bttn');
            profileLink.setAttribute('href', '#');

            approveStudBttn.textContent = 'Remove Student';
            blockStudBttn.textContent = 'Block Student';
            profileLink.textContent = 'View Profile';

            optionPanel.append(approveStudBttn);
            optionPanel.append(blockStudBttn);
            optionPanel.append(profileLink);
            rightWrapper.append(optionPanel);
            liTag.append(rightWrapper);
            LIs.push(liTag);
        }
        for(let i = 0; i<LIs.length; i++){
            listContainer.append(LIs[i]);
        }
        imgChecker.imgLoader(listContainer);
        memberContainer.append(lblsWrapper);
        memberContainer.append(listContainer);
        emptyBoxWrapper.parentNode.insertBefore(memberContainer, emptyBoxWrapper);
        refreshOptEvent();
        refreshPanelBttnEvent();
    }, 1500);
}
function displayBlockList(list){
    let listLength = list.students.length;
    setTimeout(function () {
        let memberContainer = document.createElement('DIV');
        memberContainer.classList.add('member__main-container');
        let emptyBoxWrapper = document.querySelector('.member__empty');
        checkIfElementExist('.member__main-container');
        // LABELS
        let lblsWrapper = document.createElement('DIV'),
            nameLbl = document.createElement('p'),
            dateLbl = document.createElement('p');
        lblsWrapper.classList.add('member__labels');
        nameLbl.classList.add('member__labels-txt');
        dateLbl.classList.add('member__labels-txt');
        nameLbl.textContent = 'Name';
        dateLbl.textContent = 'Date of join';

        lblsWrapper.append(nameLbl);
        lblsWrapper.append(dateLbl);

        //LISTS
        let listContainer = document.createElement('ul');
        listContainer.classList.add('member__lists');

        let LIs = [];
        for(let i = 0; i<listLength; i++){
            //TOP
            let liTag = document.createElement('LI');
            liTag.setAttribute('data-identity', list.students[i][0]['id'])
            liTag.classList.add('member__list');

            //LEFT
            let leftPart = document.createElement('DIV'),
                leftImgWrapper = document.createElement('DIV'),
                img = document.createElement('IMG');
            leftPart.classList.add('member__list-left');
            leftImgWrapper.classList.add('member__list-img');

            //IMG SRC WILL BE REPLACED AFTERWARDS
            img.setAttribute('src', '/assets/imgs/test images/professor.jpg');
            img.setAttribute('alt', 'A picture of a member in this class');
            img.classList.add('adjust-img-js');
            leftImgWrapper.append(img);
            leftPart.append(leftImgWrapper);

            let listInfoWrapper = document.createElement('DIV'),
                listName = document.createElement('P'),
                listPosition = document.createElement('P');
            listInfoWrapper.classList.add('member__list-info');
            listName.classList.add('member__list-name');
            listPosition.classList.add('member__list-position');

            let fname = list.students[i][0]['f_name'],
                lname = list.students[i][0]['m_name'];
            listName.textContent = ucfirst(fname)+ ' ' + ucfirst(lname);
            listPosition.textContent = 'Student';

            listInfoWrapper.append(listName);
            listInfoWrapper.append(listPosition);
            leftPart.append(listInfoWrapper);

            liTag.append(leftPart);

            //RIGHT
            let rightWrapper = document.createElement('DIV');
            rightWrapper.classList.add('member__list-right');
            let date = document.createElement('P');
            date.classList.add('member__list-right-p');
            date.textContent = dateFormat(list.students[i][0]['created_at']);
            rightWrapper.append(date);

            let buttonWrapper = document.createElement('BUTTON'),
                circle1 = document.createElement('SPAN'),
                circle2 = document.createElement('SPAN'),
                circle3 = document.createElement('SPAN');
            buttonWrapper.classList.add('bttn', 'member__bttn--option');
            circle1.classList.add('member__bttn--option__circle', 'circle-1');
            circle2.classList.add('member__bttn--option__circle', 'circle-2');
            circle3.classList.add('member__bttn--option__circle', 'circle-3');

            buttonWrapper.append(circle1);
            buttonWrapper.append(circle2);
            buttonWrapper.append(circle3);
            rightWrapper.append(buttonWrapper);

            let optionPanel = document.createElement('DIV'),
                blockStudBttn = document.createElement('BUTTON'),
                profileLink = document.createElement('A');
            optionPanel.classList.add('member__option-panel');
            blockStudBttn.classList.add('member__panel-bttn');
            profileLink.classList.add('member__panel-bttn');
            profileLink.setAttribute('href', '#');

            blockStudBttn.textContent = 'Unblock Student';
            profileLink.textContent = 'View Profile';

            optionPanel.append(blockStudBttn);
            optionPanel.append(profileLink);
            rightWrapper.append(optionPanel);
            liTag.append(rightWrapper);
            LIs.push(liTag);
        }
        for(let i = 0; i<LIs.length; i++){
            listContainer.append(LIs[i]);
        }
        imgChecker.imgLoader(listContainer);
        memberContainer.append(lblsWrapper);
        memberContainer.append(listContainer);
        emptyBoxWrapper.parentNode.insertBefore(memberContainer, emptyBoxWrapper);
        refreshOptEvent();
        refreshPanelBttnEvent();
    }, 1500);
}

//HELPERS
function bttnOptionFunc(e){
    let nextSibling = e.currentTarget.nextElementSibling;
    targetedEl = e.currentTarget;
    let activeBttn = document.querySelector('.member__bttn--active');
    if(activeBttn.textContent == 'Request'){
        showElement(nextSibling, '-125px');
    }else{
        showElement(nextSibling);
    }

}
function bttnPanelFunc(e){
    e.preventDefault();
    let greatParent = e.currentTarget.parentNode.parentNode.parentNode;
    ID = greatParent.getAttribute('data-identity');
    popupContainer.classList.add('popup--hidden');
    showPopup(e.currentTarget.textContent);
}
function displayActiveBttn(el){
    showLoader();
    let active = document.querySelector('.member__bttn--active');
    active.classList.remove('member__bttn--active');
    el.classList.add('member__bttn--active');
}
function showPopup(str){
    let mssg = null;
    if(str == 'Block Student'){
        let bttnText = document.querySelector('.member__bttn--active').textContent;
        if(bttnText === 'Request'){
            type = 'fromRequestToBlock';
        }else if(bttnText === 'Accepted'){
            type = 'fromAcceptedToBlock';
        }
        mssg = 'Are you sure you want to block this student to your class? He / she will no longer make a request to your class, however, you can unblock this student if you change your mind at a later time.'
    }else if(str == 'Accept Request'){
        type = 'accept';
        mssg = 'Are you sure you want to add this student to your class?'
    }else if(str == 'Cancel Request'){
        type = 'cancel';
        mssg = 'Are you sure you want to cancel this student\'s request?'
    }else if(str == 'Remove Student'){
        type = 'remove';
        mssg = 'Are you sure you want to remove this student from your class?'
    }else if(str == 'Unblock Student'){
        type = 'unblock';
        mssg = 'Are you sure you want to unblock this student from your class? He / she may request again to join your class.';
    }
    popupMssg.textContent = mssg;
    popupContainer.classList.remove('popup--hidden');
}
function showElement(el, pos = null){
    let activeOpt = document.querySelector('.option--active');
    if(activeOpt){
        activeOpt.classList.remove('option--active');
    }
    el.classList.toggle('option--active');
    if(pos){
        el.style.bottom = pos;
    }

}
function hideElement(el) {
    el.classList.remove('option--active');
}
function showLoader(){
    loaderBox.style.display = 'block';
}
function hideLoader(){
    loaderBox.style.display = 'none';
}
function ucfirst(str){
    return str.charAt(0).toUpperCase() + str.slice(1);
}
function dateFormat(str){
    let dateObj = new Date(str);
    let options = {
        month: 'long',
        year: 'numeric',
        day: 'numeric'
    }
    return dateObj.toLocaleString('en-us', options);
}
function refreshOptEvent(){
    let els = document.querySelectorAll('.member__bttn--option');
    els.forEach(el =>{
       el.addEventListener('click', bttnOptionFunc);
    });
}
function refreshPanelBttnEvent(){
    let els = document.querySelectorAll('.member__panel-bttn');
    els.forEach(el =>{
        el.addEventListener('click', bttnPanelFunc);
    });
}
function checkIfElementExist(cls){
    setTimeout(function waitingTilRendered(){
        let panel = document.querySelector(cls);
        if(document.body.contains(panel)){
            hideLoader();
        }else{
            setTimeout(waitingTilRendered, 10);
        }
    }, 10);
}
function showLoadingContainer(){
    txtContainer.style.display = 'none';
    loaderContainer.style.display = 'block';
}
function hideLoadingContainer(){
    loaderContainer.style.display = 'none';
    txtContainer.style.display = 'block';
}
function showLoaderError(){
    errorContainer.style.display = 'block';
}
function hideLoaderError(){
    errorContainer.style.display = 'none';
}
function hidePopupError(){
    popupContainer.classList.add('popup--hidden');
}
function hideMemberContainer(){
    let mainContainer = document.querySelector('.member__main-container');
    mainContainer.remove();
}
function showEmptyWrapper(mssg){
    let emptyWrapper = document.querySelector('.member__empty');
    emptyWrapper.style.display = 'block';
    let emptyTxt = emptyWrapper.querySelector('.member__empty-txt');
    emptyTxt.textContent = mssg;
    hideLoader();
}
