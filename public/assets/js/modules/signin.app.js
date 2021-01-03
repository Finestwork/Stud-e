let passwordTxt = document.getElementById('passwordTxt'),
    emailTxt = document.getElementById('emailTxt'),
    pwToggleBttn = document.querySelector('.js-toggle-icon'),
    pwCtr = 0, forgotPW = document.querySelector('.js-forgot-password');

let txtNotif = document.querySelector('.js-txt-notif');

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
