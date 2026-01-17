import { core } from "../core/core.js";

var getAllArtists = async()=>{

    const server_response = await core('viewAllArtistsData', null);

    if(!server_response.success){
        
        container.innerHTML = `
            <p class="no-results">${server_response.message}</p>
        `;
        
        return;
    }
    printArtists(server_response.data);

}

var printArtists = artists =>{

    artists.forEach(artist=>{

        container.innerHTML += `
        
            <a href="artist.php?page=artists&id=${artist.id}">
                <div class='grid-card artists'>
                    <div class='img-placeholder round'>${artist.nome[0].toUpperCase()}</div>
                    <h3 class='card-title'>${artist.nome}</h3>
                    <br>
                    <br>
                    <p class='card-info'>Categoria de Atuação: ${artist.category} <br> E-mail: ${artist.email} <br> Aderiu ${artist.created_at}</p>
                </div>
            </a>
        
        `;
    });
}

getAllArtists();