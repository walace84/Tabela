<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class Polymorphic extends Controller
{
	// lista comentário de pais estado e cidades
    public function polymorphics()
    {
    	$city = City::where('name', 'Tijuca')->get()->first();
    	echo $city->name;

    	$comments = $city->comments()->get();

    	foreach ($comments as $comment) {
    		echo "<br>{$comment->description}";
    	}
    }
    //inseri comentário em pais estados e cidades
    public function polymorphicsInsert()
    {
    	/*$city = City::where('name', 'Tijuca')->get()->first();
    	echo $city->name;

    	$comment = $city->comments()->create([
    		'description' => "Segundo comentário {$city->name}".date('Ymd'),
    	]);

    	var_dump($comment);*/


    	$state = State::where('name', 'Rio de Janeiro')->get()->first();
    	echo $state->name;

    	$comment = $state->comments()->create([
    		'description' => "Cidade maravilhosa",
    	]);

    	var_dump($comment);
    }
}
