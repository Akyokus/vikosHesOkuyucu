<?php

error_reporting(E_ALL);
ini_set('disable_errors' , 0);
//TODO: active

require __DIR__ . '/app/init.php';

$routeExplode = explode('?',$_SERVER['REQUEST_URI']);   //gelen request_urı'yı '?' ile kesiyor
$route = array_filter(explode('/',$routeExplode[0]));   // ilk url'i alıp array'i sıfırlıyor.

//damp($route);

//require_once('vendor/autoload.php');     google api autoload

if(SUBFOLDER === true){
    array_shift($route);
}


if(!route(0)){
    $route[0] = 'index';
}

if(!file_exists(controller(route(0)))){
    $route[0] = '404';
}

require controller(route(0));
