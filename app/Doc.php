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
	public function share()
    {
        return $this->hasOne('App\Share', 'docId');
    }
        public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
