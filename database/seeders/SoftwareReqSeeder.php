<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Carbon\Carbon;

class SoftwareReqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requirements')->insert([
            'summary' => 'Look-and-feel requirements ',
            'body' => 'The system shall make use of a small number of bright colours, to conform to the brand 
            image of the hotel chain.
            On consultation with the stakeholders we arrive at the following.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'nonfunctional',
            'fitC' => 'The system shall be designed with black and white forms with a sky blue title bar and a yellow motif in the bottom right-hand corner copied from the company logo.',
            'importance' => 'may',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'accept a date range from the user.',
            'body' => 'TThe system shall obtain a hotel name from the user.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'functional',
            'fitC' => 'A valid range of dates shall be accepted.',
            'importance' => 'may',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'Usability requirements ',
            'body' => 'The system shall be easy for receptionists to use.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'nonfunctional',
            'fitC' => 'Receptionists shall be able to learn how to use the system in 1 hour. All current receptionists shall be able to complete a reservation, check in or check out form in 2 minutes, assuming the guest has no special requirements.',
            'importance' => 'should',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'Performance requirements ',
            'body' => 'The system shall be able to handle a range of large and small hotels.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'nonfunctional',
            'fitC' => 'The system shall be able to handle up to 100 hotels, varying in size from 10 rooms to 1000 rooms.',
            'importance' => 'should',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'Operational requirements ',
            'body' => 'The system shall operate across the hotel chain, with a set of terminals in each hotel and a single central server.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'nonfunctional',
            'fitC' => 'Self-contained.',
            'importance' => 'may',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'initiate a reservation.',
            'body' => 'The system shall allow a reserver/receptionist to initiate a reservation.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'functional',
            'fitC' => 'The reservation page shall be displayed.',
            'importance' => 'should',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('requirements')->insert([
            'summary' => 'accept a date range from the user.',
            'body' => 'TThe system shall obtain a hotel name from the user.
              ',
            'projet_id' => '1',
            'entredBy' => 'amina',
            'requirementType' => 'functional',
            'fitC' => 'A valid range of dates shall be accepted.',
            'importance' => 'may',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
