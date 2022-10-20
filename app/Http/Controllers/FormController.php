<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Employee;
 
 
class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }
 
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
          'search' => 'required',
          'password' => 'required|max:255',
          'password_confirmation' => 'required',
          'serie' => 'required|max:255', 


        ]);
 
        $emp = new Employee;
 
        $emp->search = $request->search;
        $emp->password = $request->password;
        $emp->password_confirmation = $request->password_confirmation;
        $emp->serie = $request->serie;
 
        $emp->save();
 
        return redirect('form')->with('status', 'Form Data Has Been Inserted');
 
    }

    
}