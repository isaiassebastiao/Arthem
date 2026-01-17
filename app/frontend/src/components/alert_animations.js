export var slideInRight = (alert, message)=>{

    const alert_message = document.querySelector('#alert_message');
    alert_message.innerText = message;

    alert.classList.add('alertFadeIn');
    alert.classList.remove('alertFadeOut');

}

export var slideOutRight = ()=>{

    const alert = document.querySelector('.alert');
    const alert_modal = document.querySelector('.alert-modal');

    alert.classList.add('alertFadeOut');
    alert.classList.remove('alertFadeIn');
    
    setTimeout(() => {
        alert_modal.style.display = 'none';
        alert.classList.remove('alert-error');
    }, 200);

}

