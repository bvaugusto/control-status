<?php

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
            ['id'=> 1, 'name' => 'Ativo'],
            ['id'=> 2, 'name' => 'Inativo']
        ];

        \App\Status::insert($status);
    }
}
