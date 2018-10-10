<?php
namespace App\Http\Controllers;

use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ChatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('active', 1)->orderBy('id', 'ASC')->get();
        $result = json_decode($users, true);
        $data = array(
            'user' => $result
        );
        Log::alert('chat ข้อมูล addon.chat โดย '.Auth::user()->name);
        return view('line.chat',$data);
    }
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')
        ->whereDate('created_at', Carbon::today())
        ->get();
    }
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); 
        
        $accToken  = "DveiwigtPYZhh0e88Z6qfd1AIGOpiqOqcs9ZnfAa4AT";
        $notifyURL = "https://notify-api.line.me/api/notify";
        
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer '.$accToken
        );

        $data = array(
            'message' => $request->input('message'),
            'stickerPackageId' => 2,
            'stickerId' => 22,            
        ); 

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $notifyURL);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec( $ch );
        curl_close( $ch );  
        
        $result = json_decode($result,TRUE);       

        if(!is_null($result) && array_key_exists('status',$result)){
            if($result['status']==200){
                Log::alert('create ข้อมูล line โดย '.Auth::user()->name);                   
            }
        }

        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}