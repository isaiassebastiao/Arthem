const art = [...document.querySelectorAll('.art')];
const purchaseArtWorkModal = document.querySelector('.purchase-artwork-container');

const closePurchaseModalButton = document.querySelector('.close-purchase-modal-button');
closePurchaseModalButton.addEventListener('click', ()=>{
    purchaseArtWorkModal.style.display = 'none';
});

art.forEach(artwork=>{
    artwork.addEventListener('click', ()=>{
        //chamar modal...
        purchaseArtWorkModal.style.display = 'flex';
        console.log(artwork);
    });
});