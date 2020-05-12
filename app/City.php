<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $hidden = ['created_at','updated_at'];

    protected $appends = array('url');

    public function getUrlAttribute() {
        $id = $this->id;
        return env('APP_URL') .'/api/v1/cities/' . $id;
    }
}
