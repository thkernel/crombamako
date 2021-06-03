<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class DocumentTypeSeeder extends Seeder
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
        
        DB::table('document_types')->insert(["uid" => Str::random(32), "name" => "Demande d’agrément",
            "user_id" => $superuser->id,
        ]);

        DB::table('document_types')->insert(["uid" => Str::random(32), "name" => "Demande de licence d’exploitation",
            "user_id" => $superuser->id,
        ]);

        
    }
}
