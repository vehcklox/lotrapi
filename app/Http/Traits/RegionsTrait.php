<?php

namespace App\Http\Traits;

use App\Region;

trait RegionsTrait
{
    public function regionsAll()
    {
        $regions = \App\Region::get();
        foreach ($regions as $region) {
            $inhabitants_array = array();
            $inhabitants = json_decode($region->inhabitants);
            foreach ($inhabitants as $inhabitant) {
                array_push($inhabitants_array, $inhabitant);
            }
            $region->inhabitants = $inhabitants_array;
        }
        return $regions;
    }

    public function regionsOne($id)
    {
        $regions = \App\Region::where('id', $id)->get();
        foreach ($regions as $region) {
            $inhabitants_array = array();
            $inhabitants = json_decode($region->inhabitants);
            foreach ($inhabitants as $inhabitant) {
                array_push($inhabitants_array, $inhabitant);
            }
            $region->inhabitants = $inhabitants_array;
        }
        return $regions;
    }
}