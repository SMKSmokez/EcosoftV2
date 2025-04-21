<?php

function dd($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}
 function abort() {
    http_response_code(404);

    require "Pages/404.php";
    
    die();
 }
?>