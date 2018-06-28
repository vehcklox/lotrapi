<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $characters = \App\Character::with(['languages:name', 'books:title', 'films:title'])->get();
        $response = response()->json($characters, 200);
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
