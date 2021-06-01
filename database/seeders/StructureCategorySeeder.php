<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StructureCategorySeeder extends Seeder
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



        DB::table('structure_categories')->insert(["uid" => Str::random(32), "slug"  => "cabinet", "name" => "CABINET",
            "user_id" => $superuser->id,
    ]);
        DB::table('structure_categories')->insert(["uid" => Str::random(32),"slug"  => "clinique", "name" => "CLINIQUE", 
            "user_id" => $superuser->id,
    ]);

        DB::table('structure_categories')->insert(["uid" => Str::random(32),"slug"  => "hopital", "name" => "
            HOPITAL",
            "user_id" => $superuser->id,
        ]);



        
    }
}
