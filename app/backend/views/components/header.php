<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arthem</title>
<link rel="stylesheet" href="../../../frontend/public/css/index.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <section class="section-1">
            
                <nav>
                    <a href="" class="brand">Arth<span class="letter">e</span>m</a>
                    <a href="../pages/home.php" class="nav-links">Home</a>
                    <a href="../pages/gallery.php" class="nav-links">Galeria</a>
                    <a href="../pages/artists.php" class="nav-links">Artistas</a>
                    <a href="../pages/events.php" class="nav-links">Eventos</a>
                    <a href="../pages/about.php" class="nav-links">Sobre</a>
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
                            <a href="../pages/home.php" class="menu-link">Home</a>
                            <a href="../pages/gallery.php" class="menu-link">Galeria</a>
                            <a href="../pages/artists.php" class="menu-link">Artistas</a>
                            <a href="../pages/events.php" class="menu-link">Eventos</a>
                            <a href="../pages/about.php" class="menu-link">Sobre</a>
                            <br><br>
                            
                            <a href="../pages/auth.php?action=signIn" class="menu-link">Entrar</a>
                            <a href="../pages/auth.php?action=signUp" class="menu-link">Cadastrar</a>
                        </nav>

                        <div style="transform:translate(-40px, 10px);">
                            <img id="closeMenuButton" src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" alt="menu">
                        </div>

                    </div>
                </menu>

            </section>
        </header>
        <script type="module" src="../../../frontend/src/components/menu.js"></script>