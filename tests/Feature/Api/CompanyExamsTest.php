<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Exam;
use App\Models\Company;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyExamsTest extends TestCase
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
    public function it_gets_company_exams()
    {
        $company = Company::factory()->create();
        $exams = Exam::factory()
            ->count(2)
            ->create([
                'company_id' => $company->id,
            ]);

        $response = $this->getJson(
            route('api.companies.exams.index', $company)
        );

        $response->assertOk()->assertSee($exams[0]->units);
    }

    /**
     * @test
     */
    public function it_stores_the_company_exams()
    {
        $company = Company::factory()->create();
        $data = Exam::factory()
            ->make([
                'company_id' => $company->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.companies.exams.store', $company),
            $data
        );

        $this->assertDatabaseHas('exams', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $exam = Exam::latest('id')->first();

        $this->assertEquals($company->id, $exam->company_id);
    }
}
