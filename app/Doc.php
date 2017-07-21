<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $fillable = [
        'userId', 'title', 'docname',
    ];
	public function categories()
	{
		return $this->belongsToMany('App\Categorie');
	}
}
