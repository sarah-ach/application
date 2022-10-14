<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'the admin user',
        'username' => '7895',
        'password' => Hash::make('password'),
        'post'=>'POST-06',
        'status'=>'admin',
        'role' => 'admin',
        ]);
  
        User::create([
            'name' => 'the operateur user',
            'username' => '54567',
            'password' => Hash::make('password'),
            'post'=>'POST-07',
            'status'=>'operateur',
            'role' => 'operateur',
        ]); 

        User::create([
            'name' => 'the operateur user',
            'username' => '123',
            'password' => Hash::make('123'),
            'post'=>'POST-08',
            'status'=>'operateur',
            'role' => 'operateur',
        ]);
    }
}
