<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Doc extends Model
{
	use AlgoliaEloquentTrait;
	protected $fillable = [
	'userId', 'title', 'docname'
	];

	public $algoliaSettings = [
	'searchableAttributes' => [
	'title',
	],
	'customRanking' => [
	'desc(popularity)',
	'asc(name)',
	],
	];

	public function categories()
	{
		return $this->belongsToMany('App\Categorie');
	}
}
