<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TownSeeder extends Seeder
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
        
        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE I",
            "user_id" => $superuser->id,
        ]);

        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE II",
            "user_id" => $superuser->id
        ]);

        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE III",
            "user_id" => $superuser->id
        ]);

        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE IV",
            "user_id" => $superuser->id
        ]);

        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE V",
            "user_id" => $superuser->id
        ]);

        DB::table('towns')->insert(["uid" => Str::random(32), "name" => "COMMUNE VI",
            "user_id" => $superuser->id
        ]);

    }
}
