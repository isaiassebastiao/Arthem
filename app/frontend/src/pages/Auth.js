import { core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";

register.addEventListener('submit', async event=>{
    event.preventDefault();
    const form_data = new FormData(register);
    var server_response = await core('signUpArtist', form_data);

    warnings(server_response);
});

login.addEventListener('submit', async event=>{
    event.preventDefault();
    const form_data = new FormData(login);
    var server_response = await core('artistAutenticator', form_data);

    warnings(server_response);
});





