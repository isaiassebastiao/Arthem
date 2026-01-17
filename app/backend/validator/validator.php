<?php


function checkRequiredFields($fields){

    foreach($fields as $field){
        if (!isset($field)){
            return false;
        }

        if(is_string($field)){

            if(trim($field) === ''){
                return false;
            }
        }

        if(is_array($field)){

            if(count($field) === 0){
                return false;
            }
        }
    }
    return true;
}


function validateEmail($email){

    if(!$email){
        return false;
    } 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateImage($img){

    
    $valid = ["size" => false, "extension" => false, "dimensions" => false, "mime" => false, "width" => false, "height" => false];

    $extension = strtolower(pathinfo($img["name"])["extension"]);
    $extensions = ["jpg", "png", "webp", "jfif", "jpeg"];

    $mimes = ["image/png", "image/jpg", "image/webp", "image/jpeg"];
    $mime_file = mime_content_type($img["tmp_name"]);

    
    $size_file = $img["size"];
    $size_max = 4 * 1024 * 1024;

   
    $width_image = getimagesize($img["tmp_name"])[0];
    $height_image = getimagesize($img["tmp_name"])[1];

    
    $width = ["min" => 250, "max" => 3840];
    $height = ["min" => 250, "max" => 2160];

    $valid["extension"] = in_array($extension, $extensions);
    $valid["size"] = ($size_file <= $size_max);
    $valid["mime"] = in_array($mime_file, $mimes);

    $valid["width"] = ($width_image >= $width["min"] && $width_image <= $width["max"]);
    $valid["height"] = ($height_image >= $height["min"] && $height_image <= $height["max"]);

    $valid["dimensions"] = ($valid["width"] && $valid["height"]);

    foreach ($valid as $value){
        if (!$value)
            return false;
    }
    return true;
}

function imagePath($title, $image, $artist_name){
    $path = "../private/users/$artist_name/artworks/$title/";
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    return $path . $image;
}

function deleteFolder($title, $artist_name){
    $path = "../private/users/$artist_name/artworks/$title";
    $deleted = false;

    if (!file_exists($path) || !is_dir($path))

        return true;

    $images = scandir($path);
    foreach ($images as $img){
        if ($img == "." || $img == "..")
            continue;

        $deleted = unlink("$path/$img");
    }

    if ($deleted)
        rmdir($path);
    return true;
}


function saveImage($image, $image_bin, $path, $valid_image){
    
    if(empty($image)){
        return false;
    }else{
        if($valid_image){

            $upload = move_uploaded_file($image_bin, $path);
            
            return true;

            if(!$upload){
                return false;
            }
        }
        return false;
    }
}