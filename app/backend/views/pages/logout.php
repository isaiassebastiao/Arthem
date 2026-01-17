<?php
    
    session_start();

    if(isset($_SESSION['role'])){
        session_destroy();
        header('Location: home.php?page=home');
    }