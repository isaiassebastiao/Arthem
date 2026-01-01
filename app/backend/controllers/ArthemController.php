<?php

    class ArthemController{
        public function Router(){   

            $action = $_GET['action'] ?? null;

            switch($action){
                
                case 'signUpArtist':

                    $name = $_POST['name'] ?? null;
                    $email = $_POST['email'] ?? null;
                    $password = $_POST['password'] ?? null;
                    $phone_number = $_POST['phone_number'] ?? null;
                    $category_id = $_POST['category'] ?? null;
                    $biography = $_POST['biography'] ?? null;

                    if (!checkRequiredFields([$name, $email, $password, $phone_number, $category_id])){
                        echo json_encode(['success'=>false, 'message'=>'Preencha todos os campos obrigatórios']);
                        exit;
                    }

                    if (!validateEmail($email)) {
                        echo json_encode(['success'=>false, 'message'=>'Email inválido']);
                        exit;
                    }

                    $artist = new Artist();
                    $response = $artist->signUpArtist($name, $email, $password, $phone_number, $category_id, $biography);
                    echo json_encode($response);

                break;

                case 'artistAutenticator':

                    $email = $_POST['email'] ?? null;
                    $password = $_POST['password'] ?? null;

                    if (!checkRequiredFields([$email, $password])) {
                        echo json_encode(['success'=>false, 'message'=>'Email e senha são obrigatórios']);
                        exit;
                    }

                    if (!validateEmail($email)) {
                        echo json_encode(['success'=>false, 'message'=>'Email inválido']);
                        exit;
                    }

                    $artist = new Artist();
                    $response = $artist->artistAutenticator($email, $password);
                    echo json_encode($response);

                break;

                case 'viewAllArtistsData':

                    $artist = new Artist();
                    $response = $artist->viewAllArtistsData();
                    echo json_encode($response);

                break;

                case 'viewArtistData':

                    $id = $_POST['id'] ?? null;
                    if (!checkRequiredFields([$id])) {
                        echo json_encode(['success'=>false, 'message'=>'ID do artista obrigatório']);
                        exit;
                    }

                    $artist = new Artist();
                    $response = $artist->viewArtistData($id);
                    echo json_encode($response);

                break;

                case 'publishArtWork':

                    $artist_id = $_POST['artist_id'] ?? null; 
                    $artist_name = $_POST['name'] ?? null;
                    $title = $_POST['title'] ?? null; 
                    $description = $_POST['description'] ?? null; 
                    $price = $_POST['price'] ?? null; 
                    $artwork_image = $_FILES['artwork_path'] ?? null;

                    if (!checkRequiredFields([$artist_id, $artist_name, $title, $price, $artwork_image])) {
                        echo json_encode(['success'=>false, 'message'=>'Campos obrigatórios não preenchidos']);
                        exit;
                    }

                    $image_validated = validateImage($artwork_image);

                    if(!$image_validated){
                        echo json_encode(['success'=>false, 'message'=>'Imagem inválida, tente novamente']);
                        exit;
                    }

                    $artwork_path = imagePath($title, $artwork_image['name'], $artist_name);
                    $image_uploaded = saveImage($artwork_image, $artwork_image['tmp_name'], $artwork_path, $image_validated);

                    if($image_uploaded){
                        $artwork = new ArtWork();
                        $response = $artwork->publishArtWork($artist_id, $title, $description, $price, $artwork_path);
                        echo json_encode($response);
                    }

                break;

                case 'getAllArtworks':

                    $artwork = new ArtWork();
                    $response = $artwork->getAllArtworks();
                    echo json_encode($response);

                break;

                case 'getAllArtistArtworks':

                    $artist_id = $_POST['artist_id'] ?? null;
                    if (!checkRequiredFields([$artist_id])) {
                        echo json_encode(['success'=>false, 'message'=>'ID do artista obrigatório']);
                        exit;
                    }

                    $artwork = new ArtWork();
                    $response = $artwork->getAllArtistArtworks($artist_id);
                    echo json_encode($response);

                break;

                case 'getArtwork':

                    $id = $_POST['id'] ?? null;
                    if (!checkRequiredFields([$id])) {
                        echo json_encode(['success'=>false, 'message'=>'ID da obra obrigatório']);
                        exit;
                    }

                    $artwork = new ArtWork();
                    $response = $artwork->getArtwork($id);
                    echo json_encode($response);

                break;

                case 'updateArtworkData':

                    $id = $_POST['id'] ?? null;
                    $artist_name = $_POST['name'] ?? null;
                    $title = $_POST['title'] ?? null;
                    $description = $_POST['description'] ?? null;
                    $price = $_POST['price'] ?? null;
                    $status = $_POST['status'] ?? null;

                    if (!checkRequiredFields([$id, $title, $price, $status])) {
                        echo json_encode(['success'=>false, 'message'=>'Campos obrigatórios não preenchidos']);
                        exit;
                    }

                    $artwork_image = $_FILES['artwork_path'] ?? null;
                    $artwork = new ArtWork();

                    if($artwork_image && $artwork_image['error'] === UPLOAD_ERR_OK){

                        $image_validated = validateImage($artwork_image);

                        if(!$image_validated){
                            echo json_encode(['success'=>false, 'message'=>'Imagem inválida, tente novamente']);
                            exit;
                        }

                        $artwork_path = imagePath($title, $artwork_image['name'], $artist_name);
                        $image_uploaded = saveImage($artwork_image, $artwork_image['tmp_name'], $artwork_path, $image_validated);

                        if($image_uploaded){
                            $response = $artwork->updateArtworkData($id, $title, $description, $price, $status, $artwork_path);
                            echo json_encode($response);
                        }
                        exit;
                    }

                    $response = $artwork->updateArtworkData($id, $title, $description, $price, $status, null);
                    echo json_encode($response);

                break;

                case 'deleteArtWork':

                    $id = $_POST['id'] ?? null;
                    $title = $_POST['title'] ?? null;
                    $artist_name = $_POST['name'] ?? null;

                    if (!checkRequiredFields([$id, $title, $artist_name])) {
                        echo json_encode(['success'=>false, 'message'=>'Dados incompletos para exclusão']);
                        exit;
                    }

                    $artwork_deleted = deleteFolder($title, $artist_name);

                    if(!$artwork_deleted){
                        echo json_encode(['success'=>false, 'message'=>'Erro ao excluir a sua obra de arte!']);
                        exit;
                    }  
    
                    $artwork = new ArtWork();
                    $response = $artwork->deleteArtWork($id);
                    echo json_encode($response);

                break;
            }

            if(!$action){
                header('Location: backend/views/pages/home.php?page=home');
                exit;
            }
        }
    }

    $arthemController = new ArthemController();
    $arthemController->Router();