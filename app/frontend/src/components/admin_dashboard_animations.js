const my_atworks_tab = document.querySelector('.my-artworks');
const close_publish_artwork_modal = document.querySelector('.close-publish-artwork-modal');

const artworks_modal = document.querySelector('.artworks-modals');

close_publish_artwork_modal.addEventListener('click', ()=>{

    artworks_modal.style.display = 'none';

    my_atworks_tab.classList.add('active');
});
