<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Lib;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function show ($id)
    {
        return new ProductResource(Lib::find($id));
    }
}
