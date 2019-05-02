<?php

use App\Machine;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    protected $machine;

    public function __construct(Machine $machine)
    {
        $this->machine = new \App\Repositories\MachineRepositoryEloquent($machine);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machines = Machine::whereNull('deleted_at')->get();
        foreach ($machines as $data)
        {
            $this->machine->delete($data['id']);
        }

        $arrayMachines = [
            ['name_machine' => 'Le Tourneau - L-2350'],
            ['name_machine' => 'Demag CC 8000'],
            ['name_machine' => 'BHP Billitron Iron Ore Train'],
            ['name_machine' => 'Big Bertha'],
            ['name_machine' => 'F60 Bridge']
        ];

        foreach ($arrayMachines as $k => $value)
        {
            $this->machine->create($value);
        }
    }
}
