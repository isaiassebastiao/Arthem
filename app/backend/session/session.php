<?php

    session_start();

    function accessControl(){

        $role = $_SESSION['role'] ?? null;

        $current_page = basename($_SERVER['SCRIPT_NAME'], '.php');
    
        if(!$role){
            echo "<style>.user{display:none;}</style>";
    
            if($current_page === 'artist_dashboard' || $current_page === 'admin'){
                header('Location: ../pages/auth.php?action=signIn');
            } 
    
        }else{
            echo "<style>.auth, #logar, #cad{display:none;}#menuButton{transform: translateX(-40px);}</style>";
    
            if($current_page === 'auth'){
                header('Location: ../pages/home.php?page=home');
            }

            if($current_page === 'admin' && strtolower($role) === 'artist'){
                header('Location: ../pages/home.php?page=home');
            }

            if($current_page !== 'admin' && strtolower($role) === 'admin'){
                header('Location: ../pages/admin.php');
            }
        }
    }

    accessControl();