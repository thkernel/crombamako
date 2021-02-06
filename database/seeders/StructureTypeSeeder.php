<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StructureTypeSeeder extends Seeder
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
        
        

        DB::table('structure_types')->insert(["uid" => Str::random(32),"slug"  => "privee", "name" => "Privée",
            "user_id" => $superuser->id,
    ]);
        DB::table('structure_types')->insert(["uid" => Str::random(32), "slug"  => "publique", "name" => "Publique",
            "user_id" => $superuser->id,
    ]);
    }

        
   
}
