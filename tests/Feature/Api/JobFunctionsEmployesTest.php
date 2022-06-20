<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Employe;
use App\Models\JobFunctions;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFunctionsEmployesTest extends TestCase
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
    public function it_gets_job_functions_employes()
    {
        $jobFunctions = JobFunctions::factory()->create();
        $employes = Employe::factory()
            ->count(2)
            ->create([
                'job_functions_id' => $jobFunctions->id,
            ]);

        $response = $this->getJson(
            route('api.all-job-functions.employes.index', $jobFunctions)
        );

        $response->assertOk()->assertSee($employes[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_functions_employes()
    {
        $jobFunctions = JobFunctions::factory()->create();
        $data = Employe::factory()
            ->make([
                'job_functions_id' => $jobFunctions->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-job-functions.employes.store', $jobFunctions),
            $data
        );

        $this->assertDatabaseHas('employes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $employe = Employe::latest('id')->first();

        $this->assertEquals($jobFunctions->id, $employe->job_functions_id);
    }
}
