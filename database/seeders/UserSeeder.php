<?php

namespace Database\Seeders;

// database/seeders/UserSeeder.php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
    }
}

