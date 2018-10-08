<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;
use DB;
use App\Events\MessageSent;

class CommentController extends Controller
{
  public function index(Post $post)
  {
    return response()->json($post->comments()->with('user')->latest()->get());
  }

  public function store(Request $request)
  {
    
    $comment = Comment::create([
      'post_id' => $request->post_id,
      'body' => $request->body,
      'user_id' => Auth::id()
    ]);
    $comment = Comment::where('id', $comment->id)->with('user')->first();
    
    
    $post = Post::findOrFail($request->post_id);
      $comment = DB::table('posts')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('posts.id','posts.title','users.name','comments.body','comments.updated_at')
            ->where('posts.id','=',$request->post_id)
            ->get();
      $aCss=array('css/posts/style.css');
      $data = array(
        'style'   => $aCss,
        'post'    => $post,
        'comment' => $comment
      );
      
      return view('posts.show',$data);
    //return $comment->toJson();
  }

    /**
   * Fetch all messages
   *
   * @return Message
   */
  public function fetchMessages()
  {
    return Message::with('user')->get();
  }

  /**
   * Persist message to database
   *
   * @param  Request $request
   * @return Response
   */
  public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  broadcast(new MessageSent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}

}
