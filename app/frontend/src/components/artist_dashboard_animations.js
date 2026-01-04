const publish_artWork_tab = document.querySelector('.publish-artwork-tab');
const my_atworks_tab = document.querySelector('.my-artworks');
const close_publish_artwork_modal = document.querySelector('.close-publish-artwork-modal');

const artworks_modal = document.querySelector('.artworks-modals');

publish_artWork_tab.addEventListener('click', ()=>{
    
    artworks_modal.style.display = 'flex';
    publish_artwork_modal.style.display = 'block';
    close_publish_artwork_modal.style.display = 'block';

    update_artwork_modal.style.display = 'none';
    view_artwork_modal.style.display = 'none';
    delete_artwork_modal.style.display = 'none';
    
    my_atworks_tab.classList.remove('active');
    publish_artWork_tab.classList.add('active');
    
});

close_publish_artwork_modal.addEventListener('click', ()=>{

    artworks_modal.style.display = 'none';

    my_atworks_tab.classList.add('active');
    publish_artWork_tab.classList.remove('active');
});

