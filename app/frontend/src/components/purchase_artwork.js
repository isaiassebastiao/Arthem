
const purchaseArtWorkModal = document.querySelector('.purchase-artwork-container');

const closePurchaseModalButton = document.querySelector('.close-purchase-modal-button');
closePurchaseModalButton.addEventListener('click', ()=>{
    purchaseArtWorkModal.style.display = 'none';
});