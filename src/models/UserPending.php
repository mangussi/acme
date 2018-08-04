<?php namespace Acme\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPending extends Eloquent
{
    protected $table = 'users_pending';
    public function user()
    {
        return $this->hasOne('Acme\models\User');
    }
}
