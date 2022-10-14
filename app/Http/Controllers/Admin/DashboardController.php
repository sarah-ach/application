<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wire;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }

      public function index() {
        return view('admin.dashbord');
      }

      function show()
    {
        $data=wire::all();
        return  view('admin.dashbord',['wire'=>$data]);
    }
}
