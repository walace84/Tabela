<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;
/*  um para um */
class OneToOneController extends Controller
{
    public function OneToOne()
    {
    	// pegou um pais pelo id
    	//$pais = Country::find(1);
    	/* guando chama o get() vira array ai chama o first para vim o 1 item */
    	$pais = Country::where('name', 'Chile')->get()->first();
    	echo $pais->name;
    	// pega o metodo lacation que está na model Country.
    	$localizacao = $pais->Location;
    	echo "<br>Latitude: {$localizacao->latitude}";
    	echo "<br>Longitude: {$localizacao->loongitude}";

    	echo "<hr>";
    }

    // retorna o pais pela sua latitude e longitude.
    public function OneToOneInvertido()
    {
    	$latitude = 666;
    	$longitude = 777;

    	$location = Location::where('latitude', $latitude)->where('loongitude', $longitude)->get()->first();

    	echo $location->id;
    	echo "<br>";

    	$Country = $location->Country;

    	echo $Country->name;
    }

    // Cadastra o pais e sua latitude
    public function OneToOneInsert()
    {
    	/* dados vindo do 'formulário' */
    	$dataForm = [

    		'name'       => 'Chile',
    		'latitude'   => '666',
    		'loongitude' => '777',
    	];
    	// pega os dados do formulario e cadastra.
    	$country = Country::create($dataForm);

    	/*$location = new Location;
    	$location->latitude = $dataForm['latitude'];
    	$location->loongitude = $dataForm['loongitude'];
    	$location->country_id = $country->id;

    	$saveLocation = $location->save();*/
    	// Pega a model de Location e cadastra.
    	$location = $country->Location()->create($dataForm);

    }

}
