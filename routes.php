<?php


$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/login', 'Acme\Controllers\PageController@getShowLoginPage', 'login');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404');

$router->map('GET', '/slug', function ()
{
  $slugify = new Cocur\Slugify\Slugify();
  echo $slugify->slugify('About Acme ');
  // $user = Acme\models\User::find(2);
  // $testimonials = $user->testimonials()->get();
  //
  // echo $user->first_name;
  // echo "<br>";
  // print_r($testimonials);

}, 'test');


$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'show');
