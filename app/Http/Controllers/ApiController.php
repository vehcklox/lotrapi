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
        if($model === 'characters'){
            $characters = \App\Character::with(['languages:name', 'books:books.id', 'films:films.id'])->get()->toArray();
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
            $characters = \App\Character::with(['languages:name', 'books:title', 'films:title'])->where('id', $id)->get();
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
