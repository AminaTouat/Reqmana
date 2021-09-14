<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Carbon\Carbon;

class UserReqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exigences')->insert([
            'summary' => 'Provide a availability and price of demand',
            'body' => 'the hotel system provides the availability and price for the request(An offer is made)',
            'projet_id' => '1',
            'entredBy' => 'Amina',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'should',
            'use_case_id' =>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('exigences')->insert([
            'summary' => 'Make a reservation on behalf of a potential client',
            'body' => 'the reserver chooses to make a reservation on behalf of potential guest ',
            'projet_id' => '1',
            'entredBy' => 'Amina',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'must',
            'use_case_id' =>'3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('exigences')->insert([
            'summary' => 'select  hotel, dates and type of room desired',
            'body' => 'the reserver selects the desired hotel , dates and type of room',
            'projet_id' => '1',
            'entredBy' => 'Sihem',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'must',
            'use_case_id' =>'4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
      
        DB::table('exigences')->insert([
            'summary' => 'agree to proceed with the offer fournir ',
            'body' => 'the reserver agreed to proceed with the offer fournir',
            'projet_id' => '1',
            'entredBy' => 'Amina',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'must',
            'use_case_id' =>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('exigences')->insert([
            'summary' => 'provide payment details ',
            'body' => 'the reserver provides payment details ',
            'projet_id' => '1',
            'entredBy' => 'Amina',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'must',
            'use_case_id' =>'1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('exigences')->insert([
            'summary' => 'provide identification and contact information ',
            'body' => 'the reserver provides identification and contact details for the hotel systems records  ',
            'projet_id' => '1',
            'entredBy' => 'Amina',
            'requirementType' => 'functional',
            'source' => 'amina',
            'importance' => 'may',
            'use_case_id' =>'5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
