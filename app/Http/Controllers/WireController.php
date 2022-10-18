<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wire;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WiresExport;
use App\Imports\WiresImport;
use App\Models\Historique;


class WireController extends Controller
{
    //

    function show()
    {
        $data=wire::all();
        return  view('admin.home',['wire'=>$data]);
    }


    

    

    public function index()
    {

       return view('circuit');
     
    } 



   /* public function visualiseFile(Request $req,$wireName){

        $name=DB::select("SELECT location from wires where 'wire_name'= ?",['M01CCA67AL.01']);
         if(!isset($name)){
             abort(404);
         }
         if(Storage::exists($name->path)){
     
             return response()->file('wires/'.$name->path);
         }else{
             
             abort(404);
         }
 }*/
 

     public function store()
     {
        // $name=$request->input('barcode');
        // return $name;
        $wirename=wire::where('wire_name',$wire_name)->pluck('location')->first ();
        return $wirename;

        /*$wire=wire::select("SELECT location from wires where 'wire_name'= ?",['M01CCA67AL.01']);
        return $wire;*/
     }

     public function scan()
     {
         $barcode=request('barcode');
         return view('wire',compact('barcode'));
     }

     public function find(Request $request)
     {
        
     }




    public function search(Request $request)
    {
        

         if($request->ajax())
        {

            $output='';
            $wires=wire::where('wire_name','LIKE','%'.$request->search.'%' )->get()->unique('location'); //distinct

            if($wires)
            {
                foreach($wires as $wire)
                {
                    $output .=
                    ' <div class="card-body">
                     
                      <h5 class="card-title">'.$wire->location.'</h5>
                     
                
                    </div>
                  
                  '; 
                }
                
                return response()->json($output);
            }
        }  

       return view('circuit');
        
    }
}
