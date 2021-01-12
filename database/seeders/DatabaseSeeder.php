<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Call all seeders in order
        
        $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        ProfileSeeder::class,
        StructureTypeSeeder::class,
        StructureCategorySeeder::class,
        LocalitySeeder::class,
    ]);
    }
}
