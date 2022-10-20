<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Input, Redirect; 


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

   /*  protected function validator(array $data)
    {
        return Validator::make($data, [
          
            'password' => ['required', 'string', 'confirmed'],
             'search'=>['required', 'string'],
            
            
        ]);
    } */


    public function store(Request $request)
    {
        
         
        $validatedData = $request->validate([
          
          'search' => 'required|max:255',
          'password' => 'required',
          'password_confirmation' => 'required',
          'serie' => 'required',
        


        ]);
 
        $circ = new Historique;
 
        
        $circ->search = $request->wireName;
        $circ->password = $request->location;
        $circ->password_confirmation = $request->password_confirmation;
        $circ->serie = $request->serialNumber;
        
 
        $circ->save();
 
        return redirect('circuit')->with('status', 'Form Data Has Been Inserted');
 
    }


    /* protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'search' => 'required', 'string', 'max:255',
            'location' => 'required', 'string', 'max:255','confirmed',
            'scan_loca' =>'required|same:location',
            'serie' => 'required', 'string', 'max:255',
              
            
        ]);

    } */


   /*  public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required', 'string', 'max:255',
            'location' => 'required|confirmed',
            'scan_loca' =>'required|same:location',
            
            'serie' => 'required', 'string', 'max:255',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            
            return back()->withInput()->withErrors($validator);
            
        }
        else
        {
            return response()->json(["status"=>true,"message"=>"Form submitted successfully"]);
        }  
    } */


   /*  public function store2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => ['required', 'string', 
            Rule::exists('wires')->where(function ($query) use ($request) {
            return $query->where('scan-loca', $request->location)->orWhere('location', $request->location);}),
        ]]);
    } */

        /* public function store(Request $rerquest)
        {
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);
        } */

            

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
