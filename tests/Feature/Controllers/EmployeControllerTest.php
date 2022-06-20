<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Employe;

use App\Models\Company;
use App\Models\JobFunctions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_employes()
    {
        $employes = Employe::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('employes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.employes.index')
            ->assertViewHas('employes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_employe()
    {
        $response = $this->get(route('employes.create'));

        $response->assertOk()->assertViewIs('app.employes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_employe()
    {
        $data = Employe::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('employes.store'), $data);

        $this->assertDatabaseHas('employes', $data);

        $employe = Employe::latest('id')->first();

        $response->assertRedirect(route('employes.edit', $employe));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_employe()
    {
        $employe = Employe::factory()->create();

        $response = $this->get(route('employes.show', $employe));

        $response
            ->assertOk()
            ->assertViewIs('app.employes.show')
            ->assertViewHas('employe');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_employe()
    {
        $employe = Employe::factory()->create();

        $response = $this->get(route('employes.edit', $employe));

        $response
            ->assertOk()
            ->assertViewIs('app.employes.edit')
            ->assertViewHas('employe');
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

        $response = $this->put(route('employes.update', $employe), $data);

        $data['id'] = $employe->id;

        $this->assertDatabaseHas('employes', $data);

        $response->assertRedirect(route('employes.edit', $employe));
    }

    /**
     * @test
     */
    public function it_deletes_the_employe()
    {
        $employe = Employe::factory()->create();

        $response = $this->delete(route('employes.destroy', $employe));

        $response->assertRedirect(route('employes.index'));

        $this->assertModelMissing($employe);
    }
}
