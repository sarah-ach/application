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
}