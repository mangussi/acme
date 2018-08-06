<?php
namespace Acme\controllers;

use Kunststube\CSRFP\SignatureGenerator;
use duncan3dc\Laravel\BladeInstance;

class BaseController
{
    // protected $loader;
    // protected $twig;
    protected $blade;
    protected $signer;

    public function __construct()
    {
        $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
        $this->blade = new BladeInstance(getenv('VIEWS_DIRECTORY'), getenv('CACHE_DIRECTORY'));
    }
}
