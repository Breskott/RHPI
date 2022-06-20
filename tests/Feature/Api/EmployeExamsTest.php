<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exam;
use App\Models\Employe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeExamsTest extends TestCase
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
    public function it_gets_employe_exams()
    {
        $employe = Employe::factory()->create();
        $exams = Exam::factory()
            ->count(2)
            ->create([
                'employe_id' => $employe->id,
            ]);

        $response = $this->getJson(route('api.employes.exams.index', $employe));

        $response->assertOk()->assertSee($exams[0]->units);
    }

    /**
     * @test
     */
    public function it_stores_the_employe_exams()
    {
        $employe = Employe::factory()->create();
        $data = Exam::factory()
            ->make([
                'employe_id' => $employe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.employes.exams.store', $employe),
            $data
        );

        $this->assertDatabaseHas('exams', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $exam = Exam::latest('id')->first();

        $this->assertEquals($employe->id, $exam->employe_id);
    }
}
