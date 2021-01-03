let emailTxt = document.getElementById('emailTxt'),
    emailBttn = document.getElementById('resendEmailBttn');

let txtNotif = document.querySelector('.js-txt-notif');

emailBttn.addEventListener('click', e=>{
    e.preventDefault();
    txtNotif.style.display = null;
    let pattern = new RegExp("^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$");
    if((emailTxt.value.trim() !== "" && emailTxt.value.trim().length !== 0)
        && pattern.test(emailTxt.value)){
        let data ={
            email: emailTxt.value,
        }
        emailBttn.textContent = 'Please wait...';
        emailBttn.style.opacity = '0.4';
        emailBttn.style.cursor = 'not-allowed';
        passwordReset(data);
    }else{
        txtNotif.classList.remove('sign-in__email-success');
        txtNotif.classList.add('sign-in__email-does-not-exist');
        if((emailTxt.value.trim() === "" || emailTxt.value.trim().length === 0)){
            txtNotif.textContent = 'Your email field is empty';
        }else if(!pattern.test(emailTxt.value)){
            txtNotif.textContent = 'Your email is not a valid email';
        }
        txtNotif.style.display = 'block';
    }

});


function passwordReset(data){
    let url = '/resend-lost-link';
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
            if(result.success){
                //SENT
                txtNotif.classList.remove('sign-in__email-does-not-exist');
                txtNotif.classList.add('sign-in__email-success');
                txtNotif.textContent = 'A reset link has been sent to your email.';
            }else{
                txtNotif.classList.remove('sign-in__email-success');
                txtNotif.classList.add('sign-in__email-does-not-exist');
                if(result.reason === 'does not exist'){
                    txtNotif.textContent = 'Your email does not match our records.';
                }else if(result.reason === 'failure'){
                    txtNotif.textContent = 'Network error, please try again later';
                }
            }
            emailBttn.textContent = 'Resend email';
            emailBttn.style.opacity = '1';
            emailBttn.style.cursor = 'pointer';
            txtNotif.style.display = 'block';
        })
        .catch(error=>{
            console.log(error);
            txtNotif.classList.remove('sign-in__email-success');
            txtNotif.classList.add('sign-in__email-does-not-exist');
            txtNotif.textContent = 'Network error, please try again later';
            txtNotif.style.display = 'block';
            emailBttn.textContent = 'Resend email';
            emailBttn.style.opacity = '1';
            emailBttn.style.cursor = 'pointer';
        });
}
