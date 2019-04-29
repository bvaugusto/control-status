<?php

namespace App\Console\Commands;

use App\EventMachine;
use App\Machine;
use App\Repositories\EventMachineRepositoryEloquent;
use App\Status;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class GenerateEventMachine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'machine:generate_event_machine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulador responsável por gerar evento de status aleatório para casa máquina cadastrada no banco';

    protected $eventmachine;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EventMachine $eventmachine)
    {
        parent::__construct();
        $this->eventmachine = new EventMachineRepositoryEloquent($eventmachine);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $status = Status::inRandomOrder()->first();
        $machines = Machine::all();

        foreach ($machines as $k => $machine)
        {
            $status = Status::inRandomOrder()->first();

            $this->eventmachine->deleteIdMachine($machine->id);

            $arrayEventMachine = array();
            $arrayEventMachine['id_machine'] = $machine->id;
            $arrayEventMachine['id_status'] = $status->id;

            $this->eventmachine->create($arrayEventMachine);
        }
    }
}
