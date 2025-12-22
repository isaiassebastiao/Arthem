<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Auth</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../../frontend/public/css/pages/auth.css">
</head>
    <body>

        <div class="auth-container">
            <div class="auth-box">

                <form class="form active" id="login">

                    <h2>Entrar</h2>

                    <div class="input-group">
                        <i class='bx bx-envelope'></i>
                        <input type="email" placeholder="Email" required name="email">
                    </div>

                    <div class="input-group">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" placeholder="Senha" required name="password">
                    </div>

                    <button class="btn-primary" type="submit">Entrar</button>

                    <p class="switch">
                        Não tem conta?
                        <a href="../pages/auth.php?action=signUp">Criar conta</a>
                    </p>
                </form>

            

                <form class="form" id="register">

                    <h2>Criar Conta</h2>

                    <div class="input-group">
                        <i class='bx bx-user'></i>
                        <input type="text" placeholder="Nome de usuário" required name="name">
                    </div>

                    <div class="input-group">
                        <i class='bx bx-envelope'></i>
                        <input type="email" placeholder="Email" required name="email">
                    </div>

                    <div class="input-group">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" placeholder="Senha" required name="password">
                    </div>

                    <div class="input-group">
                        <i class='bx bx-phone'></i>
                        <input type="tel" placeholder="Telefone" required name="phone_number">
                    </div>

                    <div class="input-group textarea">
                        <i class='bx bx-align-left'></i>
                        <textarea placeholder="Dê-nos uma breve biografia sobre si" required name="biography"></textarea>
                    </div>

                    <div class="input-group">
                        <i class='bx bx-category'></i>
                        <select required name="category">
                            <option selected disabled required>Selecione sua categoria</option>
                            <option value="1">Arte Digital</option>
                            <option value="2">Desenho</option>
                            <option value="3">Escultura</option>
                            <option value="4">Fotografia</option>
                            <option value="5">Pintura</option>
                            <option value="6">Todos</option>
                        </select>
                    </div>

                    <button class="btn-primary" type="submit">Cadastrar</button>

                    <p class="switch">
                        Já tem conta?
                        <a href="../pages/auth.php?action=signIn">Entrar</a>
                    </p>
                </form>

            </div>
        </div>

    </body>
</html>
<script src="../../../frontend/src/components/auth_validations.js"></script>
<script src="../../../frontend/src/pages/Auth.js"></script>