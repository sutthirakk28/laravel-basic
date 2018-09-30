<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class PossExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return DB::table('pos')
        	->select('id_pos','name_pos','created_at', 'updated_at')
        	->get();
    }
}
