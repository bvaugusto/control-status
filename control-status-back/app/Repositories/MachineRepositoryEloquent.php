<?php

namespace App\Repositories;

use App\Repositories\Contracts\MachineRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Machine;

class MachineRepositoryEloquent implements MachineRepositoryInterface
{

    // Machine property on class instances
    protected $machine;

    // Constructor to bind Machine to repo
    public function __construct(Machine $machine)
    {
        $this->machine = $machine;
    }

    // Get all instances of Machine
    public function all()
    {
        return $this->machine->all();
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->machine->create($data);
    }

    // Show the record with the given id
    public function show($id)
    {
        return $this->machine->findOrFail($id);
    }

    // Update record in the database
    public function update(array $data, $id)
    {
        $record = $this->machine->find($id);
        return $record->update($data);
    }

    // Remove record from the database
    public function delete($id)
    {
        return $this->machine->destroy($id);
    }
}
