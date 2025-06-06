<?php

namespace Database\Seeders;

use App\Models\Valuation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Valuation::factory(100)->create();
    }
}
