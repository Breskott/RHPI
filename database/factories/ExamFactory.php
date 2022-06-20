<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'units' => $this->faker->text(255),
            'type_exam' => $this->faker->text(255),
            'done' => $this->faker->word(1),
            'employe_id' => \App\Models\Employe::factory(),
            'company_id' => \App\Models\Company::factory(),
        ];
    }
}
