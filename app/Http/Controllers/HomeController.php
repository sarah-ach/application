<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WiresExport;
use App\Imports\WiresImport;
use App\Models\wire;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        $date=date('Y-m-d');
         $newDate=Carbon::createFromFormat('Y-m-d',$date)->format('Y-m-d');
         dd($todayDate); 

         $wires = wire::get();
  
         return view('home', compact('wires'));
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new WiresExport, 'wires.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new WiresImport,request()->file('file'));
        return back();
    }

    public function delete()
    {
        wire::truncate();
        return back();
    }




}
