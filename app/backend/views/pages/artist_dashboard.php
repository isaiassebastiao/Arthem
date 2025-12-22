<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Artista</title>
    <link rel="stylesheet" href="../../../frontend/public/css/pages/artist_dashboard.css">
    <link rel="stylesheet" href="../../../frontend/public/css/pages/artist_dashboard_forms.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <header class="topo">
    <h1>Arthem</h1>
    <span>Painel do Artista</span>
    </header>

    <main class="container">
        <aside class="sidebar">
            <button class="my-artworks active">Minhas Obras</button>
            <button class="publish-artwork-tab">Publicar Obra</button>
            <a href="../pages/home.php?page=home"><button>Voltar</button></a>
        </aside>

        <section class="conteudo">
                <h2>Minhas Obras</h2>
    
                <table>
                    <thead>
                        <tr>
                            <th>Obra</th>
                            <th>Título</th>
                            <th>Preço</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src=""></td>
                            <td>Monalisa</td>
                            <td>AOA 150.000</td>
                            <td class="ativo">Ativa</td>
                            <td>
                                <button class="ver">Ver</button>
                                <button class="editar">Editar</button>
                                <button class="excluir">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </section>
    </main>  
        
    <aside class="artworks-modals">
        <img src="../../../frontend/public/icons/close_24dp_FFFEDF_FILL0_wght400_GRAD0_opsz24.svg" style="cursor:pointer;" class="close-publish-artwork-modal">
        <div class="publish-update-artworks-container">
            <form class="card" id="publish_artwork_modal">
    
                <h2>Publicar Obra</h2>
    
                <div class="input-group">
                    <i class='bx bx-palette'></i>
                    <input type="text" placeholder="Informe o título da sua obra" required name="title">
                </div>
    
                <div class="input-group">
                    <i class='bx bx-money'></i>
                    <input type="number" placeholder="Informe o preço da sua obra" required name="price">
                </div>
    
                <div class="input-group textarea">
                    <i class='bx bx-align-left'></i>
                    <textarea placeholder="Dê uma breve descrição da sua obra" required name="description"></textarea>
                </div>
    
                <label class="upload-box">
                    <i class='bx bx-upload'></i>
                    <span>Carregar imagem da obra</span>
                    <input type="file"  required name="category">
                </label>
    
                <button class="btn-primary" type="submit">Publicar</button>
    
            </form>


            <form class="card" id="update_artwork_modal">
    
                <h2>Editar Obra</h2>
    
                <div class="input-group">
                    <i class='bx bx-palette'></i>
                    <input type="text" placeholder="Informe o título da sua obra" required name="title">
                </div>
    
                <div class="input-group">
                    <i class='bx bx-money'></i>
                    <input type="number" placeholder="Informe o preço da sua obra" required name="price">
                </div>
    
                <div class="input-group textarea">
                    <i class='bx bx-align-left'></i>
                    <textarea placeholder="Dê uma breve descrição da sua obra" required name="description"></textarea>
                </div>

                <div class="input-group">
                    <i class='bx bx-category'></i>
                    <select required name="category">
                        <option selected disabled>Estado da Obra</option>
                        <option value="1">À venda</option>
                        <option value="2">Vendida</option>
                    </select>
                </div>

                <label class="upload-box">
                    <i class='bx bx-upload'></i>
                    <span>Atualizar imagem da obra</span>
                    <input type="file" required name="artwork_path">
                </label>
                <button class="btn-primary" type="submit" >Sobrescrever</button>
    
            </form>

            <div id="view_artwork_modal">
                <div><img src="../../../frontend/public/images/artes/monalisa.jfif" alt="modalisa-artwork"></div>
                <div><strong>Título: </strong><span></span></div>
                <div><strong>Dimensões: </strong><span></span></div>
                <div><strong>Descrição: </strong><span></span></div>
                <div><strong>Preço: </strong><span></span></div>
            </div>
        
            <div id="delete_artwork_modal">
                <div><strong>Confirmar Excluir Obra</strong></div>
                <div><p>Esta Obra será excluída de sua galeria, tem certeza que quer excluir esta Obra de Arte ?</p></div>
                <div style="display: flex; gap:10px; justify-content:center;">
                    <button id="confirm_delete">Sim</button>
                    <button id="cancel_delete">Não</button>
                </div>
            </div>
        </div>
    </aside>
     
</body>
</html>
<script src="../../../frontend/src/components/artist_dashboard_animations.js"></script>