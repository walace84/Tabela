<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities()
	{
		// foi preciso por o segundo parametro campany_city devido ter criado a tabela de maneira errada
		// era para criar city_company
		return $this->belongsToMany(City::class, 'company_city');
	}
}
