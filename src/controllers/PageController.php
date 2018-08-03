<?php
namespace Acme\Controllers;

use Acme\Models\User;

class PageController extends BaseController
{
    public function getShowRegisterPage()
    {
        echo $this->blade->render("register");
    }


}
