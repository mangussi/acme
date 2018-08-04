<?php
namespace Acme\Auth;

use Acme\Models\User;

/**
 *
 */
class LoggedIn
{
    public static function user()
    {
        if (!isset($_SESSION['user'])){
          return false;
        }
        $user = $_SESSION['user'];
        return $user;
    }
    //
  // function __construct(argument)
  // {
  //   // code...
  // }
}
