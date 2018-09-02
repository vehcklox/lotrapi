<?php

namespace App\Http\Controllers;

use App\Character;
use App\Http\Traits\BooksTrait;
use App\Http\Traits\CharactersTrait;
use App\Http\Traits\CitiesTrait;
use App\Http\Traits\FilmsTrait;
use App\Http\Traits\GroupsTrait;
use App\Http\Traits\LanguagesTrait;
use App\Http\Traits\RacesTrait;
use App\Http\Traits\RealmsTrait;
use App\Http\Traits\RegionsTrait;
use App\Http\Traits\SpeciesTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use BooksTrait;
    use CharactersTrait;
    use CitiesTrait;
    use FilmsTrait;
    use GroupsTrait;
    use LanguagesTrait;
    use RacesTrait;
    use RealmsTrait;
    use RegionsTrait;
    use SpeciesTrait;

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request, $model)
    {
        if ($model === 'books') {
            $books = $this->booksAll();
            $response = response()
                ->json(["count" => count($books), "results" => $books], 200);
        } elseif ($model === 'characters') {
            $characters = $this->charactersAll();
            $response = response()
                ->json(["count" => count($characters), "results" => $characters], 200);
        } elseif ($model === 'cities') {
            $cities = $this->citiesAll();
            $response = response()
                ->json(["count" => $cities->count(), "results" => $cities]);
        } elseif ($model === 'films') {
            $films = $this->filmsAll();
            $response = response()
                ->json(["count" => $films->count(), "results" => $films]);
        } elseif ($model === 'groups') {
            $groups = $this->groupsAll();
            $response = response()
                ->json(["count" => $groups->count(), "results" => $groups]);
        } elseif ($model === 'languages') {
            $languages = $this->languagesAll();
            $response = response()
                ->json(["count" => $languages->count(), "results" => $languages]);
        } elseif ($model === 'races') {
            $races = $this->racesAll();
            $response = response()
                ->json(["count" => $races->count(), "results" => $races]);
        } elseif ($model === 'realms') {
            $realms = $this->realmsAll();
            $response = response()
                ->json(["count" => $realms->count(), "results" => $realms], 200);
        } elseif ($model === 'regions') {
            $regions = $this->regionsAll();
            $response = response()
                ->json(["count" => $regions->count(), "results" => $regions], 200);
        } elseif ($model === 'species') {
            $species = $this->speciesAll();
            $response = response()
                ->json(["count" => $species->count(), "results" => $species]);
        }
        return $response;
    }

    public function getOne(Request $request, $model, $id)
    {
        if ($model === 'books') {
            $books = $this->booksOne($id);
            $response = response()->json($books, 200);
        } elseif ($model === 'characters') {
            $characters = $this->charactersOne($id);
            $response = response()
                ->json($characters, 200);
        } elseif ($model === 'cities') {
            $cities = $this->citiesOne($id);
            $response = response()->json($cities, 200);
        } elseif ($model === 'films') {
            $films = $this->filmsOne($id);
            $response = response()->json($films, 200);
        } elseif ($model === 'groups') {
            $groups = $this->groupsOne($id);
            $response = response()->json($groups, 200);
        } elseif ($model === 'languages') {
            $languages = $this->languagesOne($id);
            $response = response()->json($languages, 200);
        } elseif ($model === 'races') {
            $races = $this->racesOne($id);
            $response = response()->json($races, 200);
        } elseif ($model === 'realms') {
            $realms = $this->realmsOne($id);
            $response = response()->json($realms, 200);
        } elseif ($model === 'regions') {
            $regions = $this->regionsOne($id);
            $response = response()->json($regions, 200);
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
