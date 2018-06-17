<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 *
 */
class MovieController extends Controller
{
  public function index()
  {
    return 'Hello word Controller';
  }

  public function view()
  {
    return "Hello From MovieController view method";
  }
}
