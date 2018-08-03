<?php
namespace Acme\Controllers;

use duncan3dc\Laravel\BladeInstance;

class BaseController
{
    // protected $loader;
    // protected $twig;
    protected $blade;

    public function __construct()
    {
      $this->blade = new BladeInstance(__DIR__ . "/../../views", __DIR__ . "/../../views/cache");
    }

    public function getShowHomePage()
    {
        // include(__DIR__. "/../../views/home.php");
        // echo $this->twig->render('home.html');
        echo $this->blade->render("home");
    }

    public function getShowLoginPage()
    {
        // include(__DIR__. "/../../views/login.html");
        // echo $this->twig->render('login.html');
        echo $this->blade->render("login");
    }

}
