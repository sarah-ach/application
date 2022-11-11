<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $table = 'historique';

     protected $fillable = [
        
        /* 'username',
        'wireName',
        'location',
        'serialNumber',
        'quantite',
        'dateOperation', */

        'username',
        'search' ,
        'password' ,
        'password_confirmation',
        'serie',
        
        
    ]; 

   
}
