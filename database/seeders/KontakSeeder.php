<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontak')->insert([
            'no_wa' => '081556862808',
            'email' => 'moch.jamal87@gmail.com',
            'alamat' => 'Jl. Sultan Agung No.76, Taman Suruh, Bangorejo, Ke...',
            'link_fb' => 'https://facebook.com/nalendra-cafe',
            'link_ig' => 'https://instagram.com/nalendra-cafe',
        ]);
    }
}
