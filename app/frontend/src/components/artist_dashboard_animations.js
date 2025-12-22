const publishArtWorkTab = document.querySelector('.publish-artwork-tab');
const myAtworksTab = document.querySelector('.my-artworks');
const closePublishArtworkModal = document.querySelector('.close-publish-artwork-modal');

const artworks_modal = document.querySelector('.artworks-modals');
const viewArtWorkWithDetails = [...document.querySelectorAll('.ver')];
const updateArtwork = [...document.querySelectorAll('.editar')];
const deleteArtwork = [...document.querySelectorAll('.excluir')];

publishArtWorkTab.addEventListener('click', ()=>{
    
    artworks_modal.style.display = 'flex';
    publish_artwork_modal.style.display = 'block';
    closePublishArtworkModal.style.display = 'block';

    update_artwork_modal.style.display = 'none';
    view_artwork_modal.style.display = 'none';
    delete_artwork_modal.style.display = 'none';
    
    myAtworksTab.classList.remove('active');
    publishArtWorkTab.classList.add('active');
    
});

viewArtWorkWithDetails.forEach(element=>{
    element.addEventListener('click', ()=>{

        artworks_modal.style.display = 'flex';
        view_artwork_modal.style.display = 'flex';
        closePublishArtworkModal.style.display = 'block';

        update_artwork_modal.style.display = 'none';
        publish_artwork_modal.style.display = 'none';
        delete_artwork_modal.style.display = 'none';
    });
});

updateArtwork.forEach(element=>{
    element.addEventListener('click', ()=>{

        artworks_modal.style.display = 'flex';
        update_artwork_modal.style.display = 'block';
        closePublishArtworkModal.style.display = 'block';

        publish_artwork_modal.style.display = 'none';
        view_artwork_modal.style.display = 'none';
        delete_artwork_modal.style.display = 'none';
    });
});


deleteArtwork.forEach(element=>{
    element.addEventListener('click', ()=>{

        artworks_modal.style.display = 'flex';
        delete_artwork_modal.style.display = 'flex';

        publish_artwork_modal.style.display = 'none';
        view_artwork_modal.style.display = 'none';
        update_artwork_modal.style.display = 'none';
        closePublishArtworkModal.style.display = 'none';

        cancel_delete.addEventListener('click', ()=>{
            artworks_modal.style.display = 'none';
        });

    });
});


closePublishArtworkModal.addEventListener('click', ()=>{

    artworks_modal.style.display = 'none';

    myAtworksTab.classList.add('active');
    publishArtWorkTab.classList.remove('active');
});

