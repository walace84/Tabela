<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Country extends Model
{

	protected $fillable = [
		'name' 
	];

	// Retorna apenas um item, da tabela de localização
    public function Location()
    {
    	return $this->hasOne(Location::class);
    }

    // Retorna todos os estados do pais
    public function States()
    {
    	// Um para muitos, varios estados pertencem a 1 pais
    	return $this->hasMany(State::class);
    }

    // recupero as cidade do estado
    public function Cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

    // retorna todos os comentários da cidade
    // o segundo parametro é o metodo da model Comment.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
