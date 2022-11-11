<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;
use App\Models\wire;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HistoriqueExport;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class ExporterController extends Controller
{
      public function index(Request $request)
        {
          
                 /* return view('admin.exporter', [
               'Historique' => Historique::all()
            ]); */
            
              $todayDate=Carbon::now()->format('Y-m-d');
              $historique2=Historique::when($request->Date!=null,function($q) use($request){
                                     return $q->whereDate('dateOperation',$request->Date);
                                 }, function ($q) use($todayDate){
                                   return $q->whereDate('dateOperation',$request->Date);
                                })

                                ->when($request->type!=null,function($q) use($request){
                                    return $q->where('username',$request->type);
                                }
        );
            
             
            return view('admin.exporter', compact('todayDate','histo'));
         } 


    /* public function filter(Request $request)
    {
        $filter = $request->query('filter');
        $historique=DB::table('historique')->get()
                                           ->when('historique.search', 'like', '%'.$filter.'%');
        dd('historique');
        //return view('/admin/exporter',compact('historique','filter'));
        
    } */


    


    /* public function indexFiltering(Request $request)
        {
            $filter = $request->query('filter');

            if (!empty($filter)) {
                $historique2 = Historique::sortable()
                    ->where('historique.search', 'like', '%'.$filter.'%');
                    
            } 

            return view('admin.exporter')->with('historique2', $historique2)->with('filter', $filter);
        } */

    public function export() 
    {
        return Excel::download(new HistoriqueExport, 'historique.xlsx');
    }

    public function ShowData()
    {
        $historique=DB::table('historique')->get();
        $historiquejoin=DB::table('historique')
                    ->join('wires','wires.wire_name', '=', 'historique.search')
                    ->select('historique.search','historique.username','historique.password','historique.serie','historique.quantite','wires.workstation','historique.dateOperation')
                    ->distinct()
                    ->get();
                   
        return view('/admin/exporter',compact('historique','historiquejoin'));

    }

   

   
}
