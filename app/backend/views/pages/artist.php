<?php
    require_once('../components/header.php');
?>

<main data-id="<?=$_GET['id']?>" data-user="<?=$_SESSION['id']??null?>">
    <section class="gallery-main-section">

        <section style="text-align:center;" id="owner_description"></section>

        <?php
            require_once('../components/masonry.php');
        ?>

    </section>
</main>

<?php
  require_once("../components/purchase_modal.php");
?>

<script src="../../../frontend/src/components/purchase_artwork.js"></script>
<script type="module" src="../../../frontend/src/pages/artist_artworks.js"></script>
<script type="module" src="../../../frontend/src/utils/reportArtists.js"></script>