<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocalitySeeder extends Seeder
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
        
        DB::table('structure_types')->insert(["uid" => Str::random(32), "name" => "BAMAKO",
            "user_id" => $superuser->id,
    ]);
        DB::table('structure_types')->insert(["uid" => Str::random(32), "name" => "KAYES",
            "user_id" => $superuser->id
    ]);
    }
}
