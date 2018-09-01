<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Traits\CharactersTrait;
use App\Http\Traits\FilmsTrait;
use App\Http\Traits\RealmsTrait;
use App\Http\Traits\SpeciesTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use CharactersTrait;
    use FilmsTrait;
    use RealmsTrait;
    use SpeciesTrait;

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request, $model)
    {
        if ($model === 'characters') {
            $characters = $this->charactersAll();
            $response = response()
                ->json(["count" => count($characters), "results" => $characters], 200);
        } elseif ($model === 'realms') {
            $realms = $this->realmsAll();
            $response = response()
                ->json(["count" => $realms->count(), "results" => $realms], 200);
        } elseif ($model === 'films') {
            $films = $this->filmsAll();
            $response = response()
                ->json(["count" => $films->count(), "results" => $films]);
        } elseif ($model === 'species') {
            $species = $this->speciesAll();
            $response = response()
                ->json(["count" => $species->count(), "results" => $species]);
        }
        return $response;
    }

    public function getOne(Request $request, $model, $id)
    {
        if ($model === 'characters') {
            $characters = $this->charactersOne($id);
            $response = response()
                ->json($characters, 200);
        } elseif ($model === 'realms') {
            $realms = $this->realmsOne($id);
            $response = response()->json($realms, 200);
        } elseif ($model === 'films') {
            $films = $this->filmsOne($id);
            $response = response()->json($films, 200);
        } elseif ($model === 'species') {
            $species = $this->speciesOne($id);
            $response = response()->json($species, 200);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Character $person
     * @return \Illuminate\Http\Response
     */
    public function show(Character $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Character $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Character $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $person)
    {
        //
    }
}
