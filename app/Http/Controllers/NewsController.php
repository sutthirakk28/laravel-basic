<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{ 
	
  	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
  	{
    	return view('news/index');
  	}

    public function form()
    {
    	return view('news/form');
    }
}
