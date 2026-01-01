const publishArtWorkTab = document.querySelector('.publish-artwork-tab');
const myAtworksTab = document.querySelector('.my-artworks');
const closePublishArtworkModal = document.querySelector('.close-publish-artwork-modal');

const artworks_modal = document.querySelector('.artworks-modals');

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

closePublishArtworkModal.addEventListener('click', ()=>{

    artworks_modal.style.display = 'none';

    myAtworksTab.classList.add('active');
    publishArtWorkTab.classList.remove('active');
});

