<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->insert([
            ['name' => 'First task', 'isfavorite' => 1],
            ['name' => 'Second task', 'isfavorite' => 0],
            ['name' => 'Third task', 'isfavorite' => 1],
        ]);
    }
}
