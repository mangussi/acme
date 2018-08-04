<?php
namespace Acme\Controllers;

use Acme\Models\User;

class PageController extends BaseController
{
    public function getShowLoginPage()
    {
        // include(__DIR__. "/../../views/login.html");
        // echo $this->twig->render('login.html');
        echo $this->blade->render("login");
    }

    public function getShowHomePage()
    {
        echo $this->blade->render("home");
    }

    public function getShowPage()
    {
        echo "foo!";
    }
}
