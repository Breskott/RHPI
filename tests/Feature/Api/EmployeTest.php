<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Employe;

use App\Models\Company;
use App\Models\JobFunctions;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_employes_list()
    {
        $employes = Employe::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.employes.index'));

        $response->assertOk()->assertSee($employes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_employe()
    {
        $data = Employe::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.employes.store'), $data);

        $this->assertDatabaseHas('employes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_employe()
    {
        $employe = Employe::factory()->create();

        $company = Company::factory()->create();
        $jobFunctions = JobFunctions::factory()->create();

        $data = [
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
            'company_id' => $company->id,
            'job_functions_id' => $jobFunctions->id,
        ];

        $response = $this->putJson(
            route('api.employes.update', $employe),
            $data
        );

        $data['id'] = $employe->id;

        $this->assertDatabaseHas('employes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_employe()
    {
        $employe = Employe::factory()->create();

        $response = $this->deleteJson(route('api.employes.destroy', $employe));

        $this->assertModelMissing($employe);

        $response->assertNoContent();
    }
}
