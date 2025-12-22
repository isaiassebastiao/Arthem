<?php
    class ArthemController{
        
        public function Router(){

            $action = $_GET['action'] ?? null;

            switch($action){
                
                case 'signUpArtist':

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone_number = $_POST['phone_number'];
                    $category_id = $_POST['category'];
                    $biography = $_POST['biography'];
                    
                    $artist = new Artist();
                    $response = $artist->signUpArtist($name, $email, $password, $phone_number, $category_id, $biography);
                    
                    echo json_encode($response);

                break;

                case 'artistAutenticator':

                    $email = $_POST['email'];
                    $password = $_POST['password'];

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

                    $id = $_POST['id'];

                    $artist = new Artist();
                    $response = $artist->viewArtistData($id);
                    
                    echo json_encode($response);

                break;

                case 'publishArtWork':

                    $artist_id = $_POST['artist_id']; 
                    $title = $_POST['title']; 
                    $description = $_POST['description']; 
                    $price = $_POST['price']; 
                    $artwork_path = $_POST['artwork_path'];

                    $artwork = new ArtWork();
                    $response = $artwork->publishArtWork($artist_id, $title, $description, $price, $artwork_path);

                    echo json_encode($response);

                break;

                case 'getAllArtworks':

                    $artwork = new ArtWork();
                    $response = $artwork->getAllArtworks();

                    echo json_encode($response);

                break;

                case 'getAllArtistArtworks':

                    $artist_id = $_POST['artist_id'];

                    $artwork = new ArtWork();
                    $response = $artwork->getAllArtistArtworks($artist_id);

                    echo json_encode($response);

                break;

                case 'getArtwork':

                    $id = $_POST['id'];

                    $artwork = new ArtWork();
                    $response = $artwork->getArtwork($id);

                    echo json_encode($response);

                break;

                case 'updateArtworkData':

                    $id = $_POST['id'];
                    $artist_id = $_POST['artist_id'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $artwork_path = $_POST['artwork_path'];

                    $artwork = new ArtWork();
                    $response = $artwork->updateArtworkData($id, $artist_id, $title, $description, $price, $artwork_path);

                    echo json_encode($response);

                break;

                case 'deleteArtWork':

                    $id = $_POST['id'];

                    $artwork = new ArtWork();
                    $response = $artwork->deleteArtWork($id);

                    echo json_encode($response);

                break;
            }
            if(!$action){
                header('Location: backend/views/pages/home.php');
                exit;
            }
        }
    }

    $arthemController = new ArthemController();
    $arthemController->Router();