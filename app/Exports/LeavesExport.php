<?php

namespace App\Exports;

use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeavesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('leaves')
        ->join('libs', 'libs.id', '=', 'leaves.id_per')
        ->selectRaw("leaves.id_per, libs.surname, libs.nickname, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(type_leave, '0', 'ลาบวชฯ') , '1', 'ลาคลอด') , '2', 'ลาป่วย'), '3', 'ลากิจ'), '4', 'พักร้อน') AS type_leave, leaves.nstart_day, leaves.nend_day")
        ->whereRaw('extract(month from nstart_day) = ?', [Carbon::today()->month])
        ->orwhereRaw('extract(month from nend_day) = ?', [Carbon::today()->month])
        ->orderBy(DB::raw("leaves.id_per,leaves.type_leave,nstart_day"))
        ->get();
    }
}
