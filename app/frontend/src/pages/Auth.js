var Auth = async (action, formData) =>{
    try{
        const response = await fetch(`../../../index.php?action=${action}`, {
            body:formData,
            method:'POST'
        });

        const json_response = await response.json();
        return json_response;

    }catch(err){
        console.log(err);
    }
}

register.addEventListener('submit', async event=>{

    event.preventDefault();
    const formData = new FormData(register);
    console.log(Object.fromEntries(formData));
    server_response = await Auth('signUpArtist', formData);

    redirect(server_response);
});

login.addEventListener('submit', async event=>{
    event.preventDefault();
    const formData = new FormData(login);
    server_response = await Auth('artistAutenticator', formData);

    redirect(server_response);
});

redirect = json=>{

    if(json.success){
        
        if(json.redirect){
            setTimeout(()=>{
                window.location.href = json.redirect;
            }, 2000);
        }
        console.log(json.message);

    }else{
        console.log(json.message);
    }

    
}




