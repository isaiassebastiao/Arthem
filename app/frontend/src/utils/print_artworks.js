import { core } from "../core/core.js";
import { openWhatsApp } from "./openWhatsApp.js";


export var printArtworks = (gallery_artworks, featured_artworks) =>{

    const url = new URLSearchParams(window.location.search);

    const masonry = document.querySelector('.masonry');
    const artworks_container = document.querySelector('.artworks-container');

    if(url.get('page') !== 'home'){

        if(!gallery_artworks.success){
            masonry.innerHTML = `
                <p class="no-results">${gallery_artworks.message}</p>
            `;
            return;
        }

        if(gallery_artworks.data !== undefined){
            gallery_artworks.data.forEach(artwork=>{

                if(artwork.status !== 'Inativa'){

                    masonry.innerHTML += `
                        <div class="photo art" data-id="${artwork.id}">
                            <img src="../../../${artwork.artwork_path}" alt="${artwork.title}">
                            <div class="overlay"><span>${artwork.owner} — ${artwork.title}</span></div>
                        </div>
                    `;
                }else{
                    masonry.innerHTML = `
                        <p class="no-results">Em breve novas obras aparecerão aqui</p>
                    `;
                }

            });
        }
    }

    if(url.get('page') == 'home'){

        if(featured_artworks.data !== undefined){

            var cont = 0;
            featured_artworks.data.forEach(featured_artwork=>{
        
                if(featured_artwork.featured == 1){
                    cont++;
                    artworks_container.innerHTML += `
                        <div class="artwork artwork-item-${cont} art" data-id="${featured_artwork.id}">
                            <img src="../../../${featured_artwork.artwork_path}" alt="${featured_artwork.title}">
                            <div class="overlay"><span>${featured_artwork.owner} — ${featured_artwork.title}</span></div>
                        </div>
                    `;
                }
            });
        }
    }

    const art = [...document.querySelectorAll('.art')];
    var $array = [];
    art.forEach(artwork=>{
        artwork.addEventListener('click', async()=>{

            //chamar modal...
            purchase_artwork_container.style.display = 'flex';
            purchase_artwork_modal.style.display = 'flex';

            
            const form_data = new FormData();
            
            const artworkId = artwork.dataset.id;
            

            form_data.set('id', artworkId);
            
            const server_response = await core('getArtwork', form_data);
            
            purchase_artwork_modal.setAttribute('data-artwork', artworkId);
            purchase_artwork_modal.setAttribute('data-artist', server_response.data.artist_id);
            
            //console.log(server_response.data);
            $array[0] = server_response.data;

            artwork_image.innerHTML = `<img id="image" src="../../../${server_response.data.artwork_path}" alt="${server_response.data.title}" style="width:80%;">`;
            artwork_title.innerText = server_response.data.title;
            artwork_owner.innerText = "por " + server_response.data.nome;
            artwork_description.innerText = server_response.data.description;
            //console.log(artwork_dimension);

            const image = document.querySelector('#image');

            image.onload = ()=>{
                artwork_dimension.innerText = `Dimensões: ${image.naturalWidth+' * '+image.naturalHeight}`;
            }
            artwork_date.innerText = "Data de Publicação: "+ server_response.data.created_at;
            artwork_price.innerText = "AOA " + server_response.data.price;

            const artwork_status = server_response.data.status;

            if(artwork_status !== 1){
                statusPurchase(false);                
            }else{

                const main = document.querySelector('main');
                const user_id = main.dataset.user;
        
                if(server_response.data.artist_id == user_id){
                    report.style.display = 'none';
                    statusPurchase(false);                
                }else{
                    statusPurchase(true);
                }
            }

        });

    });

    const purchaseButton = document.querySelector('.purchase-button');

    purchaseButton.addEventListener('click', ()=>{
        openWhatsApp($array);
    });
}


var statusPurchase = condition =>{

    const purchaseElements = document.querySelector('.price-and-purchase-button');

    if(condition){
        purchaseElements.style.display = 'flex';
        unavailable.style.display = 'none';
    }else{
        purchaseElements.style.display = 'none';
        unavailable.style.display = 'block';
    }
}