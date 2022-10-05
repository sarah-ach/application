<?php

namespace App\Imports;

use App\Models\splice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SplicesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new splice([
            'wire_name'=> $row['wire_name'],
            'CSA' => $row['csa'], 
            'color1'=> $row['color1'],
            'color2'=> $row['color2'], 
            'length'=> $row['length'],
            'terminal_a'=> $row['terminal_a'], 
            'seal_a'=> $row['seal_a'],
            'joint_to_a' => $row['joint_to_a'], 
            'cavity_a'  => $row['cavity_a'],
            'terminal_b'=> $row['terminal_b'], 
            'seal_b' => $row['seal_b'],
            'joint_to_b'=> $row['joint_to_b'], 
            'cavity_b'=> $row['cavity_b'],
            'bundle_size'=> $row['bundle_size'], 
            'kanban_location' => $row['kanban_location'],
            'workstation' => $row['workstation'], 
            'location' => $row['location'],
            'module' => $row['module'], 
            
           
      
          
        ]);
    }
}


