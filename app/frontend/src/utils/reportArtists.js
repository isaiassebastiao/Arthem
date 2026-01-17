import { core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";


report_artist_form.addEventListener('submit', async event =>{
    event.preventDefault();

    const form_data = new FormData(report_artist_form);

    const artist_id = purchase_artwork_modal.dataset.artist;
    const artwork_id = purchase_artwork_modal.dataset.artwork;

    form_data.set('artist_id', artist_id);
    form_data.set('artwork_id', artwork_id);
    
    reportArtist(form_data);
    closeAllModals();

});


export var reportArtist = async form_data =>{


    console.log(Object.fromEntries(form_data));

    const server_response = await core('reportArtist', form_data);
    warnings(server_response);
}


var closeAllModals = ()=>{
    purchase_artwork_container.style.display = 'none';
    report_artist_modal.style.display = 'none';
    report_artist_form.reset();
}