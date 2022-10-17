<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriqueController extends Controller
{
    /* function showHistorique()
    {
        $data2=Historique::all();
        return  view('circuit',compact('Historique', $data2));

    }  */

    function index()
    {
        $data=Historique::all();
        return view('historique.index')->with('historique',$data);
    }

}
