let passwordTxt = document.getElementById('passwordTxt'),
    emailTxt = document.getElementById('emailTxt'),
    pwToggleBttn = document.querySelector('.js-toggle-icon'),
    pwCtr = 0, forgotPW = document.querySelector('.js-forgot-password');

let txtNotif = document.querySelector('.js-txt-notif');
let resendEmailBttn = document.querySelector('.sign-in__resend-email-link');


if(resendEmailBttn){
    resendEmailBttn.addEventListener('click', e=>{
       e.preventDefault();
        let pattern = new RegExp("^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$");
        if(emailTxt.value.trim() === "" && emailTxt.value.trim().length === 0
            && !pattern.test(emailTxt.value)){
            emailTxt.classList.add('jello');
            setTimeout(()=>{
                emailTxt.classList.remove('jello');
            },1000);
        }else{
            let txt = e.currentTarget.parentNode;
            txt.textContent = 'Please wait';
            txt.style.opacity = '0.6';
            let data ={
                email: emailTxt.value,
            }
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
                    txt.style.opacity = '1';
                    txt.style.display = 'block';
                    if(result.success){
                        txt.classList.remove('sign-in__email-does-not-exist');
                        txt.classList.add('sign-in__email-success');
                        txt.textContent = 'A verification link has been sent to your email.';
                    }else{
                        txt.classList.remove('sign-in__email-success');
                        txt.classList.add('sign-in__email-does-not-exist');
                        if(result.reason === 'does not exist'){
                            txt.textContent = 'Your email does not match our records.';
                        }else if(result.reason === 'failure'){
                            txt.textContent = 'Network error, please try again later';
                        }
                    }
                })
                .catch(error=>{
                    console.log(error);
                    txt.classList.remove('sign-in__email-success');
                    txt.classList.add('sign-in__email-does-not-exist');
                    txt.textContent = 'Network error, please try again later';
                    txt.style.display = 'block';
                });
        }
    });
}

pwToggleBttn.addEventListener('click', function(){
    passwordTxt.focus();
   if(pwCtr === 0){
       passwordTxt.setAttribute('type', 'text');
       pwCtr++;
   }else{
       passwordTxt.setAttribute('type', 'password')
       pwCtr = 0;
   }
});
forgotPW.addEventListener('click', ()=>{
    txtNotif.style.display = null;
    if(emailTxt.value.trim() === "" && emailTxt.value.trim().length === 0){
        emailTxt.classList.add('jello');
        setTimeout(()=>{
            emailTxt.classList.remove('jello');
        },1000);
    }else{
        forgotPW.style.opacity = '.4';
        forgotPW.style.cursor = 'not-allowed';
        passwordReset();
    }
});


function passwordReset(){
    let url = '/reset-password';
    let jsonData = JSON.stringify({email: emailTxt.value});
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
            forgotPW.style.opacity = '1';
            forgotPW.style.cursor = 'pointer';
            txtNotif.style.display = 'block';
        })
        .catch(error=>{
            console.log(error);
            forgotPW.style.opacity = '1';
            forgotPW.style.cursor = 'pointer';
            txtNotif.classList.remove('sign-in__email-success');
            txtNotif.classList.add('sign-in__email-does-not-exist');
            txtNotif.textContent = 'Network error, please try again later';
            txtNotif.style.display = 'block';
        });
}
