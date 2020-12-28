<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superuser = DB::table('roles')->whereName('superuser')->get()[0];

        DB::table('users')->insert([
        	"login" => "superuser", 
        	"email" => "superuser@gmail.com",
        	"password" => Hash::make("AMOSXZIBITDE88"),
        	"role_id" => $superuser->id,
        	"email_verified_at" => date('Y-m-d H:i:s')
        	

        ]);

        DB::table('users')->insert([
            "login" => "demo", 
            "email" => "demo@gmail.com",
            "password" => Hash::make("demo@2020"),
            "role_id" => $superuser->id,
            "email_verified_at" => date('Y-m-d H:i:s')
            

        ]);
    }
}
