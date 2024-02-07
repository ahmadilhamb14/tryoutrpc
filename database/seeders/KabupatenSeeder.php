<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kabupatens')->insert([
            'id' => 1,
            'kabupaten' => "Toraja Utara",
        ]);
        DB::table('kabupatens')->insert([
            'id' => 2,
            'kabupaten' => "Tana Toraja",
        ]);
        DB::table('kabupatens')->insert([
            'id' => 3,
            'kabupaten' => "Enrekang",
        ]);
        DB::table('kabupatens')->insert([
            'id' => 4,
            'kabupaten' => "Pinrang",
        ]);
        DB::table('kabupatens')->insert([
            'id' => 5,
            'kabupaten' => "Sidrap",
        ]);
    
    }
}
