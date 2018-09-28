<?php

namespace App\Http\Traits;

use App\Character;

trait CharactersTrait
{
    public function charactersAll()
    {
        $characters = \App\Character::paginate(10);
        foreach ($characters as $character) {
            $films_array = array();
            $films = $character->films;
            foreach ($films as $film) {
                array_push($films_array, env('APP_URL') . '/api/v1/films/' . $film->id);
            }

            $weapons = json_decode($character->weapons);
            $weapons_array = array();
            foreach ($weapons as $weapon) {
                array_push($weapons_array, $weapon);
            }

            $books_array = array();
            $books = $character->books;
            foreach ($books as $book) {
                array_push($books_array, env('APP_URL') . '/api/v1/books/' . $book->id);
            }

            $languages_array = array();
            $languages = $character->languages;
            foreach ($languages as $language) {
                array_push($languages_array, env('APP_URL') . '/api/v1/languages/' . $language->id);
            }

            unset($character->languages);
            unset($character->films);
            unset($character->books);
            unset($character->weapons);
            $character->weapons = $weapons_array;
            $character->languages = $languages_array;
            $character->films = $films_array;
            $character->books = $books_array;
        }
        return $characters;
    }

    public function charactersOne($id)
    {
        $characters = \App\Character::where('id', $id)->get();
        foreach ($characters as $character) {
            $films_array = array();
            $films = $character->films;
            foreach ($films as $film) {
                array_push($films_array,
                    env('APP_URL') . '/api/v1/films/' . $film->id);
            }

            $weapons = json_decode($character->weapons);
            $weapons_array = array();
            foreach ($weapons as $weapon) {
                array_push($weapons_array, $weapon);
            }

            $books_array = array();
            $books = $character->books;
            foreach ($books as $book) {
                array_push($books_array,
                    env('APP_URL') . '/api/v1/books/' . $book->id);
            }

            $languages_array = array();
            $languages = $character->languages;
            foreach ($languages as $language) {
                array_push($languages_array,
                    env('APP_URL') . '/api/v1/languages/' . $language->id);
            }

            unset($character->languages);
            unset($character->films);
            unset($character->books);
            unset($character->weapons);
            $character->weapons = $weapons_array;
            $character->languages = $languages_array;
            $character->films = $films_array;
            $character->books = $books_array;
        }
        return $characters;
    }
}