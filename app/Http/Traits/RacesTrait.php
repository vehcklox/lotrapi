<?php

namespace App\Http\Traits;

use App\Race;

trait RacesTrait
{
    public function racesAll()
    {
        $races = \App\Race::get();
        foreach ($races as $race) {
            $character_array = array();
            $characters = \App\Character::where('species', $race->id)->get();

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $race->characters = $character_array;
        }
        return $races;
    }

    public function racesOne($id)
    {
        $races = \App\Race::where('id', $id)->get();
        foreach ($races as $race) {
            $character_array = array();
            $characters = \App\Character::where('species', $race->id)->get();

            foreach ($characters as $character) {
                array_push($character_array, env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $race->characters = $character_array;
        }
        return $races;
    }
}