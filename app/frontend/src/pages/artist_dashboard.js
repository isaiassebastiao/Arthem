import { searchBar } from "../components/search_bar.js";
import { Core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";


const main = document.querySelector('main');

var coin = 'KZ';
var artistId = main.dataset.id;
var artist_name = main.dataset.name;
var array = [];

publish_artwork_modal.addEventListener('submit', async event=>{

    event.preventDefault();

    const formData = new FormData(publish_artwork_modal);
    formData.set('artist_id', artistId);
    formData.set('name', artist_name);

    publish_artwork_modal.reset();

    var server_response = await Core('publishArtWork', formData);
    warnings(server_response);


    getAllArtistArtworks();
});


var getAllArtistArtworks = async ()=>{


    const formData = new FormData();
    formData.set('artist_id', artistId);

    const server_response = await Core('getAllArtistArtworks', formData);

    if(!server_response.success){

        tableBody.innerHTML = `
            <p class="no-results">${server_response.message}</p>
        `;
        return;
    }
    
    searchBar(server_response.data);
    fillTable(server_response.data);
    
}

export var fillTable = artworks =>{

    if(artworks.length == 0){
        tableBody.innerHTML = `
            <p class="no-results">Sem resultados para a sua pesquisa</p>
        `;
        return
    }

    tableBody.innerHTML = ``;


    artworks.forEach(artwork=>{

        tableBody.innerHTML += `
        
            <tr>
                <td><img src="../../../${artwork.artwork_path}"></td>
                <td data-Label="Título">${artwork.title}</td>
                <td data-Label="Preço">${artwork.price} ${coin}</td>

                ${
                    (artwork.status == 'À venda') 
                    ? `<td class="active" data-Label="Status">${artwork.status}</td>` 
                    : `<td class="inactive" data-Label="Status">${artwork.status}</td>`
                }
                
                <td data-Label="Ações">
                    <button data-id="${artwork.id}" class="view">Ver</button>
                    <button data-id="${artwork.id}" class="update">Editar</button>
                    <button data-id="${artwork.id}" data-name="${artwork.title}" class="delete">Excluir</button>
                </td>
            </tr>
        
        `;
    });

    artworkActions();

}


var artworkActions = ()=>{

    const viewArtWorkWithDetailsButton = [...document.querySelectorAll('.view')];
    const updateArtworkButton = [...document.querySelectorAll('.update')];
    const deleteArtworkButton = [...document.querySelectorAll('.delete')];

    viewArtWorkWithDetailsButton.forEach(button=>{
        button.addEventListener('click', ()=>{
    
            artworks_modal.style.display = 'flex';
            view_artwork_modal.style.display = 'flex';
            closePublishArtworkModal.style.display = 'block';
    
            update_artwork_modal.style.display = 'none';
            publish_artwork_modal.style.display = 'none';
            delete_artwork_modal.style.display = 'none';

            const artworkId = button.dataset.id;
            viewArtWorkWithDetails(artworkId);

        });
    });
    
    updateArtworkButton.forEach(button=>{
        button.addEventListener('click', async()=>{
    
            artworks_modal.style.display = 'flex';
            update_artwork_modal.style.display = 'block';
            closePublishArtworkModal.style.display = 'block';
    
            publish_artwork_modal.style.display = 'none';
            view_artwork_modal.style.display = 'none';
            delete_artwork_modal.style.display = 'none';

            const artworkId = button.dataset.id;

            const formData = new FormData();
            formData.set('id', artworkId);

            const server_response = await Core('getArtwork', formData);
            const artwork = server_response.data;

            title.value = artwork.title;
            price.value = artwork.price;
            description.value = artwork.description;
            artwork_status.value = artwork.status;

            array[0] = artworkId;
          
        });
        
    });

    
    deleteArtworkButton.forEach(button=>{
        button.addEventListener('click', ()=>{
    
            artworks_modal.style.display = 'flex';
            delete_artwork_modal.style.display = 'flex';
    
            publish_artwork_modal.style.display = 'none';
            view_artwork_modal.style.display = 'none';
            update_artwork_modal.style.display = 'none';
            closePublishArtworkModal.style.display = 'none';


            const artworkId = button.dataset.id;
            const artworkName = button.dataset.name;


            delete_artwork_modal.innerHTML = `
                <div><strong>Confirmar Excluir Obra</strong></div>
                <div>
                    <p>Esta Obra será excluída de sua galeria:<br><span class="caution">${artworkName} </span></p>
                    <p>Tem certeza que quer excluir esta Obra de Arte ?</p>
                </div>
                <div style="display: flex; gap:10px; justify-content:center;">
                    <button id="confirm_delete">Sim</button>
                    <button id="cancel_delete">Não</button>
                </div>
            `;

            
            confirm_delete.addEventListener('click', async()=>{
                deleteArtwork(artworkId, artworkName);
            });
    
            cancel_delete.addEventListener('click', ()=>{
                artworks_modal.style.display = 'none';
            });
        });
    });

}



var viewArtWorkWithDetails = async artworkId =>{

    const formData = new FormData();
    formData.set('id', artworkId);
    formData.set('name', artist_name);

    const server_response = await Core('getArtwork', formData);
    
    if(!server_response.success){
        warnings(server_response);
        return;
    }

    const artwork = server_response.data;

    //console.log(artwork)
    view_artwork_modal.innerHTML = `    
            <div><img id="image" src="../../../${artwork.artwork_path}" alt="${artwork.title}"></div>
            <div><strong>Título: </strong><span>${artwork.title}</span></div>
            <div><strong>Dimensões: </strong><span class="height-and-width">Carregando...</span></div>
            <div><strong>Descrição: </strong><span>${artwork.description}</span></div>
            <div><strong>Preço: </strong><span>${artwork.price} ${coin}</span></div>
    `;
    const image = document.querySelector('#image');
    
    image.onload = ()=>{
        const width_and_height = document.querySelector('.height-and-width');
        width_and_height.innerText = `${image.naturalWidth +' * '+ image.naturalHeight}`;
    }

    
}


update_artwork_modal.addEventListener('submit', async event=>{
    event.preventDefault();

    let artworkId = array;

    const formData = new FormData(update_artwork_modal);
    formData.set('artist_id', artistId);
    formData.set('id', artworkId);
    formData.set('name', artist_name);

    update_artwork_modal.reset();

    update_artwork_modal.style.display = 'none';
    artworks_modal.style.display = 'none';

    const server_response = await Core('updateArtworkData', formData);
    
    warnings(server_response); 

    getAllArtistArtworks();
});


var deleteArtwork = async (artworkId, artwork_name) =>{

    const formData = new FormData();
    formData.set('id', artworkId);
    formData.set('title', artwork_name);
    formData.set('name', artist_name);

    delete_artwork_modal.style.display = 'none';
    artworks_modal.style.display = 'none';

    const server_response = await Core('deleteArtWork', formData);
    warnings(server_response);

    getAllArtistArtworks();
} 

window.addEventListener('load', ()=>{
    getAllArtistArtworks();
});
