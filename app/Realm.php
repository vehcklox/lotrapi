<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realm extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    public function character()
    {
        return $this->hasOne('App\Character', 'realm', 'id');
    }
}
