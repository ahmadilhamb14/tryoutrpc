<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_tests')->insert([
            'id' => 1,
            'id_tryout' => 1,
            'subtes' => 'Kemampuan Penalaran Umum',
            'timer' => 30*60, //30 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 2,
            'id_tryout' => 1,
            'subtes' => 'Penalaran Matematika',
            'timer' => 30*60, //30 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 3,
            'id_tryout' => 1,
            'subtes' => 'Kemampuan Memahami Bacaan & Menulis',
            'timer' => 25*60, //25 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 4,
            'id_tryout' => 1,
            'subtes' => 'Pengetahuan Kuantitatif',
            'timer' => 20*60, //20 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 5,
            'id_tryout' => 1,
            'subtes' => 'Literasi dalam Bahasa Indonesia',
            'timer' => 45*60, // 45 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 6,
            'id_tryout' => 1,
            'subtes' => 'Literasi dalam Bahasa Inggris',
            'timer' => 30*60, //30 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 7,
            'id_tryout' => 1,
            'subtes' => 'Pengetahuan dan Pemahaman Umum',
            'timer' => 15*60, // 15 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 8,
            'id_tryout' => 2,
            'subtes' => 'Tes Wawasan Kebangsaan',
            'timer' => 30*60, //30 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 9,
            'id_tryout' => 2,
            'subtes' => 'Tes Intelegensia Umum',
            'timer' => 30*60, // 30 menit
        ]);
        DB::table('sub_tests')->insert([
            'id' => 10,
            'id_tryout' => 2,
            'subtes' => 'Tes Karakteristik Pribadi',
            'timer' => 40*60, // 40 menit
        ]);
    }
}
