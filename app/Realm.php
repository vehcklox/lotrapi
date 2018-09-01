<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realm extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = array('url');

    public function getCapitalAttribute($value)
    {
        return env('APP_URL') .'/api/v1/cities/' . $value;
    }

    public function getInhabitantsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function characters()
    {
        return $this->hasMany('App\Character', 'id')->select('id', 'name');
    }

    public function getUrlAttribute() {
        $id = $this->id;
        return env('APP_URL') .'/api/v1/realms/' . $id;
    }
}
