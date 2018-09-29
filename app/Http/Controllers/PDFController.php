<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User;


class PDFController extends Controller
{
    public function pdf()
    {
        $user =  User::all();
           
   
        //$pdf = PDF::loadView('pdf.pdf', array('user' => $user) );
        //$pdf = PDF::loadView('pdf.pdf', compact('user'));        
        //return $pdf->download('invoice.pdf');
        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at','type','phone')
            ->get();

        $result = json_decode($user, true);

        $data = array(
            'user' => $result,
        );
        $pdf = PDF::loadView('pdf.pdf_user',$data);
        //return $pdf->download('ข้อมูลผู้ดูแล.pdf');
        //dd($user);       
        return @$pdf->stream();
    }
    public function pdf_user()
    {
        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at','type','phone')
            ->get();

        $result = json_decode($user, true);

        $data = array(
            'user' => $result,
        );
         return view('pdf.pdf_user',$data);
    }

    // function pdf()
    // {
    //     $pdf = \App::make('dompdf.wrapper');
    //     //$pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'Maitree']);
    //     $pdf->loadHTML($this->convert_data_to_html());
    //     //dd($pdf);
    //     return $pdf->download('ข้อมูลผู้ดูแล.pdf');
    // }
    // function convert_data_to_html()
    // {
    //     $data = DB::table('users')
    //         ->select('id','name','email','type','phone','created_at', 'updated_at')
    //         ->get();
    //     $output = '
    //     <html>
    //     <head>
    //         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    //         <link href="https://fonts.googleapis.com/css?family=Maitree:100,600" rel="stylesheet" type="text/css">
    //         <style>
                
    //             body {
    //                 font-family:sarabunnew;
    //             }
    //             th{
    //                 text-align: center;
    //                 font-family:sarabunnew;
                    
    //             }
    //         </style>
    //     </head>
    //     <body>
    //         <h2>ข้อมูลผู้ดูแล</h2>
    //         <table>
    //         <tr>
    //             <th>Firstname</th>
    //             <th>Lastname</th>
    //             <th>Savings</th>
    //             <th>ดดดดดดดดดด</th>
    //         </tr>
            
    //         ';
    //     foreach($data as $users)
    //     {
    //         $output .= '
    //         <tr>
    //             <td>'.$users->id.'</td>
    //             <td>'.$users->name.'</td>
    //             <td>'.$users->email.'</td>
    //             <td>'.$users->phone.'</td>
    //         </tr>
    //         ';
    //     }

    //     $output .= '</table></body></html>';
    //     return $output;
        
    // }
}
