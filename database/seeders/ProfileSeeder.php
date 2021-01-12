<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
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
        $demo = DB::table('users')->whereLogin('demo')->get()[0];

        DB::table('profiles')->insert([
        	"first_name" => "superuser", 
        	"last_name" => "superuser",
        	"user_id" => $superuser->id,
        	

        ]);

        DB::table('profiles')->insert([
			"first_name" => "demo", 
        	"last_name" => "demo",
        	"user_id" => $demo->id,
       
        	

        ]);


    }
}
