<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'firstname' => 'Carlos',
            'lastname' => 'Ange', 
            'email' => 'carloshoungbedji@gmail.com', 
            'login_identifier' => '874524123456', 
            'password' => Hash::make('Carlos123@'), 
            'role' => 'admin',
            'niveau'=>'L1',
            'Is_admin' => true,
            'Is_etudiant' => false,
            'Is_professeur' => false, 
        ]);
         
    }
}
