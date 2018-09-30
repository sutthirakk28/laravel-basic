<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return DB::table('deps')
        	->select('id_dep','name_dep','created_at', 'updated_at')
        	->get();
    }
}
