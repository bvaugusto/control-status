<?php

use App\Repositories\SimulatorRepositoryEloquent;
use App\Simulator;
use Illuminate\Database\Seeder;


class SimulatorSeeder extends Seeder
{

    protected $simulator;

    public function __construct(Simulator $simulator)
    {
        $this->simulator = new SimulatorRepositoryEloquent($simulator);
    }

    /**
     * Run the database seeds.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function run()
    {

        $this->simulator->delete(1);

        $arraySimulator = array();
        $arraySimulator['minutes'] = 5;

        $this->simulator->create($arraySimulator);
    }
}