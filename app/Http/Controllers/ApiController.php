<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request, $model)
    {
        if($model === 'characters'){;
            $characters = \App\Character::get();
            foreach ($characters as $character) {
                $films_array= array();
                $films = $character->films;
                foreach ($films as $film) {
                    array_push($films_array, env('APP_URL') .'/api/v1/films/' .$film->id);
                }

                $books_array= array();
                $books = $character->books;
                foreach ($books as $book) {
                    array_push($books_array, env('APP_URL') .'/api/v1/books/' .$book->id);
                }

                $languages_array = array();
                $languages = $character->languages;
                foreach ($languages as $language) {
                    array_push($languages_array, env('APP_URL') .'/api/v1/languages/' .$language->id);
                }

                unset($character->languages);
                unset($character->films);
                unset($character->books);
                $character->languages = $languages_array;
                $character->films = $films_array;
                $character->books = $books_array;
            }
            $response = response()->json(["count"=>count($characters),"results"=>$characters], 200);
        } elseif($model === 'realms'){
            $realms = \App\Realm::get();
            foreach ($realms as $realm) {
                $character_array= array();
                $characters = \App\Character::where('realm', $realm->id)->get();
                foreach ($characters as $character) {
                    array_push($character_array, env('APP_URL') .'/api/v1/characters/' .$character->id);
                }
                $realm->characters = $character_array;
            }
            $response = response()->json(["count"=>$realms->count(),"results"=>$realms], 200);
        }
        return $response;
    }

    public function getOne(Request $request, $model, $id)
    {
        if($model === 'characters') {
            $characters = \App\Character::where('id', $id)->get();
            foreach ($characters as $character) {
                $films_array = array();
                $films = $character->films;
                foreach ($films as $film) {
                    array_push($films_array, env('APP_URL') .'/api/v1/films/' .$film->id);
                }

                $books_array = array();
                $books = $character->books;
                foreach ($books as $book) {
                    array_push($books_array, env('APP_URL') .'/api/v1/books/' .$book->id);
                }

                $languages_array = array();
                $languages = $character->languages;
                foreach ($languages as $language) {
                    array_push($languages_array, env('APP_URL') .'/api/v1/languages/' .$language->id);
                }

                unset($character->languages);
                unset($character->films);
                unset($character->books);
                $character->languages = $languages_array;
                $character->films = $films_array;
                $character->books = $books_array;
            }
            $response = response()->json($characters, 200);
        } elseif($model === 'realms'){
            $realms = \App\Realm::where('id', $id)->get();
            $response = response()->json($realms, 200);
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Character  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Character $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Character  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $person)
    {
        //
    }
}
