let resendLinkBttn = document.querySelector('.js-resend-link');

resendLinkBttn.addEventListener('click', ()=>{
    resendLinkBttn.textContent = 'Please wait';
    resendLinkBttn.style.cursor = 'not-allowed';
    resendLinkBttn.disabled = true;
    fetchEmail();
});



function fetchEmail(){
    let url = '/resend-verification';
    let data = {
        inputUrl: classLink,
        inputName: fname,
        inputEmail: email
    }
    const options = {
        method: 'POST',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json;charset=UTF-8',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    };
    fetch(url, options)
        .then((response)=>{
            return response.text();
        })
        .then((body)=>{
            let result = JSON.parse(body);
            if(result.success){
                resendLinkBttn.remove();
            }else{
                resendLinkBttn.textContent = 'Resend link';
                resendLinkBttn.style.cursor = 'pointer';
                resendLinkBttn.disabled = false;
            }
        })
        .catch(error=>{
            console.log(error);
            setTimeout(()=>{
                resendLinkBttn.textContent = 'Resend link';
                resendLinkBttn.style.cursor = 'pointer';
                resendLinkBttn.disabled = false;
            }, 7200);
        });
}
