<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToMany extends Controller
{
	// mostra as empresas de determinada cidades
    public function manytomany()
    {
    	// where para pegar uma cidade especifica
    	$city = City::where('name', 'Tijuca')->get()->first();
    	echo "<b>{$city->name}</b>";

    	$campanies = $city->campanies;

    	foreach ($campanies as $company) {
    		echo "<br> $company->name";
    	}

    }

    // mostra em qual cidade a empresa está localizada.
    public function manytomanyInverse()
    {
    	$company = Company::where('name', 'WS')->get()->first();
    	echo "<b>{$company->name}</b>: <br>";

    	$cities = $company->cities;

    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}

    }

    // inseri na tabela pivo company_city, mais 2 cidade onde está localizado a empresa em questão.
    public function ManyToManyInsert()
    {
    	$dataForm = [2,3];

    	$company = Company::find(1);
    	echo "<b>{$company->name}: </b><br>";
        // sync e grava e sincroniza, não grava dados repetidos e atualiza o mesmo.
    	$company->cities()->sync($dataForm);

    	$cities = $company->cities;
    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}

        

    }


}
