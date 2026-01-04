<link rel="stylesheet" href="../../../frontend/public/css/components/purchase_artwork_modal.css">

<section class="purchase-artwork-container">
    <div class="purchase-artwork-modal">
        <div class="artwork-image" id="artwork_image"></div>
        <div class="artwork-info">
            <div class="close-icon-container">
                <img class="close-purchase-modal-button" src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="">
            </div>
            <div class="artwork-description">
                <span class="artwork-title" id="artwork_title">Obra de Arte</span>
                <span class="artwork-owner" id="artwork_owner">por Vangogh</span>
                <br>
                <span>Descrição: </span>
                <p id="artwork_description" style="text-align: justify;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim voluptatem quas quae sunt? Tsa us hic?</p>
                <span id="artwork_dimension" class="artwork-size">Dimensões: 1920 * 1080</span>
                <span id="artwork_date" class="created-at">Ano: </span>
                <div class="price-and-purchase-button">
                    <span id="artwork_price" class="price">0.00</span>
                    <button class="purchase-button">Comprar</button>
                </div>
                <span class="artwork-size" id="unavailable" style="display: none; font-weight:bolder; margin-top:40px">Obra de Arte Indisponível para compra</span>
            </div>
        </div>
    </div>
</section>