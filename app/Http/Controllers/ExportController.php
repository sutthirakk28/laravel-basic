<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Exports\UsersExport;
use App\Exports\DepsExport;
use App\Exports\PossExport;
use App\Exports\LibsExport;
use App\Exports\LeavesExport;

class ExportController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function exportExcelAdmin(){
        return Excel::download(new UsersExport, 'ข้อมูลผู้ดูแล.xlsx');
    } 

    public function exportExcelDep(){
        return Excel::download(new DepsExport, 'ข้อมูลฝ่าย.xlsx');
    } 

    public function exportExcelPos(){
        return Excel::download(new PossExport, 'ข้อมูลตำแหน่ง.xlsx');
    }

    public function exportExcelLib(){
        return Excel::download(new LibsExport, 'ข้อมูลพนักงาน.xlsx');
    }

    public function exportExcelTomonth(){
        return Excel::download(new LeavesExport, 'ข้อมูลลางานเดือนนี้.xlsx');
    }

}
