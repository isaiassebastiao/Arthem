<link rel="stylesheet" href="../../../frontend/public/css/components/purchase_artwork_modal.css">
<link rel="stylesheet" href="../../../frontend/public/css/pages/artist_dashboard_forms.css">

<section class="purchase-artwork-container">

    <div class="purchase-artwork-modal">

        <div class="artwork-image" id="artwork_image"></div>

        <div class="artwork-info">

            <div class="close-icon-container">
                <img class="close-purchase-modal-button" src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="">
            </div>

            <div class="artwork-description">

                <span class="artwork-title" id="artwork_title"></span>

                <div style="display: flex; gap:10px">
                    <span class="artwork-owner" id="artwork_owner"></span>
                    <a href="" class="artwork-size" style="text-decoration: underline;" id="report">Denunciar</a>
                </div>

                <br>
                
                <span>Descrição: </span>
                <p id="artwork_description" style="text-align: justify;"></p>
                <span id="artwork_dimension" class="artwork-size"></span>
                <span id="artwork_date" class="created-at"></span>

                <div class="other-artwork-description">
                    <div class="price-and-purchase-button">
                        <span id="artwork_price" class="price"></span>
                        <button class="purchase-button">Comprar</button>
                    </div>
                    <span class="artwork-size" id="unavailable" style="display: none; font-weight:bolder; margin-top:40px">Obra de Arte Indisponível para compra</span>
                </div>

            </div>

        </div>

    </div>

    <div id="report_artist_modal" style="display:none;">
        
        <div class="close-icon-container">
            <img class="close-purchase-modal-button" src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="">
        </div>
            
        <form class="card" id="report_artist_form">

            <h2>Denunciar Conteúdo</h2>
    
            <div class="input-group">
                <i class='bx bx-category'></i>
                <select required name="report_reason_id" id="report_opt">
                    <option selected disabled>Selecione uma das opções</option>
                    <option value="1">Plágio ou cópia não autorizada</option>
                    <option value="2">Falsificação ou fraude na obra</option>
                    <option value="3">Conteúdo ofensivo ou discriminatório</option>
                    <option value="4">Uso indevido da imagem ou honra de terceiros</option>
                    <option value="5">Apropriação cultural indevida</option>
                    <option value="6">Uso de materiais ilegais ou prejudiciais ao ambiente</option>
                </select>
            </div>
    
            <button class="btn-primary" type="submit">Denunciar</button>
    
        </form>

    </div>
</section>