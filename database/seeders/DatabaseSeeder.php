<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Society;
use App\Models\Employee;
use App\Models\Pivot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Project::factory(5)->create();
        // Employee::factory(15)->create();
        // Task::factory(15)->create();
        Society::factory(5)->create()->each(function ($society) {
            Project::factory(rand(1, 3))->create([
                'society_id' =>  $society->id
            ]);

            Task::factory(rand(4, 6))->create([
                'society_id' => $society->id,
                'project_id' => $society->id
            ]);

            User::factory(rand(2, 6))->create([
                'society_id' => $society->id
            ]);
        }); 
        // Pivot::factory(100)->create();
    }
}
