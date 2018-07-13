<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

  	public function __construct()
    {
    	//All below Auth normal
        $this->middleware('auth');

        //Only Function
        //$this->middleware('auth',['only' => ['index','form'] ]);

        //Except Function
        //$this->middleware('auth',['except' => ['index'] ]);
    }

    public function index()
  	{
    	return view('news/index');
  	}

    public function form()
    {
    	//$this->middleware('auth');
    	return view('news/form');
    }
}
