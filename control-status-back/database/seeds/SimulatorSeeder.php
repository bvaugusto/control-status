<?php

use Illuminate\Database\Seeder;

class SimulatorSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function run()
    {
        DB::table('simulators')->delete();

        $simulators = [
            ['id'=> 1, 'minutes' => 5]
        ];

        \App\Simulator::insert($simulators);
    }
}