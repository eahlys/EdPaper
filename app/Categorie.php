<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
	protected $fillable = [
	'userId', 'title'
	];

	public function docs()
	{
		return $this->belongsToMany('App\Doc');
	}
}
