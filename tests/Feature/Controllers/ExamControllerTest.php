<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Exam;

use App\Models\Employe;
use App\Models\Company;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExamControllerTest extends TestCase
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
    public function it_displays_index_view_with_exams()
    {
        $exams = Exam::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('exams.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.exams.index')
            ->assertViewHas('exams');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_exam()
    {
        $response = $this->get(route('exams.create'));

        $response->assertOk()->assertViewIs('app.exams.create');
    }

    /**
     * @test
     */
    public function it_stores_the_exam()
    {
        $data = Exam::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('exams.store'), $data);

        $this->assertDatabaseHas('exams', $data);

        $exam = Exam::latest('id')->first();

        $response->assertRedirect(route('exams.edit', $exam));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_exam()
    {
        $exam = Exam::factory()->create();

        $response = $this->get(route('exams.show', $exam));

        $response
            ->assertOk()
            ->assertViewIs('app.exams.show')
            ->assertViewHas('exam');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_exam()
    {
        $exam = Exam::factory()->create();

        $response = $this->get(route('exams.edit', $exam));

        $response
            ->assertOk()
            ->assertViewIs('app.exams.edit')
            ->assertViewHas('exam');
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

        $response = $this->put(route('exams.update', $exam), $data);

        $data['id'] = $exam->id;

        $this->assertDatabaseHas('exams', $data);

        $response->assertRedirect(route('exams.edit', $exam));
    }

    /**
     * @test
     */
    public function it_deletes_the_exam()
    {
        $exam = Exam::factory()->create();

        $response = $this->delete(route('exams.destroy', $exam));

        $response->assertRedirect(route('exams.index'));

        $this->assertModelMissing($exam);
    }
}
