<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pos extends Model
{
    protected $fillable = ['id_pos','name_pos','id_dep'];

    public function lib()
    {
        return $this->hasOne('App\Lib');
    }

    public function dep()
    {
        return $this->belongsTo('App\Dep');
    }
}
