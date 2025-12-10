

<?php
    require_once('../components/header.php');

    $action = $_GET["action"] ?? null;

    if($action === 'signIn'){
        echo "<style>.sign-in, .sign-up-form{display: none;}</style>";
    }else{
        echo "<style>.sign-up, .sign-in-form{display:none;}</style>";
    }
?>
<style>
    .nav-links{
        display: none;
    }
    .auth{
        display:flex;
    }
    menu{
        display:none;
    }
</style>
<main>
    <section class="auth-main-section">
        <div>
            <form class="sign-up-form form">
                <h2>Cadastrar</h2>
                <div><input name="user-name" autocomplete="off" required placeholder="seu nome de usuário" type="text"></div>
                <div><input name="email" autocomplete="off" required placeholder="seu email" type="email"></div>
                <div><input name="password" autocomplete="off" required placeholder="sua senha" type="password"></div>
                <div><input name="phone-number" autocomplete="off" required placeholder="seu número de telefone" type="number"></div>
                <div style="margin-top:20px;">
                    <select name="role">
                        <option value="0">Selecione o tipo de usuário</option>
                        <option value="1">Comun</option>
                        <option value="2">Artista</option>
                    </select>
                </div>
                <div>
                    <select name="category">
                        <option value="0">Selecione a sua Categoria</option>
                        <option value="1">Categoria 1</option>
                        <option value="2">Categoria 2</option>
                        <option value="3">Categoria 3</option>
                        <option value="4">Categoria 4</option>
                        <option value="5">Todas</option>
                    </select>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div>
            <form class="sign-in-form form">
                <h2>Entrar</h2>
                <div><input name="email" autocomplete="off" required placeholder="seu email" type="email"></div>
                <div><input name="password" autocomplete="off" required placeholder="sua senha" type="password"></div>
                <button type="submit">Entrar</button>
            </form>
        </div>
    </section>
</main>
