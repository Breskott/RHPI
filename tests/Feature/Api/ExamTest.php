<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exam;

use App\Models\Employe;
use App\Models\Company;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExamTest extends TestCase
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
    public function it_gets_exams_list()
    {
        $exams = Exam::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.exams.index'));

        $response->assertOk()->assertSee($exams[0]->units);
    }

    /**
     * @test
     */
    public function it_stores_the_exam()
    {
        $data = Exam::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.exams.store'), $data);

        $this->assertDatabaseHas('exams', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_exam()
    {
        $exam = Exam::factory()->create();

        $employe = Employe::factory()->create();
        $company = Company::factory()->create();

        $data = [
            'units' => $this->faker->text(255),
            'type_exam' => $this->faker->text(255),
            'done' => $this->faker->word(1),
            'employe_id' => $employe->id,
            'company_id' => $company->id,
        ];

        $response = $this->putJson(route('api.exams.update', $exam), $data);

        $data['id'] = $exam->id;

        $this->assertDatabaseHas('exams', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_exam()
    {
        $exam = Exam::factory()->create();

        $response = $this->deleteJson(route('api.exams.destroy', $exam));

        $this->assertModelMissing($exam);

        $response->assertNoContent();
    }
}
