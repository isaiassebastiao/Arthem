import { Core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";

register.addEventListener('submit', async event=>{

    event.preventDefault();
    const formData = new FormData(register);
    var server_response = await Core('signUpArtist', formData);

    warnings(server_response);
});

login.addEventListener('submit', async event=>{
    event.preventDefault();
    const formData = new FormData(login);
    var server_response = await Core('artistAutenticator', formData);

    warnings(server_response);
});





