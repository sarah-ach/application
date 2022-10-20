<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Historique;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;


    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'admin':
            return '/admin/dashboard';
            break;
          case 'operateur':
            return '/operateur/dashboard';
            break; 
      
          default:
            return '/wires'; 
          break;
        }
      }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'post' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            //'status' => ['required', 'in:admin,operateur'],


            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            // 'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'post' => $data['post'],
            'role' => $data['role'],
            //'status' => $data['status'],
            
        ]);
    } 

    public function index()
    {
        return view('admin.ajouter');
    } 

    /* protected function create(array $data)
    {
        
        return User::create([
            'search' => $data['wireName'],
            'password' => $data['location'],
            'serie' => $data['serialNumber'],
            
            
        ]);
    } */


    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
          'username' => 'required',
          'location' => 'required|max:255',
          'location' => 'required',
          'serialNumber' => 'required|max:255', 


        ]);
 
        $circ = new Historique;
 
        $circ->username = $request->username;
        $circ->wireName = $request->wireName;
        $circ->location = $request->location;
        $circ->serialNumber = $request->serialNumber;
 
        $circ->save();
 
        return redirect('circuit')->with('status', 'Form Data Has Been Inserted');
 
    }
}
