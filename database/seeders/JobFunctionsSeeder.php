<?php

namespace Database\Seeders;

use App\Models\JobFunctions;
use Illuminate\Database\Seeder;

class JobFunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobFunctions::factory()
            ->count(5)
            ->create();
    }
}
