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
         $this->call(UserTableSeeders::class);
         $this->call(municipiosSeeder::class);
         $this->call(CategoriasSeeder::class);
         $this->call(lugaresSeeder::class);

    }
}
