import { core } from "../core/core.js";
import { printArtworks } from "../utils/print_artworks.js";

const main = document.querySelector('main');
var artist_id = main.dataset.id;

var getAllArtistArtworks = async()=>{

    const form_data = new FormData();
    form_data.set('artist_id', artist_id);
    
    const server_response = await core('getAllArtistArtworks', form_data);
    
    if(!server_response.success){
        printArtworks(server_response, null);
        return;
    }

    printArtworks(server_response, null);
}



var getArtistData = async artistId =>{  
    
    const form_data = new FormData();
    form_data.set('id', artistId);
    
    const server_response = await core('viewArtistData', form_data);
    
    if(!server_response.success){
        console.log(server_response.message);
        return;
    }
    
    owner_description.innerHTML = `
        <h1 text-align:center;>${server_response.data.nome}</h1>
        <p>Artista angolano(a) que se destaca em ${server_response.data.category} com foco em identidade cultural</p>
        <p>${server_response.data.biography}</p>
    `;

    getAllArtistArtworks();

};
getArtistData(artist_id);
