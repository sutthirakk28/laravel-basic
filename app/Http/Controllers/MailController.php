<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Response;
use Session;
use Mail;
use DB;

class MailController extends Controller
{
    
    public function basic_email(){
        $data = array('name'=>"Virat Gandhi");
     
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('sutthirak.k28@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('sutthirak.k28@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     public function html_email(){
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('tpm.tpm1980@gmail.com', 'Tutorials Point')->subject
              ('Laravel HTML Testing Mail');
           $message->from('tpm.tpm1980@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
     }

     public function attachment_email(Request $request){

        $user = User::find($request->id);

        $mail_send = $user->email;
        $name_send = $user->name;
        
        $data = array('name'=>$name_send,'email'=>$mail_send);

        Mail::send('mail.mail', $data, function($message) use ($mail_send, $name_send) {
           $message->to($mail_send, 'คุณ '.$name_send)->subject
              ('แจ้งเตือนการใช้งานอีเมล');
        //    $message->attach('C:\xampp\htdocs\laravel-basic\public\images\admin\admin.jpg');
           $message->from('info.tpm1980@tpm1980.com','ทีมดูแลระบบ');
        });
            
            $result = "E-mail ส่งข้อมูลผู้ดูแลเรียบร้อยแล้ว";        
            $response = array(
            'email' => $result
            );
        return response()->json($response);
     }
}
