<?php

namespace App\Http\Traits;

use App\Realm;

trait RealmsTrait
{
    public function realmsAll()
    {
        $realms = \App\Realm::get();
        foreach ($realms as $realm) {
            $character_array = array();
            $characters = \App\Character::where('realm', $realm->id)->get();
            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $realm->characters = $character_array;
        }
        return $realms;
    }

    public function realmsOne($id)
    {
        $realms = \App\Realm::where('id', $id)->get();
        foreach ($realms as $realm) {
            $character_array = array();
            $characters = \App\Character::where('realm', $realm->id)->get();
            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $realm->characters = $character_array;
        }
        return $realms;
    }
}