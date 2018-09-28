<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;


class PDFController extends Controller
{
    public function pdf()
    {
        $user =  DB::table('users')
            ->select('id','name','email','type','phone','created_at', 'updated_at')
            ->get();

        $result = json_decode($user, true);
        $data = array(
            'user' => $result,
        );    
        //$pdf = PDF::loadView('pdf.pdf', array('user' => $user) );
        $pdf = PDF::loadView('pdf.pdf', $data);
        return $pdf->download('invoice.pdf');
        //dd($user);       
        //return @$pdf->stream();
    }
}
