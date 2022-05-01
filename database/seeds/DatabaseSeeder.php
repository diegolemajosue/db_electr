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
        $this->call(UserSeeder::class);
        $this->call(bodegaSeeder::class);
        $this->call(productosSeeder::class);
        $this->call(provedorSeeder::class);
        $this->call(inventarioSeeder::class);
        $this->call(clientesSeeder::class);
    }
}
