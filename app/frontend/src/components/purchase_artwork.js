const purchase_artwork_container = document.querySelector('.purchase-artwork-container');
const purchase_artwork_modal = document.querySelector('.purchase-artwork-modal'); 

const close_purchase_modal_button = [...document.querySelectorAll('.close-purchase-modal-button')];
close_purchase_modal_button.forEach(close_button=>{
    close_button.addEventListener('click', ()=>{
        purchase_artwork_container.style.display = 'none';
        report_artist_modal.style.display = 'none';
        report_artist_form.reset();
    });
});

report.addEventListener('click', async event=>{
    event.preventDefault();
    purchase_artwork_modal.style.display = 'none';
    report_artist_modal.style.display = 'block';

});




