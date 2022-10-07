<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wire;

class WireController extends Controller
{
    //

    function show()
    {
        $data=wire::all();
        return  view('home',['wire'=>$data]);
    }

     public function scan()
     {
         $barcode=request('barcode');
         return view('wire',compact('barcode'));
     }
}
