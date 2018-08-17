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
   'proof_leave',
   'approved',
   'nstart_day',
   'nend_day',
   ];

  protected $primaryKey = 'id_per'; // or null
  public $incrementing = false;

    public function leaves()
    {
      return $this->belongsTo('App\Leaves');
    }
}
// class Leave extends Eloquent {

//     protected $fillable = array('id_per', 'type_leave', 'nstart_day', 'nend_day');

// }