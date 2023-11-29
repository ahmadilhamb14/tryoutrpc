<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert([
            'id_user' => '1',
            'id_subtest' => '1',
            'score' => '700',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '2',
            'id_subtest' => '1',
            'score' => '300',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '1',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '2',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '3',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '4',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '5',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '6',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('scores')->insert([
            'id_user' => '3',
            'id_subtest' => '7',
            'score' => '10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
