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
          'circuit' => 'required',
          'location' => 'required|max:255',
          'scan' => 'required',
          'serie' => 'required|max:255', 


        ]);
 
        $emp = new Employee;
 
        $emp->circuit = $request->circuit;
        $emp->location = $request->location;
        $emp->scan = $request->scan;
        $emp->serie = $request->serie;
 
        $emp->save();
 
        return redirect('form')->with('status', 'Form Data Has Been Inserted');
 
    }
}