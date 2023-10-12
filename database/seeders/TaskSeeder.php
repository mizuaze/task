<?php

namespace Database\Seeders;

// database/seeders/TaskSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::factory()->count(20)->create();
    }
}

