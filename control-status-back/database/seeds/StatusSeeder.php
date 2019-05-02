<?php

use Illuminate\Database\Seeder;
use App\Repositories\StatusRepositoryEloquent;
use App\Status;

class StatusSeeder extends Seeder
{

    protected $status;

    public function __construct(Status $status)
    {
        $this->status = new StatusRepositoryEloquent($status);
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

        $status = Status::whereNull('deleted_at')->get();
        foreach ($status as $data)
        {
            $this->status->delete($data['id']);
        }

        $status = [
            ['name_status' => 'Ativo'],
            ['name_status' => 'Inativo']
        ];

        foreach ($status as $k => $value)
        {
            $this->status->create($value);
        }
    }
}