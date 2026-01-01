<?php

    session_start();

    function accessControl(){

        $user_id = $_SESSION['id'] ?? null;
        $current_page = basename($_SERVER['SCRIPT_NAME'], '.php');
    
        if(!$user_id){
            echo "<style>.user{display:none;}</style>";
    
            if($current_page === 'artist_dashboard'){
                header('Location: ../pages/auth.php?action=signIn');
            } 
    
        }else{
            echo "<style>.auth, #logar, #cad{display:none;}#menuButton{transform: translateX(-40px);}</style>";
    
            if($current_page === 'auth'){
                header('Location: ../pages/home.php?page=home');
            }
        }
    }

    accessControl();






    