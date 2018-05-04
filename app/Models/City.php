<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     protected $fillable = [
		'name',
	];

	// pertence a muitos, todas as empresas de uma cidade
	public function campanies()
	{
		// foi preciso por o segundo parametro campany_city devido ter criado a tabela de maneira errada
		// era para criar city_company
		return $this->belongsToMany(Company::class, 'company_city');
	}

	// retorna todos os comentários da cidade
	// o segundo parametro é o metodo da model Comment.
	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable');
	}
}
