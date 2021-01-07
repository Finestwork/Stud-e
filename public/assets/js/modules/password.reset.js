let passwordTxt = document.getElementById('passwordTxt'),
    confirmPasswordTxt = document.getElementById('confirmTxt'),
    pwToggleBttn = document.querySelectorAll('.js-toggle-icon'),
    resetPasswordBttn = document.getElementById('resetPasswordBttn');

let txtNotif = document.querySelector('.js-txt-notif');

let pwCtr = 0, cpwCtr = 0;
pwToggleBttn.forEach(el=>{
    el.addEventListener('click', e=>{
        let previousEl = e.currentTarget.previousElementSibling;
        let elID = previousEl.getAttribute('id');
        previousEl.focus();
        if(elID === 'passwordTxt'){
            if(pwCtr === 0){
                previousEl.setAttribute('type', 'text');
                pwCtr++;
            }else{
                previousEl.setAttribute('type', 'password')
                pwCtr = 0;
            }
        }else if(elID === 'confirmTxt'){
            if(cpwCtr === 0){
                previousEl.setAttribute('type', 'text');
                cpwCtr++;
            }else{
                previousEl.setAttribute('type', 'password')
                cpwCtr = 0;
            }
        }

    });
})
resetPasswordBttn.addEventListener('click', e=>{
    e.preventDefault();
    txtNotif.style.display = null;

    if((passwordTxt.value.trim() !== "" && passwordTxt.value.trim().length !== 0)
        && (confirmPasswordTxt.value.trim() !== "" && confirmPasswordTxt.value.trim().length !== 0)
        && (passwordTxt.value.trim() === confirmPasswordTxt.value.trim())
        && passwordTxt.value.trim().length >= 8){
        let data ={
            password: passwordTxt.value,
            confirmPassword: confirmPasswordTxt.value,
            url: token
        }
        passwordReset(data);
    }else{
        txtNotif.classList.remove('sign-in__email-success');
        txtNotif.classList.add('sign-in__email-does-not-exist');
        if((passwordTxt.value.trim() === "" || passwordTxt.value.trim().length === 0)){
            txtNotif.textContent = 'Your password field is empty';
        }else if((confirmPasswordTxt.value.trim() === "" || confirmPasswordTxt.value.trim().length === 0)){
            txtNotif.textContent = 'Your confirm password field is empty';
        }else if(passwordTxt.value.trim() !== confirmPasswordTxt.value.trim()){
            txtNotif.textContent = 'Your password does not match';
        }else if(passwordTxt.value.trim().length < 8){
            txtNotif.textContent = 'Your password length should be greater than 8';
        }
        txtNotif.style.display = 'block';
    }

});


function passwordReset(data){
    let url = '/verify-password-reset';
    console.log(data);
    let jsonData = JSON.stringify(data);
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
            txtNotif.style.display = 'block';
            if(result.success){
                txtNotif.classList.remove('sign-in__email-does-not-exist');
                txtNotif.classList.add('sign-in__email-success');
                txtNotif.textContent = 'Successfully reset the password, please wait while we redirect you to the signin page.';
                setTimeout(()=>{
                    location.href = '/signin';
                }, 1000);
            }else{
                txtNotif.classList.remove('sign-in__email-success');
                txtNotif.classList.add('sign-in__email-does-not-exist');
                txtNotif.textContent = 'Something went wrong, please try again.';
            }

        })
        .catch(error=>{
            console.log(error);
            txtNotif.classList.remove('sign-in__email-success');
            txtNotif.classList.add('sign-in__email-does-not-exist');
            txtNotif.textContent = 'Network error, please try again later';
            txtNotif.style.display = 'block';
        });
}
