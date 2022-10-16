<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wire;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WiresExport;
use App\Imports\WiresImport;


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
        /*$test=DB::table('wires')->where('location',$name)->value($input);
        return $test;*/

        /* $barcode=$request->Input('barcode'); */

       // $wire=DB::table('wires')->where('wire_name',Input('barcode'))->value('location');

      /* $name=DB::select("SELECT location from wires where 'wire_name'= ?",['M01CCA67AL.01']);
       return view('circuit',['wires'=> $name]);*/



       ///finding location with wire name
     // $getwire_id=DB::select('SELECT location FROM wires where wire_name=?',['M01CCA67AL.01']);
      
       //$getwire_id=DB::table('wires')->where('location',$wire_name)->first();
       //return $getwire_id;


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


     /* public function index(Request $request)
     
     {
        $input=$request->all();

     } */


     //function find location in data

/*      public function index(Request $request)
     
     {
        $wire=wire::latest()->pluck('wire_name','location');
        dd($wire->toArray());

     } */

     /////testing function for getting workstation of a wire
    //    function index1()
    //    {
    //     return DB::select('select workstation from wires');
    //    }


    public function search(Request $request)
    {
        return view('circuit');

        if($request->ajax())
        {

            $output='';
            $wires=wire::where('wire_name','LIKE','%'.$request->search.'%' )->get();

            if($wires)
            {
                foreach($wires as $wire)
                {
                    $output.='
                  <div class="form-group mt-4">
            <div class="input-group-append">
              <form class="pos-style" name="pos" action="" method="GET">
              <input type="text"  id="search" name="search" class="form-control" placeholder="Circuit"><br>
              
              <label for="search">'.$wire->location.'</label>
              </form> 
              
            </div>
          </div>
                  
                  
                  '; 
                }
                
                return response()->json($output);
            }
        } 

       
        
    }
}
