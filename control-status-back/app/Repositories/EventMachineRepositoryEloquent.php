<?php

namespace App\Repositories;

use App\Repositories\Contracts\EventMachineRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\EventMachine;

class EventMachineRepositoryEloquent implements EventMachineRepositoryInterface
{

    // EventMachine property on class instances
    protected $eventmachine;

    // Constructor to bind EventMachine to repo
    public function __construct(EventMachine $eventmachine)
    {
        $this->eventmachine = $eventmachine;
    }

    // Get all instances of EventMachine
    public function all()
    {
        return $this->eventmachine->all();
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->eventmachine->create($data);
    }

    // Show the record with the given id
    public function show($id)
    {
        return $this->eventmachine->findOrFail($id);
    }

    // Update record in the database
    public function update(array $data, $id)
    {
        $record = $this->eventmachine->find($id);
        return $record->update($data);
    }

    // Remove record from the database
    public function delete($id)
    {
        return $this->eventmachine->destroy($id);
    }

    /**
     *
     * @return mixed
     */
    public function getAllEventMachine()
    {
        $arrayEvents = EventMachine::select('machines.name_machine', 'status.name_status', 'event_machines.created_at')
            ->join('machines', 'machines.id', '=', 'event_machines.id_machine')
            ->join('status', 'status.id', '=', 'event_machines.id_machine')
            ->get();

        return $arrayEvents;
    }


    /**
     * Método responsável por inativar eventos antigos
     *
     * @param $id
     * @return bool
     */
    public function deleteIdMachine($id)
    {
        EventMachine::where('id_machine', '=', $id)
                ->whereNull('deleted_at')
                ->delete();

        return true;
    }
}
