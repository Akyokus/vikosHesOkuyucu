<?php
//views kısmında kullanılan fonksiyonlar
function site_url($url = false){
    return URL . '/' . $url ;
}

function public_url($url = false){
    return URL . '/public/user/' . $url;

}

function public_urls($url = false){
    return URL . '/public/customer/' . $url;

}

function error(){
    global $error;
    return isset($error) ? $error : false;
}
function success(){
    global $success;
    return isset($success) ? $success : false;
}

function damp($string){
    if (gettype($string) == "array"){
        print_r($string);
        exit();

    }else{
        echo $string;
        exit();
    }
}


