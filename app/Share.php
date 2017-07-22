<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
	protected $fillable = [
	'userId', 'docId', 'link',
	];

	public function doc()
	{
		return $this->belongsTo('App\Doc', 'docId');
	}
}
