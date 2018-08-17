<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dep extends Model
{
	protected $fillable = ['name_dep'];

	public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
