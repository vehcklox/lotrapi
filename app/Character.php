<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function getRealmAttribute($value) {
        return env('APP_URL') .'/api/v1/realms/' . $value;
    }

    public function getSpeciesAttribute($value) {
        return env('APP_URL') .'/api/v1/species/' . $value;
    }

    public function getRaceAttribute($value) {
        return env('APP_URL') .'/api/v1/race/' . $value;
    }

    public function getGroupAttribute($value) {
        return env('APP_URL') .'/api/v1/group/' . $value;
    }

    public function realm()
    {
        return $this->belongsTo('App\Realm', 'realm', 'id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language', 'character_language');
    }

    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_character');
    }

    public function films()
    {
        return $this->belongsToMany('App\Film', 'character_film');
    }
}
