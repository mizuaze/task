<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TaskSeeder::class,
            // tambahkan seeder lain jika ada
        ]);
    }
}
