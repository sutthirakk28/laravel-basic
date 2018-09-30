<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\Carbon;


class PDFController extends Controller
{
    public function pdf_user()
    {
        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at','type','phone')
            ->get();

        $result = json_decode($user, true);
        $data = array(
            'user' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_user',$data);
        return $pdf->download('ข้อมูลผู้ดูแล.pdf');
    }

    public function pdf_dep()
    {
        $dep = DB::table('deps')
            ->select('deps.*')
            ->get();

        $result = json_decode($dep, true);
        $data = array(
            'dep' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_dep',$data);
        return $pdf->download('ข้อมูลฝ่าย.pdf');
    }

    public function pdf_pos()
    {
        $pos = DB::table('pos')
            ->select('id_pos','name_pos','created_at', 'updated_at')
            ->get();

        $result = json_decode($pos, true);
        $data = array(
            'pos' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_pos',$data);
        return $pdf->download('ข้อมูลตำแหน่ง.pdf');
    }

    public function pdf_lib()
    {
        $lib = DB::table('libs')
            ->join('pos', 'libs.position', '=', 'pos.id_pos')
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('libs.id_employ','libs.surname','libs.nickname','libs.age','libs.job_start','libs.n_education', 'pos.name_pos','deps.name_dep','libs.phone','libs.user_photo')
            ->orderBy('libs.id_employ', 'ASC')
            ->get();

        $result = json_decode($lib, true);
        $data = array(
            'lib' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_lib',$data);
        return $pdf->download('ข้อมูลพนักงาน.pdf');
    }

    public function pdf_leave()
    {
        $leave = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->selectRaw("leaves.id_per,leaves.date_leave, libs.surname, libs.nickname, REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(type_leave, '0', 'ลาบวชฯ') , '1', 'ลาคลอด') , '2', 'ลาป่วย'), '3', 'ลากิจ'), '4', 'พักร้อน') AS type_leave, leaves.nstart_day, leaves.nend_day")
            ->whereRaw('extract(month from nstart_day) = ?', [Carbon::today()->month])
            ->orwhereRaw('extract(month from nend_day) = ?', [Carbon::today()->month])
            ->orderBy(DB::raw("leaves.id_per,leaves.type_leave,nstart_day"))
            ->get();

        $result = json_decode($leave, true);
        $data = array(
            'leave' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_leave',$data);
        return $pdf->download('ข้อมูลการลาเดือนนี้.pdf');
    }
    
    
}
