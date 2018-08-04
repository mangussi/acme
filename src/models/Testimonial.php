<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
    //protected $dateFormat = 'Y-m-d\TH:i:s';

    public function user()
    {
        return $this->hasOne('Acme\models\User');
    }
}
