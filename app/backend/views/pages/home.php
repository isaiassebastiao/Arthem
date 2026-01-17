<?php
    require_once('../components/header.php');
?>
<main data-user="<?=$_SESSION['id']??null?>">
    <section class="section-2">
        <h1>Arthem — Galeria de Arte Angolana.</h1>
        <h1>Descubra e apoie artistas locais através desta aplicação de exposição e venda de obras de arte angolanas.</h1>
    </section>

    <section class="section-3">
        
        <div class="discover-new-artworks">
            <h2>Descubra Obras Autênticas</h2>
        </div>

        <div class="artworks-container"></div>
    </section>
</main>

<?php
    require_once('../components/purchase_modal.php');
    require_once('../components/footer.php');
?>
<script src="../../../frontend/src/components/purchase_artwork.js"></script>
<script type="module" src="../../../frontend/src/pages/home.js"></script>
<script type="module" src="../../../frontend/src/utils/reportArtists.js"></script>
