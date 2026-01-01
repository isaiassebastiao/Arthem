<?php
    require_once('../components/header.php');
?>
<style>p, h1{text-align: center;}</style>
<main data-user="<?=$_SESSION['id']?>">
    <section class="gallery-main-section">

        <section style="align-selft:start;">
            <h1>Galeria de Obras</h1>
            <p>Explore obras de arte angolana em diversas categorias</p>
        </section>

        <?php
            require_once('../components/masonry.php');
        ?>

    </section>
</main>
<?php
  require_once("../components/purchase_modal.php");
?>


<script src="../../../frontend/src/components/purchase_artwork.js"></script>
<script type="module" src="../../../frontend/src/pages/gallery.js"></script>
