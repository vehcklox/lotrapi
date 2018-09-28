<?php

namespace App\Http\Traits;

use App\Species;

trait SpeciesTrait
{
    public function speciesAll()
    {
        $species = \App\Species::paginate(10);
        foreach ($species as $class) {
            $character_array = array();
            $characters = \App\Character::where('species', $class->id)->get();

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $class->characters = $character_array;
        }
        return $species;
    }

    public function speciesOne($id)
    {
        $species = \App\Species::where('id', $id)->get();
        foreach ($species as $class) {
            $character_array = array();
            $characters = \App\Character::where('species', $class->id)->get();

            foreach ($characters as $character) {
                array_push($character_array, env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $class->characters = $character_array;
        }
        return $species;
    }
}