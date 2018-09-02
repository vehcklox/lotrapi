<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    protected $appends = array('url');

    public function characters()
    {
        return $this->belongsToMany('App\Character', 'book_character');
    }

    public function getUrlAttribute()
    {
        $id = $this->id;
        return env('APP_URL') . '/api/v1/books/' . $id;
    }
}
