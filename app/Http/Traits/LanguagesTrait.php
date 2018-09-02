<?php

namespace App\Http\Traits;

use App\Language;

trait LanguagesTrait
{
    public function languagesAll()
    {
        $languages = \App\Language::get();
        foreach ($languages as $language) {
            $language_id = $language->id;
            $character_array = array();
            $characters = \App\Character::whereHas('languages', function ($q) use ($language_id) {
                $q->where('languages.id', $language_id);
            })->get(['id']);

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $language->characters = $character_array;
        }
        return $languages;
    }

    public function languagesOne($id)
    {
        $languages = \App\CharacterGroup::where('id', $id)->get();
        foreach ($languages as $language) {
            $language_id = $language->id;
            $character_array = array();
            $characters = \App\Character::whereHas('languages', function ($q) use ($language_id) {
                $q->where('languages.id', $language_id);
            })->get(['id']);

            foreach ($characters as $character) {
                array_push($character_array, env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $language->characters = $character_array;
        }
        return $languages;
    }
}