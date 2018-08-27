<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realm extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function getCapitalAttribute($value)
    {
        return env('APP_URL') .'/api/v1/cities/' . $value;
    }

    public function getInhabitantsAttribute($value)
    {
        return json_decode($value, true);
    }
//
//    public function getCharactersAttribute($value) {
//        return env('APP_URL') .'/api/v1/group/' . $value;
//    }

    public function characters()
    {
        return $this->hasMany('App\Character', 'id')->select('id', 'name');
    }
}
