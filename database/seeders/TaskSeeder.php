<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Task::create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'status' => 'p',
            'due_date' => '2025-04-01',
        ]);

        Task::create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'status' => 'p',
            'due_date' => '2025-04-05',
        ]);
    }
}
