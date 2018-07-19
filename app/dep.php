<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dep extends Model
{
        //protected $fillable = ['id_dep','name_dep'];
	protected $table = 'name_dep';

	public function pos()
    {
        return $this->hasOne('App\Pos');
    }
}
