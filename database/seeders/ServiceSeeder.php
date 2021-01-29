<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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



        DB::table('services')->insert(["uid" => Str::random(32), "name" => "MEDECINE GENERALE",
            "user_id" => $superuser->id,
    ]);
        DB::table('services')->insert(["uid" => Str::random(32), "name" => "URGENCE",
            "user_id" => $superuser->id,
    ]);
    }
}
