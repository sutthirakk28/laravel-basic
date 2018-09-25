<?php

namespace App\Exports;

use App\Dep;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dep::select('id_dep','name_dep','created_at', 'updated_at')->get();
    }
}
