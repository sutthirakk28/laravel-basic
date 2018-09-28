<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User;


class PDFController extends Controller
{
    // public function pdf()
    // {
    //     $user =  User::all();
           
   
    //     //$pdf = PDF::loadView('pdf.pdf', array('user' => $user) );
    //     $pdf = PDF::loadView('pdf.pdf', ['users' => $user]);
    //     //return $pdf->download('invoice.pdf');
    //     //dd($user);       
    //     return @$pdf->stream();
    // }
    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_data_to_html());
        //dd($pdf);
        return $pdf->download('ข้อมูลผู้ดูแล.pdf');
    }
    function convert_data_to_html()
    {
        $data = DB::table('users')
            ->select('id','name','email','type','phone','created_at', 'updated_at')
            ->get();
        $output = '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
                @font-face {
                    font-family: THSarabunNew;
                    font-style: normal;
                    font-weight: normal;
                    src: url("{{ asset("fonts/THSarabunNewBold.ttf") }}") format("truetype");                    
                }
        
                body {
                    font-family: "THSarabunNew";
                }
            </style>
        </head>
        <body>
            <h2>ข้อมูลผู้ดูแล</h2>
            <table>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Savings</th>
                <th>ดดดดดดดดดด</th>
            </tr>
            
            ';
        foreach($data as $users)
        {
            $output .= '
            <tr>
                <td>'.$users->id.'</td>
                <td>'.$users->name.'</td>
                <td>'.$users->email.'</td>
                <td>'.$users->phone.'</td>
            </tr>
            ';
        }

        $output .= '</table></body></html>';
        return $output;
        
    }
}
