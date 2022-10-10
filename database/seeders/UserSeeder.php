<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_lengkap' => 'Mochammad Jamal',
            'username' => 'jamal',
            'password' => bcrypt('Jamal123456'),
            'level_login' => 'Administrator',
        ]);
        
        DB::table('users')->insert([
            'nama_lengkap' => 'Zoeya Kaureen',
            'username' => 'soya',
            'password' => bcrypt('Soya123456'),
            'level_login' => 'User',
        ]);
    }
}
