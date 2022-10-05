<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class splice extends Model
{
    use HasFactory;


    protected $fillable = [
        'wire_name',
        'csa',
        'color1',
        'color2',
        'length',
        'terminal_a',
        'seal_a',
        'joint_to_a',
        'cavity_a',
        'terminal_b',
        'seal_b',
        'joint_to_b',
        'cavity_b',
        'bundle_size',
        'kanban_location',
        'workstation',
        'location',
        'module',
      
    ];

}
