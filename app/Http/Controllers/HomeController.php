<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        $date=date('Y-m-d');
         $newDate=Carbon::createFromFormat('Y-m-d',$date)->format('Y-m-d');
         dd($todayDate); 
    }


}
