<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wire;
use Illuminate\Support\Facades\DB;

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


     //function find location in data

     public function index(Request $request)
     
     {
        $wire=wire::latest()->pluck('wire_name','workstation');
        dd($wire->toArray());

     }

     /////testing function for getting workstation of a wire
       function index1()
       {
        return DB::select('select workstation from wires');
       }
}
