<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $hidden = ['created_at','updated_at'];

    protected $appends = array('url');

    public function getUrlAttribute() {
        $id = $this->id;
        return env('APP_URL') .'/api/v1/regions/' . $id;
    }
}
