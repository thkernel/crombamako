<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(["uid" => Str::random(32), "name" => "superuser"]);
        DB::table('roles')->insert(["uid" => Str::random(32), "name" => "administrateur"]);
        DB::table('roles')->insert(["uid" => Str::random(32), "name" => "Médecin"]);
        DB::table('roles')->insert(["uid" => Str::random(32), "name" => "guest"]);
        DB::table('roles')->insert(["uid" => Str::random(32), "name" => "demo"]);
    }
}
