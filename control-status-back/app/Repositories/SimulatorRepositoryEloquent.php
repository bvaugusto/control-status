<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\SimulatorRepositoryInterface;
use App\Simulator;

class SimulatorRepositoryEloquent implements SimulatorRepositoryInterface
{

    // Simulator property on class instances
    protected $simulator;

    // Constructor to bind Simulator to repo
    public function __construct(Simulator $simulator)
    {
        $this->simulator = $simulator;
    }

    // Get all instances of Simulator
    public function all()
    {
        return $this->simulator->all();
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->simulator->create($data);
    }

    // Show the record with the given id
    public function show($id)
    {
        return $this->simulator->findOrFail($id);
    }

    // Update record in the database
    public function update(array $data, $id)
    {
        $record = $this->simulator->find($id);
        return $record->update($data);
    }

    // Remove record from the database
    public function delete($id)
    {
        return $this->simulator->destroy($id);
    }
}
