<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; #ctrl+alt+i autamated import

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
            'username' => 'Syifa',
            'password' => Hash::make('syifa'),
            'fullname' => 'Syifa Ur Rahmi',
            'school' => Str::random(10),
            'isAdmin' => true,
        ]);
        DB::table('users')->insert([
            'username' => 'roko',
            'password' => Hash::make('user'),
            'fullname' => Str::random(10),
            'school' => Str::random(10),
        ]);
    }
}
