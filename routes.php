<?php

//RegisterController
$router->map('GET', '/register', 'Acme\controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Acme\controllers\RegisterController@getVerifyAccount', 'verify_account');


// admin routes
if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level ==2)) {
  $router->map('POST', '/admin/page/edit', 'Acme\controllers\AdminController@postSavePage', 'save_page');
  $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
}


//TestimonialController
if (Acme\Auth\LoggedIn::user()) {
    $router->map('GET', '/add-testimonial', 'Acme\controllers\TestimonialController@getShowAdd', 'add_testimonial');
    $router->map('POST', '/add-testimonial', 'Acme\controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
}
$router->map('GET', '/testimonials', 'Acme\controllers\TestimonialController@getShowTestimonials', 'testimonials');



//AutenticationController
$router->map('GET', '/login', 'Acme\controllers\AutenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\controllers\AutenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\controllers\AutenticationController@getLogout', 'logout');
$router->map('GET', '/testuser', 'Acme\controllers\AutenticationController@getTestUser', 'testuser');

$router->map('GET', '/testemail', function () {
    Acme\Email\SendEmail::sendEmail(
    'mangussi@gmail.com',
      'Melhor assunto',
      'Essa é a mensagem',
      'promo@promo.com'
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
$router->map('GET', '/page-not-found', 'Acme\controllers\PageController@getShow404', '404');
$router->map('GET', '/', 'Acme\controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/[*]', 'Acme\controllers\PageController@getShowPage', 'show');
