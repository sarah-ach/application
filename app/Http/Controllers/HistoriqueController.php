<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\User;
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
        
        return view("circuit");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'search' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255','confirmed'],
        
            'scan_loca' => ['required', 'string', 'min:3', 'confirmed'],
            'serie' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],    
            
        ]);
        $customMessages = [
            'password.confirmed' => 'The :attribute does not match' // change it at here
        ];
        
        $this->validate($request, $rules, $customMessages);
    
    }




        public function store(Request $rerquest)
        {
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);
        }

            

       /*  public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]);
            
            // Return your customized error message
            if ($validator->fails()) {
                return redirect('post/create')
                            ->withErrors($validator)
                            ->withInput();
            }
        
            // Store the blog post...
        }
 */
    protected function create()
    {
        
        /* return Historique::create([
            //'username' => $data['username'],
            'wireName' => $data['wireName'],
            'location' =>$data['location'],
            'serialNumber' => $data['serialNumber'],
            //'quantite' => $data['quantite'],
            //'dateOperation' => $data['dateOperation'],
            
        ]); */

        $user=USer::all();
        //return view('circuit')->with('username',$user);
    }


    /*public function store(Request $request)
    {
         $input=$request->all();
        Historique::create($input);
        return redirect('circuit')->with('flash_message',"location added succefully!!");
    } */

}
