<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TryoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tryouts')->insert([
            'id' => 1,
            'tryout' => 'SNBT',
        ]);
        DB::table('tryouts')->insert([
            'id' => 2,
            'tryout' => 'CAT',
        ]);
    }
}
