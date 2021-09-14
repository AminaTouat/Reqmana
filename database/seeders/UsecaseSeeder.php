<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsecaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('use_cases')->insert([
            'image' => 'cas1.PNG',
            'title' =>'A use case diagram for a hotel chain',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('use_cases')->insert([
            'image' => 'cas2.PNG',
            'title' =>'A use case diagram for a hotel chain, showing the system boundary',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('use_cases')->insert([
            'image' => 'cas3.PNG',
            'title' =>'Relating the roles that actors play',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('use_cases')->insert([
            'image' => 'cas4.PNG',
            'title' =>'Shared behaviour in a lending library',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('use_cases')->insert([
            'image' => 'cas5.PNG',
            'title' =>'including the log on use case in the hotel domain',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('use_cases')->insert([
            'image' => 'cas6.PNG',
            'title' =>'A use case diagram for a lending library',
            'projet_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
