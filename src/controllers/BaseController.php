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


}
