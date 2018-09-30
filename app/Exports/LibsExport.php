<?php

namespace App\Exports;

use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class LibsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('libs')
            ->join('pos', 'libs.position', '=', 'pos.id_pos')
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('libs.id_employ','libs.surname','libs.nickname','libs.age','libs.job_start','libs.n_education', 'pos.name_pos','deps.name_dep','libs.phone')
            ->get();
    }
}
