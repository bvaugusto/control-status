<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\StatusRepositoryInterface;
use App\Status;

class StatusRepositoryEloquent implements StatusRepositoryInterface
{

    // Status property on class instances
    protected $status;

    // Constructor to bind Status to repo
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    // Get all instances of Status
    public function all()
    {
        return $this->status->all();
    }

    // Create a new record in the database
    public function create(array $data)
    {
        return $this->status->create($data);
    }

    // Show the record with the given id
    public function show($id)
    {
        return $this->status->findOrFail($id);
    }

    // Update record in the database
    public function update(array $data, $id)
    {
        $record = $this->status->find($id);
        return $record->update($data);
    }

    // Remove record from the database
    public function delete($id)
    {
        return $this->status->destroy($id);
    }
}
