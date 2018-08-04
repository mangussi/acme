<?php
namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public function testimonials()
    {
        return $this->hasMany('Acme\models\Testimonial');
    }

    public function pendings()
    {
        return $this->hasMany('Acme\models\UserPending');
    }
}
