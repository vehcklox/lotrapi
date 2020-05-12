<?php

namespace App\Http\Traits;

use App\CharacterGroup;

trait GroupsTrait
{
    public function groupsAll()
    {
        $groups = \App\CharacterGroup::paginate(10);
        foreach ($groups as $group) {
            $character_array = array();
            $characters = \App\Character::where('species', $group->id)->get();

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $group->characters = $character_array;
        }
        return $groups;
    }

    public function groupsOne($id)
    {
        $groups = \App\CharacterGroup::where('id', $id)->get();
        foreach ($groups as $group) {
            $character_array = array();
            $characters = \App\Character::where('species', $group->id)->get();

            foreach ($characters as $character) {
                array_push($character_array, env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $group->characters = $character_array;
        }
        return $groups;
    }
}