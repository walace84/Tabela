<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class OneToManyController extends Controller
{
	// Relacionamento 1 para muitos.
	// Pegas os estados de um pais.
    public function OnToMany()
    {
    	// Listo o pais com sua Model, posso ou não especificar o nome
    	//$country = Country::where('name', 'Chile')->get()->first();

    	/*
    	* O GET pega todos os dados, como se fosse o all()
    	* no Key posso passar o id e recuperar os dados.
    	*
    	*/
        /* fazendo isso ->with('States') os estado já vem na mesma consulta do pais */
    	$key = "i";
    	$countries = Country::where('name', 'LIKE', "%{$key}%")->with('States')->get();
       
    	foreach ($countries as $country) {
    		echo "<hr>{$country->name}";

	    	// Listo os estado, como são varios percorre atravez do array
	    	$States = $country->States;

	    	foreach ($States as $state) {
	    		echo "<br>{$state->initials} - {$state->name}";
	    	}
    	}

    }

    // Muitos para 1, muitos estados 1 pais
    // ver qual estado pertence a determinado pais
    public function ManyToOne()
    {
        // recebe o estado direto, mais poderiamos fazer como o metodo acima.
    	$StateName = 'Rio de Janeiro';
    	$state = State::where('name', $StateName)->get()->first();
    	echo "<br>{$state->name}";

        $country = $state->Country;
       
        echo "<br>Pais: {$country->name}";

    }

    /* Lista o pais estado e cidades */
    public function ManyToOneTwo()
    {
        $key = "i";
        $countries = Country::where('name', 'LIKE', "%{$key}%")->get();
       
        foreach ($countries as $country) {
            echo "<hr>{$country->name}";

            // Listo os estado, como são varios percorre atravez do array
            $States = $country->States;

            foreach ($States as $state) {
                echo "<br>{$state->initials} - {$state->name}: ";
                // pega o metodo Cities que está na model State.associa ela a varia $state
                // que contem os estados.
               $states = $state->Cities;
                foreach ($states as $city) {
                    echo "{$city->name}, ";
                }
            }
        }
    }



    // cadastra estado no pais
    public function OneToManyInsert()
    {
        $dataForm = [
            'name'     => 'Bahia',
            'initials' => 'BA',
         ];

        $country = Country::find(2);

        $country->States()->create($dataForm);

    }



}
