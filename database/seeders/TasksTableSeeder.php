<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Task::Factory(15)->create();
    }
}
