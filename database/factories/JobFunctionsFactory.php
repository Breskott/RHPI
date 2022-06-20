<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\JobFunctions;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFunctionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobFunctions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'salary' => $this->faker->randomNumber(2),
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'time_output_interval' => $this->faker->time,
            'time_entry_interval' => $this->faker->time,
        ];
    }
}
