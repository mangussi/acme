<?php namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator
{
    public function isValid($validation_data)
    {
        $errors = [];

        foreach ($validation_data as $name => $value) {
            $rules = explode("|", $value);

            foreach ($rules as $rule) {
                // code...

                $exploded = explode(":", $rule);
                switch ($exploded[0]) {
              case 'min':
                $min = $exploded[1];

                if (Valid::stringType()->length($min)->Validate($_REQUEST[$name]) == false) {
                    $errors[] = $name . " must be at least " . $min . " characters long!";
                }
                break;

              case 'email':

                if (Valid::email()->Validate($_REQUEST[$name]) == false) {
                    $errors[] = $name . " must be a valid email address!";
                }
                break;

              case 'equalTo':
                #v::equals('alganet')->validate('alganet'); // true
                if (Valid::equals($_REQUEST[$name])->Validate($_REQUEST[$exploded[1]]) == false) {
                    $errors[] = $name . " must be equal to " . $exploded[1] ;
                }
                break;


              default:
                // $errors[] = "<br>" . "\$_REQUEST[\$name] => ". $_REQUEST[$name] . "<br>\$rule =>  " . $rule .  "<br>No value found for [" . $exploded[0] . "]";
                $errors[] = "No value found!";
                break;
            }
            } //foreach ($rules as $rule) {
        } // foreach ($validation_data as $name => $value) {
    return $errors;
    }
}
