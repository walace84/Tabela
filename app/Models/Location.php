<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	protected $fillable = [
    	'latitude',
		'loongitude',
	];

	// retorna apenas um pais
    public function Country()
    {
    	return $this->belongsTo(Country::class);
    }
}
