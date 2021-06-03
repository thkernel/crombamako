<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         $superuser = DB::table('users')->whereLogin('superuser')->get()[0];



        DB::table('specialities')->insert(["uid" => Str::random(32), "name" => "MEDECIN GENERALISTE",
            "user_id" => $superuser->id,
    ]);
        DB::table('specialities')->insert(["uid" => Str::random(32), "name" => "MEDECIN SPECIALISTE",
            "user_id" => $superuser->id,
    ]);


    }
}
