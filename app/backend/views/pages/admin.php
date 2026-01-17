<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="../../../frontend/public/css/pages/artist_dashboard.css">
    <link rel="stylesheet" href="../../../frontend/public/css/pages/artist_dashboard_forms.css">
    <link rel="stylesheet" href="../../../frontend/public/css/pages/dashboard_mq.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>.no-results{margin-top: 80px;}</style>
</head>
<?php
    require_once('../../session/session.php');
    require_once('../components/alerts.php');
?>
<body>
    <header class="top">
    <h1>Arthem</h1>
    <span>Painel do Administrador</span>
    </header>

    <main class="container" data-id="<?=$_SESSION['id']??null?>" data-name="<?=$_SESSION['name']??null?>">
        <aside class="sidebar">
            <button class="my-artworks active">Denúncias</button>
            <a href="../pages/logout.php"><button>Terminar Sessão</button></a>
            <!----
                <button class="publish-artwork-tab">Pedidos</button>
            -->
        </aside>

        <section class="content">
                <aside>
                    <h2>Denúncias</h2>
                </aside>

                <table>
                    <thead>
                        <tr>
                            <th>Obra</th>
                            <th>Artista</th>
                            <th>Motivo</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody" style="position:relative;"></tbody>
                </table>
        </section>

        
    </main>  
        
    <aside class="artworks-modals">
        <img src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" style="cursor:pointer;" class="close-publish-artwork-modal">
        <div class="publish-update-artworks-container">

            <div id="view_artwork_modal"></div>
        
            <div id="delete_artwork_modal"></div>
        </div>
    </aside>
     
</body>
</html>
<script src="../../../frontend/src/components/admin_dashboard_animations.js"></script>
<script type="module" src="../../../frontend/src/pages/admin_dashboard.js"></script>

