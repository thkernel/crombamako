<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
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
        
        DB::table('pages')->insert(["uid" => Str::random(32), "slug"  => "a-propos", "title" => "A propos",
            "user_id" => $superuser->id,
    ]);

        DB::table('pages')->insert(["uid" => Str::random(32),"slug"  => "cgu", "title" => "Conditions Générales d'Utilisation",
            "user_id" => $superuser->id,
        ]);

        DB::table('pages')->insert(["uid" => Str::random(32),"slug"  => "privacy-policy", "title" => "Politique de confidentialité",
            "user_id" => $superuser->id,
        ]);

        DB::table('pages')->insert(["uid" => Str::random(32),"slug"  => "demarches-administratives", "title" => "Démarches administratives",
            "user_id" => $superuser->id,
        ]);
    }
    
}
