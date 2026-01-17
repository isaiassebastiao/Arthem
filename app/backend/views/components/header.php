<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arthem</title>
<link rel="stylesheet" href="../../../frontend/public/css/index.css">
</head>

<body>
    <?php
        require_once('../../session/session.php');
        require_once('alerts.php');
    ?>
    <div class="wrapper">
        <header>
            <section class="section-1">
            
                <nav>
                    <a href="" class="brand">Arth<span class="letter">e</span>m</a>
                    <a href="../pages/home.php?page=home" class="nav-links home">Home</a>
                    <a href="../pages/gallery.php?page=gallery" class="nav-links gallery">Galeria</a>
                    <a href="../pages/artists.php?page=artists" class="nav-links artists">Artistas</a>
                    <a href="../pages/about.php?page=about" class="nav-links about">Sobre</a>
                </nav>

                <div class="auth">
                    <a href="../pages/auth.php?action=signIn" class="sign-in">Entrar</a>
                    <a href="../pages/auth.php?action=signUp" class="sign-up">Cadastrar</a>
                </div>
               

                <menu>
                    <div>
                        <img id="menuButton" src="../../../frontend/public/icons/menu_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="menu">
                    </div>

                    <div class="menu-links" id="menuLinks">
                        <nav>
                            <a href="#" class="brand">Arth<span class="letter">e</span>m</a>
                            <br>

                            <a href="../pages/home.php?page=home" class="menu-link home_menu">Home</a>
                            <a href="../pages/gallery.php?page=gallery" class="menu-link gallery_menu">Galeria</a>
                            <a href="../pages/artists.php?page=artists" class="menu-link artists_menu">Artistas</a>
                            <a href="../pages/about.php?page=about" class="menu-link about_menu">Sobre</a>
                            <br><br>
                            
                            <a href="../pages/auth.php?action=signIn" class="menu-link" id="logar">Entrar</a>
                            <a href="../pages/auth.php?action=signUp" class="menu-link" id="cad">Cadastrar</a>
                            
                        </nav>

                        <div style="transform:translate(-40px, 10px);">
                            <img id="closeMenuButton" src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="menu">
                        </div>

                    </div>
                    
                </menu>
                <div class="user">
                    <div>
                        <div class="profile-link"><?=strtoupper($_SESSION['name'])[0]?></div>
                            <!--
                            <a class="profile-link" href="../pages/profile.php?action=viewProfile">I</a>
                            -->
                        <ul class="user-nav-menu">
                            <li>
                                <a href="../pages/artist_dashboard.php">Minha Galeria</a>
                            </li>
                            <li>
                                <a href="../pages/logout.php">Terminar Sessão</a>
                            </li>
                        </ul>
                    </div>
                </div>
                

            </section>
        </header>
        <script type="module" src="../../../frontend/src/components/menu.js"></script>
        <script type="module" src="../../../frontend/src/components/header.js"></script>
        <script type="module" src="../../../frontend/src/components/user_icon_animations.js"></script>