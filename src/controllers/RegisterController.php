<?php
namespace Acme\Controllers;

use Acme\Validation\Validator;
use Acme\Models\User;


class RegisterController extends BaseController
{

    public function getShowRegisterPage()
    {
        // include(__DIR__. "/../../views/register.html");
        // echo $this->twig->render('register.html');
        echo $this->blade->render("register");
    }

    public function postShowRegisterPage()
    {
        //validate data
        $errors = [];

        $validation_data = [
          'first_name' => 'min:3',
          'last_name' => 'min:3',
          'email' => 'email|equalTo:verify_email|required',
          'password' => 'min:3|equalTo:verify_password',
        ];

        $validator = new Validator();

        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            // $_SESSION['msg'] = $errors;
            // header("Location: /register");
            echo $this->blade->render("register", ['errors' => $errors]);
            exit();
        }
        // if validation fails, go back to register
        // and display error message
        $user = new User();
        $user->first_name = $_REQUEST['first_name'];
        $user->last_name = $_REQUEST['last_name'];
        $user->email = $_REQUEST['email'];
        $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $user->save();
        echo "Posted!!!";
    }


}
