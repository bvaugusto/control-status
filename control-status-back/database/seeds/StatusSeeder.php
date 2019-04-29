<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        $status = [
            ['id'=> 1, 'name_status' => 'Ativo'],
            ['id'=> 2, 'name_status' => 'Inativo']
        ];

        Status::create($status);
    }
}
