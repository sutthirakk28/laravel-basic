<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
   protected $fillable = [
   'id_per',
   'type_leave',
   'date_leave',
   'reason_leave',
   'dstart_leave',
   'dend_leave',
   'proof_leave',
   'approved',
   ];
}
