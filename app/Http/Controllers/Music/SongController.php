<?php
namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;

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
}
