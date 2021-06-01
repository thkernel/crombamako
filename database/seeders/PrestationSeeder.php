<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrestationSeeder extends Seeder
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



        DB::table('prestations')->insert(["uid" => Str::random(32),"name" => "ACCOUCHEMENT",
            "user_id" => $superuser->id,
    ]);
        DB::table('prestations')->insert(["uid" => Str::random(32),  "name" => "CONSULTATION",
            "user_id" => $superuser->id,
    ]);
    }
}
