<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $appends = array('url');

    public function getRealmAttribute($value) {
        return env('APP_URL') .'/api/v1/realms/' . $value;
    }

    public function getSpeciesAttribute($value) {
        return env('APP_URL') .'/api/v1/species/' . $value;
    }

    public function getRaceAttribute($value) {
        return env('APP_URL') .'/api/v1/races/' . $value;
    }

    public function getGroupAttribute($value) {
        return env('APP_URL') .'/api/v1/groups/' . $value;
    }

    public function realm()
    {
        return $this->belongsTo('App\Realm', 'realm', 'id')->select('id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language', 'character_language');
    }

    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_character')->select('books.id');
    }

    public function films()
    {
        return $this->belongsToMany('App\Film', 'character_film')->select('films.id');
    }

    public function species()
    {
        return $this->belongsTo('App\Species', 'species', 'id')->select('id');
    }

    public function getUrlAttribute() {
        $id = $this->id;
        return env('APP_URL') .'/api/v1/characters/' . $id;
    }
}
