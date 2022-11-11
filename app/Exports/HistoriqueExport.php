<?php

namespace App\Exports;

use App\Models\Historique;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\Controller\ExporterController;
use Illuminate\Support\Facades\DB;

class HistoriqueExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       // return Historique::select("username", "search", "password","serie","quantite","post","dateOperation")->get();
        return DB::table('historique')
                    ->join('wires','wires.wire_name', '=', 'historique.search')
                    ->select('historique.search','historique.username','historique.password','historique.serie','historique.quantite','wires.workstation','historique.dateOperation')
                    ->get();
    }
 

    public function headings(): array
    {
        return ["Username", "Wire_Name", "Location","Serial_Number","Quantité","post","date_Operation"];
    }
    
}





