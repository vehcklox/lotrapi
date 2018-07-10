<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request) {
        $characters = \App\Character::with(['languages:name', 'books:title', 'films:title'])->get();
        $response = response()->json($characters, 200);
        return $response;
    }
}
