<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pos extends Model
{
    protected $fillable = ['id_pos','name_pos','id_dep'];
    
    public function position()
    {
        return $this->belongsTo('App\Position');
    }
}
