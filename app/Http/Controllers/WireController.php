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
}
