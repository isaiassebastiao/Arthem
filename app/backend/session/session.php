<?php

    session_start();

    $user_id = $_SESSION['id'] ?? null;

    if(!$user_id){
        echo "<style>.user{display:none;}</style>";
    }else{
        echo "<style>.auth{display:none;}</style>";
    }