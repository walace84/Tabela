<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    protected $fillable = [
		'name',
		'initials', 
	];

	//Retorna apenas um pais
	public function Country()
	{
		// pertence a 1
		return $this->belongsTo(Country::class);
	}

	// Retorna varias cidade
	public function Cities()
	{
		// Um para muitos, varios cidades pertencem a 1 estado
		return $this->hasMany(City::class);
	}

	// retorna todos os comentários da cidade
    // o segundo parametro é o metodo da model Comment.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
