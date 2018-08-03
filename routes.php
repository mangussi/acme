<?php

$router->map('GET', '/', 'Acme\Controllers\BaseController@getShowHomePage', 'home');
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/login', 'Acme\Controllers\BaseController@getShowLoginPage', 'login');
