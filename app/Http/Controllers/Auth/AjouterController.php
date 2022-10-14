<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjouterController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'post' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:admin,operateur'],
            //'role' => ['required', 'string', 'max:255'],
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
            //'status' => $data['status'],
            'role' => $data['role'],
        ]);
    }

    public function index()
    {
        return view('admin.ajouter');
    }

}

   

