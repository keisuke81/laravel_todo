<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'test1'
        ];
        DB::table('todos')->insert($param);

        $param = [
            'content' => 'test2'
        ];
        DB::table('todos')->insert($param);        

        $param = [
            'content' => 'test3'
        ];
        DB::table('todos')->insert($param);        
    }
}
