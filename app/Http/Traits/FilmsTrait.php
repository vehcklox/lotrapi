<?php

namespace App\Http\Traits;

use App\Film;

trait FilmsTrait
{
    public function filmsAll()
    {
        $films = \App\Film::paginate();
        foreach ($films as $film) {
            $film_id = $film->id;
            $character_array = array();
            $characters = \App\Character::whereHas('films', function ($q) use ($film_id) {
                $q->where('films.id', $film_id);
            })->get(['id']);

            $directors = json_decode($film->director);
            $director_array = array();
            foreach ($directors as $director) {
                array_push($director_array, $director);
            }

            $producers = json_decode($film->producer);
            $producer_array = array();
            foreach ($producers as $producer) {
                array_push($producer_array, $producer);
            }

            unset($film->director);
            $film->director = $director_array;

            unset($film->producer);
            $film->producer = $producer_array;

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $film->characters = $character_array;

        }
        return $films;
    }

    public function filmsOne($id)
    {
        $films = \App\Film::where('id', $id)->get();
        foreach ($films as $film) {
            $film_id = $film->id;
            $character_array = array();
            $characters = \App\Character::whereHas('films', function ($q) use ($film_id) {
                $q->where('films.id', $film_id);
            })->get(['id']);

            foreach ($characters as $character) {
                array_push($character_array,
                    env('APP_URL') . '/api/v1/characters/' . $character->id);
            }
            $film->characters = $character_array;
        }
        return $films;
    }
}