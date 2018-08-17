<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lib extends Model
{
    protected $fillable = [
    'surname',
    'nickname',
    'age',
    'id_employ',
    'job_start',
    'position',
    'user_photo',
    'education',
    'n_education',
    'phone'];
    //protected $guarded = ['id'];
   public function libs()
    {
        return $this->belongsToMany('App\Libss');
    }
}
