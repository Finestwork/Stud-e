let passwordTxt = document.getElementById('passwordTxt'),
    pwToggleBttn = document.querySelector('.js-toggle-icon'),
    pwCtr = 0;

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



