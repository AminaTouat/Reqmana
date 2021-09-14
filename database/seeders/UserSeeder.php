<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


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
            'name' => 'Amina',
            'email' => 'amina@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sarah',
            'email' => 'sarah@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sihem',
            'email' => 'sihem@gmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
