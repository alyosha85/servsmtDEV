<?php

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
        //$this->call(UserSeeder::class);
        $this->call(PlaceTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(AmgTableSeeder::class);
        $this->call(GartTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissioncategoryTableSeeder::class);
    }
}
