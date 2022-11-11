<?php

namespace App\Exports;

use App\Models\wire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WiresExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return wire::select("wire_name", "CSA", "color1","color2","length","terminal_A","seal_A","joint_to_A","cavity_A","terminal_B","seal_B","joint_to_B","cavity_B","bundle_size","kanban_location","workstation","location","module")->get();
    }


    public function headings(): array
    {
        return ["Wire_name", "CSA", "Color1","Color2","Length","Terminal_A","Seal_A","Joint_to_A","Cavity_A","Terminal_B","Seal_B","Joint_to_B","Cavity_B","Bundle_size","Kanban_location","Workstation","Location","Module"];
    }
    
}
