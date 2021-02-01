<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AdminProfile;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $superuser = User::whereLogin('superuser')->first();
        $demo_user = User::whereLogin('demo')->first();
        $admin_user = User::whereLogin('admin')->first();

        $superuser_profile = AdminProfile::create([
        	"first_name" => "superuser", 
        	"last_name" => "superuser",
        		
        ]);

        $admin_user_profile = AdminProfile::create([
            "first_name" => "adminuser", 
            "last_name" => "adminuser",
                
        ]);



        $demo_user_profile = AdminProfile::create([
			"first_name" => "demo", 
        	"last_name" => "demo",
        	
       
        	

        ]);

        $superuser_profile->user()->save($superuser);
        $admin_user_profile->user()->save($admin_user);
        $demo_user_profile->user()->save($demo_user);


    }
}
