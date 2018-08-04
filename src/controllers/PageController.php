<?php
namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Models\Page;

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

    public function getShow404()
    {
        echo $this->blade->render("page-not-found");
    }

    public function getShowPage()
    {
        // extract page name from the urldecode
        $uri = explode("/", $_SERVER['REQUEST_URI']);
        $target = $uri[1];

        // find matching page in the db
        $pages = Page::where('slug', '=', $target)->get() ;

        // lock up page content
        $browser_title = '';
        foreach ($pages as $item) {
            $browser_title = $item->browser_title;
            $page_content = $item->page_content;
        }

        if (strlen($browser_title) == 0) {
            header("HTTP/1.0 404 Not Found");
            header("Location: /page-not-found");
            exit();
        }

        // pass content t o some blade template
        echo $this->blade->render('generic-page', [
            'browser_title' => $browser_title,
            'page_content' => $page_content,
          ]);

        // render template
    }
}
