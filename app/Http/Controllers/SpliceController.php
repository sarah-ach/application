<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SplicesExport;
use App\Imports\SplicesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\splice;


class SpliceController extends Controller
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $splices = splice::get();
  
        return view('admin.splices', compact('splices'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new SplicesExport, 'splices.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new SplicesImport,request()->file('file'));
        return back();
    }

    public function delete()
    {
        splice::truncate();
        return back();
    }
}


