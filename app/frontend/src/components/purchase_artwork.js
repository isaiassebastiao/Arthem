
const purchase_artwork_modal = document.querySelector('.purchase-artwork-container');

const close_purchase_modal_button = document.querySelector('.close-purchase-modal-button');
close_purchase_modal_button.addEventListener('click', ()=>{
    purchase_artwork_modal.style.display = 'none';
});