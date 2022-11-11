<?php

namespace App\Http\Controllers\Operateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historique;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
      }
      

      public function index()
        {
            $id = false;
            if(auth()->user()->level != 1){
                $id = auth()->user()->username;
            }
            $historique = DB::table('historique')
                        ->select('historique.search','historique.password','historique.quantite','historique.dateOperation')
                        
                        ->join('users', 'users.username', '=', 'historique.username')
                        ->when($id, function($query, $id){
                            return $query->where('users.username', $id);
                        })
                        ->get();
                       
            return view('operateur.dashboard',compact('historique'));
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
    
           return view('/operateur/dashboard');
            
        }
    


    public function storeH(Request $request)
    {
        
         
        $validatedData = $request->validate([
          
          'username'=>'required',
          'search' => 'required|max:255',
          'password' => 'required',
          'password_confirmation' => 'required',
          'serie' => 'required',
        


        ]);
 
        $circ = new Historique;
 
        $circ->username = $request->username;
        $circ->search = $request->search;
        $circ->password = $request->password;
        $circ->password_confirmation = $request->password_confirmation;
        $circ->serie = $request->serie;
        
 
        $circ->save();
 
        return redirect('operateur.dashboard')->with('status', 'Form Data Has Been Inserted');
 
    }
}