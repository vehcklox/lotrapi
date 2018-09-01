<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    public function characters()
    {
        return $this->hasMany('App\Character', 'id')->select('id', 'name');
    }
}
