<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        Log::info('exportExcel ข้อมูล UsersExport โดย '.Auth::user()->name);
        return Excel::download(new UsersExport, 'ข้อมูลผู้ดูแล.xlsx');
    } 

    public function exportExcelDep(){
        Log::info('exportExcel ข้อมูล DepsExport โดย '.Auth::user()->name);
        return Excel::download(new DepsExport, 'ข้อมูลฝ่าย.xlsx');
    } 

    public function exportExcelPos(){
        Log::info('exportExcel ข้อมูล PossExport โดย '.Auth::user()->name);
        return Excel::download(new PossExport, 'ข้อมูลตำแหน่ง.xlsx');
    }

    public function exportExcelLib(){
        Log::info('exportExcel ข้อมูล LibsExport โดย '.Auth::user()->name);
        return Excel::download(new LibsExport, 'ข้อมูลพนักงาน.xlsx');
    }

    public function exportExcelTomonth(){
        Log::info('exportExcel ข้อมูล LeavesExport โดย '.Auth::user()->name);
        return Excel::download(new LeavesExport, 'ข้อมูลลางานเดือนนี้.xlsx');
    }

}
