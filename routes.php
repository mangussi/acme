<?php

//RegisterController
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Acme\Controllers\RegisterController@getVerifyAccount', 'verify-account');

//


//AutenticationController
$router->map('GET', '/login', 'Acme\Controllers\AutenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AutenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AutenticationController@getLogout', 'logout');
$router->map('GET', '/testuser', 'Acme\Controllers\AutenticationController@getTestUser', 'testuser');

$router->map('GET', '/testemail', function ()
{
  Acme\Email\SendEmail::sendEmail(
    'mangussi@gmail.com'
    , 'Melhor assunto'
    , 'Essa é a mensagem'
    , 'promo@promo.com'
  );
  echo "sent";
  // $slugify = new Cocur\Slugify\Slugify();
  // echo $slugify->slugify('About Acme ');
  // $user = Acme\models\User::find(2);
  // $testimonials = $user->testimonials()->get();
  //
  // echo $user->first_name;
  // echo "<br>";
  // print_r($testimonials);

}, 'test');


//PageController
$router->map('GET', '/page-not-found'    , 'Acme\Controllers\PageController@getShow404', '404');
$router->map('GET', '/'                  , 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/[*]'               , 'Acme\Controllers\PageController@getShowPage', 'show');
