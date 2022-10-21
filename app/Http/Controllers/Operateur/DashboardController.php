<?php

namespace App\Http\Controllers\Operateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historique;

class DashboardController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
      }
      

      public function index()
        {
                return view('operateur.dashboard', [
                'Historique' => Historique::all()
            ]);
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
                    $output .=$wire->location; 
                }
                
                return response()->json($output);
            }
        }  

       return view('circuit');
        
    }


    public function storeH(Request $request)
    {
        
         
        $validatedData = $request->validate([
          
          'search' => 'required|max:255',
          'password' => 'required',
          'password_confirmation' => 'required',
          'serie' => 'required',
        


        ]);
 
        $circ = new Historique;
 
        
        $circ->search = $request->search;
        $circ->password = $request->password;
        $circ->password_confirmation = $request->password_confirmation;
        $circ->serie = $request->serie;
        
 
        $circ->save();
 
        return redirect('operateur.dashboard')->with('status', 'Form Data Has Been Inserted');
 
    }
}