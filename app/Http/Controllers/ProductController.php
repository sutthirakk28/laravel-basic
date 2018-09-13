<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function show ()
    {
        // $lib = DB::table('libs')
        //     ->get();
        $leave = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->selectRaw("leaves.id_per, libs.surname, libs.nickname, leaves.type_leave, leaves.nstart_day, leaves.nend_day")
            ->whereRaw('extract(month from nstart_day) = ?', [Carbon::today()->month])
            ->orwhereRaw('extract(month from nend_day) = ?', [Carbon::today()->month])
            ->orderBy(DB::raw("leaves.id_per"))
            ->get();
        return new ProductCollection($leave);
    }
    
}
