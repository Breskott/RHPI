<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\JobFunctions;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFunctionsTest extends TestCase
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
    public function it_gets_all_job_functions_list()
    {
        $allJobFunctions = JobFunctions::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-job-functions.index'));

        $response->assertOk()->assertSee($allJobFunctions[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_job_functions()
    {
        $data = JobFunctions::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-job-functions.store'),
            $data
        );

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_job_functions()
    {
        $jobFunctions = JobFunctions::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'salary' => $this->faker->randomNumber(2),
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'time_output_interval' => $this->faker->time,
            'time_entry_interval' => $this->faker->time,
        ];

        $response = $this->putJson(
            route('api.all-job-functions.update', $jobFunctions),
            $data
        );

        $data['id'] = $jobFunctions->id;

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_job_functions()
    {
        $jobFunctions = JobFunctions::factory()->create();

        $response = $this->deleteJson(
            route('api.all-job-functions.destroy', $jobFunctions)
        );

        $this->assertModelMissing($jobFunctions);

        $response->assertNoContent();
    }
}
