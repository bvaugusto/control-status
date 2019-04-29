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
}
