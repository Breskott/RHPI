<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JobFunctions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobFunctionsControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_job_functions()
    {
        $allJobFunctions = JobFunctions::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-job-functions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_job_functions.index')
            ->assertViewHas('allJobFunctions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_job_functions()
    {
        $response = $this->get(route('all-job-functions.create'));

        $response->assertOk()->assertViewIs('app.all_job_functions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_job_functions()
    {
        $data = JobFunctions::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-job-functions.store'), $data);

        $this->assertDatabaseHas('job_functions', $data);

        $jobFunctions = JobFunctions::latest('id')->first();

        $response->assertRedirect(
            route('all-job-functions.edit', $jobFunctions)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_job_functions()
    {
        $jobFunctions = JobFunctions::factory()->create();

        $response = $this->get(route('all-job-functions.show', $jobFunctions));

        $response
            ->assertOk()
            ->assertViewIs('app.all_job_functions.show')
            ->assertViewHas('jobFunctions');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_job_functions()
    {
        $jobFunctions = JobFunctions::factory()->create();

        $response = $this->get(route('all-job-functions.edit', $jobFunctions));

        $response
            ->assertOk()
            ->assertViewIs('app.all_job_functions.edit')
            ->assertViewHas('jobFunctions');
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

        $response = $this->put(
            route('all-job-functions.update', $jobFunctions),
            $data
        );

        $data['id'] = $jobFunctions->id;

        $this->assertDatabaseHas('job_functions', $data);

        $response->assertRedirect(
            route('all-job-functions.edit', $jobFunctions)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_job_functions()
    {
        $jobFunctions = JobFunctions::factory()->create();

        $response = $this->delete(
            route('all-job-functions.destroy', $jobFunctions)
        );

        $response->assertRedirect(route('all-job-functions.index'));

        $this->assertModelMissing($jobFunctions);
    }
}
