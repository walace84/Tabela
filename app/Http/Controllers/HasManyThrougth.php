<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

//== pega o pais pelo id e lista suas cidades ==//
class HasManyThrougth extends Controller
{
    public function hasmanythrough()
    {
    	$country = Country::find(1);
    	echo "<b>{$country->name}:</b> <br>";
    	// pega o metodo cities que está na model Country
    	$cities = $country->cities;

    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}

    	echo "<br>Total de Cidades: {$cities->count()} ";

    }
}
