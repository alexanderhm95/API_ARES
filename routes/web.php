<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "cliente"], function ($router) {
    $router->get("all", "ClienteController@allSinRestricciones");    
    $router->get("allJson", "ClienteController@allJson");
    $router->get("get/{cedula}", "ClienteController@getCliente");
    $router->post('new', 'ClienteController@create');
});

$router->group(['prefix' => 'usuario'], function($router){
    $router->post('ingresar', 'UserController@login'); 
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/clientes','ClienteController@index');
$router->get('/clientes/{cedula}',  'ClienteController@getCliente');
$router->post('/clientes',       'ClienteController@setCliente');
$router->post('/clientes/{cedula}',  'ClienteController@updCliente');
$router->delete('/clientes/{cedula}',  'ClienteController@deleteCliente');

$router->get('/productos','ProductoController@index');
$router->get('/productos/{nombre}',  'ProductoController@getProducto');
$router->post('/productos',       'ProductoController@setProducto');
$router->post('/productos/{nombre}',  'ProductoController@updProducto');
$router->delete('/productos/{nombre}',  'ProductoController@deleteProducto');