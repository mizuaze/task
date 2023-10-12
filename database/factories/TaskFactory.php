<?php

namespace Database\Factories;

// database/factories/TaskFactory.php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'user_id' => \App\Models\User::factory(),
            'image' => null,
        ];
    }
}

