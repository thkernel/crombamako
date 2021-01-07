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
        DB::table('structure_categories')->insert(["uid" => Str::random(32), "name" => "CABINET"]);
        DB::table('structure_categories')->insert(["uid" => Str::random(32), "name" => "CLINIQUE",
            "user_id" => $superuser->id,
    ]);

        DB::table('structure_categories')->insert(["uid" => Str::random(32), "name" => "
        	HOPITAL",
            "user_id" => $superuser->id,
        ]);
    }
}
