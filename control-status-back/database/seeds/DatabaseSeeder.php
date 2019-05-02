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
         $this->call([
             SimulatorSeeder::class,
             StatusSeeder::class,
             MachineSeeder::class
         ]);
    }
}
