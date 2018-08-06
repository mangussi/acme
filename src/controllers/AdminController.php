<?php
namespace Acme\controllers;

use Kunststube\CSRFP\SignatureGenerator;
use duncan3dc\Laravel\BladeInstance;
use Acme\models\Page;
use Acme\Validation\Validator;

class AdminController extends BaseController
{
    /**
     * Show a new page
     * @return html render a blade template
     */
    public function getAddPage()
    {
        echo "this";
        $page_id =0;
        $page_content = "Enter your content here";
        $browser_title = "";

        echo $this->blade->render('generic-page', [
        'page_id' => $page_id,
        'page_content' => $page_content,
        'browser_title' => $browser_title,
      ]);
    }
    /**
     * Saved edited page; called via ajax
     * @return string "OK"
     */
    public function postSavePage()
    {
      try {
          $okay = true;
          $page_id = $_REQUEST['page_id'];
          $page_content = $_REQUEST['thedata'];

          if ($page_id > 0) {
               $page = Page::find($page_id);
          } else {
               $page = new Page;
               $page->browser_title = $_REQUEST['browser_title'];
               $slugify = new \Cocur\Slugify\Slugify();
               $page->slug = $slugify->slugify($page->browser_title);
               // verify that the slug is not already in the db
               $results = Page::where('slug', '=', $page->slug)->count();
               $okay = $okay && ( $results == 0);
          }
          if ($okay){
              $page->page_content = $page_content;
              $page->save();
          } else {
              echo "Browser title is already in use!";
          }
          echo "OK";
      } catch (\Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
    }
}
