<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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



        DB::table('services')->insert(["uid" => Str::random(32), "slug"  => "medecine-generale", "name" => "MEDECINE GENERALE",
            "user_id" => $superuser->id,
    ]);
        DB::table('services')->insert(["uid" => Str::random(32), "slug"  => "urgence", "name" => "URGENCE",
            "user_id" => $superuser->id,
    ]);
    }
}
