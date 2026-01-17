import { searchBar } from "../components/search_bar.js";
import { core } from "../core/core.js";
import { warnings } from "../utils/warnings.js";


const main = document.querySelector('main');

var coin = 'KZ';
var artist_id = main.dataset.id;
var artist_name = main.dataset.name;
var array = [];

publish_artwork_modal.addEventListener('submit', async event=>{

    event.preventDefault();

    const form_data = new FormData(publish_artwork_modal);
    form_data.set('artist_id', artist_id);
    form_data.set('name', artist_name);

    publish_artwork_modal.reset();

    var server_response = await core('publishArtWork', form_data);
    warnings(server_response);


    getAllArtistArtworks();
});


var getAllArtistArtworks = async ()=>{


    const form_data = new FormData();
    form_data.set('artist_id', artist_id);

    const server_response = await core('getAllArtistArtworks', form_data);

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

                    ${
                        (artwork.status == 'Inativa')
                        ? `<p class="inactive" style="font-size:11pt;">Obra inativa por violar os termos e condições da Arthem</p>`
                        : 
                        `
                            <button data-id="${artwork.id}" class="view">Ver</button>
                            <button data-id="${artwork.id}" class="update">Editar</button>
                            <button data-id="${artwork.id}" data-name="${artwork.title}" class="delete">Excluir</button>
                        `
                    }
                </td>
            </tr>
        
        `;
    });

    artworkActions();

}


var artworkActions = ()=>{

    
    const view_artwork_with_details_button = [...document.querySelectorAll('.view')];
    view_artwork_with_details_button.forEach(button=>{
        button.addEventListener('click', async()=>{
    
            const artwork_id = button.dataset.id;

            const is_artwork_status_inactive = await checkArtworkStatus(artwork_id);

            if(is_artwork_status_inactive){
                getAllArtistArtworks();
                return;
            }

            artworks_modal.style.display = 'flex';
            view_artwork_modal.style.display = 'flex';
            close_publish_artwork_modal.style.display = 'block';
    
            update_artwork_modal.style.display = 'none';
            publish_artwork_modal.style.display = 'none';
            delete_artwork_modal.style.display = 'none';

            viewArtWorkWithDetails(artwork_id);

        });
    });
    

    const update_artwork_button = [...document.querySelectorAll('.update')];
    update_artwork_button.forEach(button=>{
        button.addEventListener('click', async()=>{
    
            const artwork_id = button.dataset.id;

            const is_artwork_status_inactive = await checkArtworkStatus(artwork_id);

            if(is_artwork_status_inactive){
                getAllArtistArtworks();
                return;
            }

            artworks_modal.style.display = 'flex';
            update_artwork_modal.style.display = 'block';
            close_publish_artwork_modal.style.display = 'block';
    
            publish_artwork_modal.style.display = 'none';
            view_artwork_modal.style.display = 'none';
            delete_artwork_modal.style.display = 'none';


            const form_data = new FormData();
            form_data.set('id', artwork_id);

            const server_response = await core('getArtwork', form_data);
            const artwork = server_response.data;

            title.value = artwork.title;
            price.value = artwork.price;
            description.value = artwork.description;
            artwork_status.value = artwork.status;

            array[0] = artwork_id;
          
        });
        
    });

    const delete_artwork_button = [...document.querySelectorAll('.delete')];
    delete_artwork_button.forEach(button=>{
        button.addEventListener('click', async()=>{

            const artwork_id = button.dataset.id;
            const artwork_name = button.dataset.name;
            
            const is_artwork_status_inactive = await checkArtworkStatus(artwork_id);

            if(is_artwork_status_inactive){
                getAllArtistArtworks();
                return;
            }
            
            artworks_modal.style.display = 'flex';
            delete_artwork_modal.style.display = 'flex';
    
            publish_artwork_modal.style.display = 'none';
            view_artwork_modal.style.display = 'none';
            update_artwork_modal.style.display = 'none';
            close_publish_artwork_modal.style.display = 'none';

            delete_artwork_modal.innerHTML = `
                <div><strong>Confirmar Excluir Obra</strong></div>
                <div>
                    <p>Esta Obra será excluída de sua galeria:<br><span class="caution">${artwork_name} </span></p>
                    <p>Tem certeza que quer excluir esta Obra de Arte ?</p>
                </div>
                <div style="display: flex; gap:10px; justify-content:center;">
                    <button id="confirm_delete">Sim</button>
                    <button id="cancel_delete">Não</button>
                </div>
            `;

            
            confirm_delete.addEventListener('click', async()=>{
                deleteArtwork(artwork_id, artwork_name);
            });
    
            cancel_delete.addEventListener('click', ()=>{
                artworks_modal.style.display = 'none';
            });
        });
    });

}



var viewArtWorkWithDetails = async artwork_id =>{

    const form_data = new FormData();
    form_data.set('id', artwork_id);
    form_data.set('name', artist_name);

    const server_response = await core('getArtwork', form_data);
    
    if(!server_response.success){
        warnings(server_response);
        return;
    }

    const artwork = server_response.data;

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

    let artwork_id = array;

    const form_data = new FormData(update_artwork_modal);
    form_data.set('artist_id', artist_id);
    form_data.set('id', artwork_id);
    form_data.set('name', artist_name);

    update_artwork_modal.reset();

    update_artwork_modal.style.display = 'none';
    artworks_modal.style.display = 'none';

    const server_response = await core('updateArtworkData', form_data);
    
    warnings(server_response); 

    getAllArtistArtworks();
});


var deleteArtwork = async (artwork_id, artwork_name) =>{

    const form_data = new FormData();
    form_data.set('id', artwork_id);
    form_data.set('title', artwork_name);
    form_data.set('name', artist_name);

    delete_artwork_modal.style.display = 'none';
    artworks_modal.style.display = 'none';

    const server_response = await core('deleteArtWork', form_data);
    warnings(server_response);

    getAllArtistArtworks();
} 

window.addEventListener('load', ()=>{
    getAllArtistArtworks();
});

var checkArtworkStatus = async artwork_id =>{
    
    const form_data = new FormData();
    form_data.set('id', artwork_id);

    const server_response = await core('getArtwork', form_data);
    return server_response.data.status == 4;
}
