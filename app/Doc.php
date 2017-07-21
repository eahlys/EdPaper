<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
	public function categories()
	{
		return $this->belongsToMany('App\Categorie');
	}
}
