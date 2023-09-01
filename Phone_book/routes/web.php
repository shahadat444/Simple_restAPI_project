<?php



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register','RegistrationController@onRegister');
$router->get('/login','loginController@onLogin');
//$router->get('/test',['middleware'=>'auth','uses'=>'loginController@ontest']);


$router->post('/DataInsert',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onInsert']);
$router->get('/DataSelect',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onSelect']);
$router->delete('/DataDelete',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onDeletet']);



