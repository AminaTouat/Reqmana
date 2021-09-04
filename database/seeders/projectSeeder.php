<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projets')->insert([
            'title' => 'Hotel Case',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('user_projet')->insert([
            'user_id' => '1',
            'projet_id' => '1',
        ]);
    }
}
