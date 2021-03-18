<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Neighborhood;
use App\Models\Town;
use App\Models\User;

class NeighborhoodSeeder extends Seeder
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
        $town = Town::whereName('COMMUNE V')->first();


        $neighborhood = Neighborhood::create([
        	"town_id" => $town->id, 
        	"name" => "KALABAN COURA",
        	"user_id" => $superuser->id,
        	"status" => "enable"
        		
        ]);

        $neighborhood = Neighborhood::create([
        	"town_id" => $town->id, 
        	"name" => "NIAMAKORO",
        	"user_id" => $superuser->id,
        	"status" => "enable"
        		
        ]);
    }
}
