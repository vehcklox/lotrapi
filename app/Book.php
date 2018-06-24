<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    public function characters()
    {
        return $this->belongsToMany('App\Character', 'book_character');
    }
}
