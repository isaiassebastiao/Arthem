import { Core } from "../core/core.js";
import { printArtworks } from "../utils/print_artworks.js";

const main = document.querySelector('main');
var artistId = main.dataset.id;

var getAllArtistArtworks = async()=>{

    const formData = new FormData();
    formData.set('artist_id', artistId);
    
    const server_response = await Core('getAllArtistArtworks', formData);
    
    if(!server_response.success){
        printArtworks(server_response, null);
        return;
    }

    printArtworks(server_response, null);
}



var getArtistData = async artistId =>{  
    
    const formData = new FormData();
    formData.set('id', artistId);
    
    const server_response = await Core('viewArtistData', formData);
    
    if(!server_response.success){
        console.log(server_response.message);
        return;
    }
    
    owner_description.innerHTML = `
        <h1 style="text-align:center;">${server_response.data.nome}</h1>
        <p>Artista angolano(a) que se destaca em ${server_response.data.category} com foco em identidade cultural</p>
        <p>${server_response.data.biography}</p>
    
    `;

    getAllArtistArtworks();

};
getArtistData(artistId);
