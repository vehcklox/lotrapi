<?php

namespace App\Http\Traits;

use App\City;

trait CitiesTrait
{
    public function citiesAll()
    {
        $cities = \App\City::paginate(10);
        foreach ($cities as $city) {
            $inhabitants_array = array();
            $inhabitants = json_decode($city->inhabitants);
            foreach ($inhabitants as $inhabitant) {
                array_push($inhabitants_array, $inhabitant);
            }
            $city->inhabitants = $inhabitants_array;
        }
        return $cities;
    }

    public function citiesOne($id)
    {
        $cities = \App\City::where('id', $id)->get();
        foreach ($cities as $city) {
            $inhabitants_array = array();
            $inhabitants = json_decode($city->inhabitants);
            foreach ($inhabitants as $inhabitant) {
                array_push($inhabitants_array, $inhabitant);
            }
            $city->inhabitants = $inhabitants_array;
        }
        return $cities;
    }
}