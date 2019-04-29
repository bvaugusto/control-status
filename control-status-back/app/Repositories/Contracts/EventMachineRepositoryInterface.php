<?php

namespace App\Repositories\Contracts;

interface EventMachineRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function show($id);

    public function delete($id);
    
}
