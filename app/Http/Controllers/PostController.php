<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aCss=array('css/posts/style.css');

      $posts = Post::all();
     //$posts = DB::table('posts')->get();

      $result = json_decode($posts, true);

      $data = array(
          'posts' => $result,
          'style' => $aCss
      );
      return view('posts.index',$data)->with('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aCss=array('css/posts/style.css');
      $data = array(
        'style' => $aCss
      );
      return view('posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
      ]);
      $now = new Carbon();
      $user = Auth::user();

      $post = $user->posts()->create([
        'title' => $request->title,
        'content' => $request->content,
        'published' => $request->has('published'),
        'created_at'=> $now,
      ]);

      return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::findOrFail($id);
      $aCss=array('css/posts/style.css');
      $data = array(
        'style' => $aCss,
        'post' => $post
      );
      return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::findOrFail($id);
      $aCss=array('css/posts/style.css');
      $data = array(
        'style' => $aCss,
        'post' => $post
      );
      return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
      ]);
      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->content = $request->content;
      $post->published = ($request->has('published') ? true : false);
      $post->save();

      return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::destroy($id);
      return redirect()->route('posts.index');
    }
}
