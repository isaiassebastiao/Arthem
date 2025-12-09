<?php

class ArthemController{

    public function Router(){
        $action = $_GET['action'] ?? null;
        $page = $_GET['page'] ?? null;

        switch($page){
            case 'home':
            break;
            case 'artworks':
            break;
            case 'events':
            break;
            case 'artists':
            break;
            case 'about':
            break;
            case 'signIn':
            break;
            case 'signUp':
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