<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lib extends Model
{
    protected $fillable = ['surname','nickname','age','id_employ','job_start','position'];
    //protected $guarded = ['id'];

}
