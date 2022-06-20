<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'telephone' => $this->faker->text(255),
            'cell_phone' => $this->faker->text(255),
            'telephone_emergency' => $this->faker->text(255),
            'birth' => $this->faker->date,
            'nationality' => $this->faker->text(255),
            'gender' => $this->faker->text(255),
            'color' => $this->faker->hexcolor,
            'scholarity' => $this->faker->text(255),
            'civil_status' => $this->faker->text(255),
            'sons' => $this->faker->text(255),
            'name_dad' => $this->faker->text(255),
            'name_mother' => $this->faker->text(255),
            'zip_code' => $this->faker->city,
            'andress' => $this->faker->text(255),
            'number' => $this->faker->text(255),
            'complement' => $this->faker->text(255),
            'city' => $this->faker->city,
            'state' => $this->faker->word(2),
            'district' => $this->faker->text(255),
            'document_rg' => $this->faker->text(255),
            'organization_exp' => $this->faker->text(255),
            'date_emission_rg' => $this->faker->date,
            'document_cpf' => $this->faker->text(255),
            'document_ctps' => $this->faker->text(255),
            'document_ctps_serie' => $this->faker->text(255),
            'date_emission_ctps' => $this->faker->date,
            'document_pis' => $this->faker->text(255),
            'document_title' => $this->faker->text(255),
            'document_title_zone' => $this->faker->text(255),
            'document_title_session' => $this->faker->text(255),
            'date_emission_title' => $this->faker->date,
            'document_reservist' => $this->faker->text(255),
            'document_cnh' => $this->faker->text(255),
            'document_cnh_category' => $this->faker->text(255),
            'email' => $this->faker->text(255),
            'date_admission' => $this->faker->date,
            'company_id' => \App\Models\Company::factory(),
            'job_functions_id' => \App\Models\JobFunctions::factory(),
        ];
    }
}
