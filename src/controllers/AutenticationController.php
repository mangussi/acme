<?php
namespace Acme\Controllers;

use Acme\Validation\Validator;
use Acme\Models\User;
use Acme\Auth\LoggedIn;

class AutenticationController extends BaseController
{
    public function getShowLoginPage()
    {
        // include(__DIR__. "/../../views/login.html");
        // echo $this->twig->render('login.html');
        echo $this->blade->render("login");
    }

    public function postShowLoginPage()
    {
        $okay = true;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        //look up the user
        $user = User::where('email', '=', $email)
          ->first();

        // validate credentials
        $okay = $okay && ($user != null);
        $okay = $okay && password_verify($password, $user->password);


        // if not valid, redirect to login page
        if (!$okay) {
            // $_SESSION['msg'] = ["Invalid credentials!"];
            echo $this->blade->render('login', ['errors' => ["Invalid credentials!"]]);
            // unset($_SESSION['msg']);
            exit();
        }

        if($user->active == 0){
          // $_SESSION['msg'] = ["Invalid credentials!"];
          echo $this->blade->render('login', ['errors' => ["The User is not validated. Verify your email."]]);
          // unset($_SESSION['msg']);
          exit();

        };
        // if valid, log them in
        $_SESSION['user'] = $user;
        header("Location: /");
    }

    public function getLogout()
    {
      unset($_SESSION['user']);
      session_destroy();
      header("Location: /login");
    }

    public function getTestUser(){
      dd(LoggedIn::user());
    }
}
