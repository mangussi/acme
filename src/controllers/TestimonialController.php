<?php
namespace Acme\Controllers;

use Acme\Validation\Validator;
use Acme\models\Testimonial;
use Acme\Auth\LoggedIn;

class TestimonialController extends BaseController
{
    public function getShowTestimonials()
    {
        $testimonials = Testimonial::all();
        
        echo $this->blade->render('testimonials', ['testimonials' => $testimonials]);
    }

    public function getShowAdd()
    {
        if (!LoggedIn::user()) {
            header("Location: /login");
            exit();
        }
        echo $this->blade->render("add-testimonial");
    }


    public function postShowAdd()
    {
        //validate data
        $errors = [];

        $validation_data = [
          'title' => 'min:3',
          'testimonial' => 'min:10',
        ];

        $validator = new Validator();

        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            echo $this->blade->render("add-testimonial", ['errors' => $errors]);
            exit();
        }

        $testimonial = new Testimonial();
        $testimonial->title = $_REQUEST['title'];
        $testimonial->testimonial = $_REQUEST['testimonial'];
        $testimonial->user_id = LoggedIn::user()->id;
        $testimonial->save();

        header("Location: /testimonial-saved");
        exit();
    }
}
