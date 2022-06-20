<?php

namespace Database\Seeders;

use App\Models\Dependent;
use Illuminate\Database\Seeder;

class DependentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dependent::factory()
            ->count(5)
            ->create();
    }
}
