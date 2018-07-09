<?php
namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use DB;
/**
 *
 */
class SongController extends Controller
{
  public function index()
  {
    //return "Hello From Song Controller";
    return view('song/index');
    //return view('song.index');
  }

  public function play()
  {
  	// return view('song/player')
  	// ->with('band','Toyota')
  	// ->with('album','Altis');

  	// return view('song/player')->with([
  	// 	'band' => 'Isuzu',
  	// 	'album' => 'Mu-x'
  	// ]);

  	// return view('song/player')->withBand('Masda')->withalbum('Masda3');

  	$this->data=array(
  		'band' => 'Misubishi',
  		'album' => 'tritan'
  	);
  	return view('song/player',$this->data);
  }

  public function band()
  {
    $aCss=array('css/song/style.css');
    $aScript=array('js/song/main.js');

    //$band=DB::table('blog_tbl')->find('3');
    //var_dump($band);
    //die();
    //$band=DB::select('select title,blog_th from blog_tbl where deleted = ?',[0]);
   //$band =DB::insert('insert into blog_tbl (title,blog_th) values (?,?)',['green day','bset fo year']);
    //$band_u=DB::update('update blog_tbl set blog_th="best best best" where title=?',['green day']);
    $band_del=DB::delete('delete from blog_tbl where title=?',['green day']);
    $band=DB::table('blog_tbl')->get();
    dd($band);

  	$this->data =array(
  		'band' => 'Isuzu',
  		'album'=> '<u>D-max V-cross</u>',
      'style'=> $aCss,
      'script'=>$aScript,
  	);
  	return view('song/band',$this->data);
  }
}
