let resendLinkBttn = document.querySelector('.js-resend-link');

resendLinkBttn.addEventListener('click', ()=>{
    resendLinkBttn.textContent = 'Please wait';
    resendLinkBttn.style.cursor = 'not-allowed';
    resendLinkBttn.disabled = true;
    fetchEmail();
});



function fetchEmail(){
    let url = '/resend-verification';
    let jsonData = JSON.stringify({url: classLink});
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
            setTimeout(()=>{
                resendLinkBttn.textContent = 'Resend link';
                resendLinkBttn.style.cursor = 'cursor';
                resendLinkBttn.disabled = false;
            }, 7200);
        })
        .catch(error=>{
            console.log(error);
            setTimeout(()=>{
                resendLinkBttn.textContent = 'Resend link';
                resendLinkBttn.style.cursor = 'cursor';
                resendLinkBttn.disabled = false;
            }, 7200);
        });
}
