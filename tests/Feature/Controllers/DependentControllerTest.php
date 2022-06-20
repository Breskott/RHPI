<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Dependent;

use App\Models\Employe;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DependentControllerTest extends TestCase
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
    public function it_displays_index_view_with_dependents()
    {
        $dependents = Dependent::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('dependents.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.dependents.index')
            ->assertViewHas('dependents');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_dependent()
    {
        $response = $this->get(route('dependents.create'));

        $response->assertOk()->assertViewIs('app.dependents.create');
    }

    /**
     * @test
     */
    public function it_stores_the_dependent()
    {
        $data = Dependent::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('dependents.store'), $data);

        $this->assertDatabaseHas('dependents', $data);

        $dependent = Dependent::latest('id')->first();

        $response->assertRedirect(route('dependents.edit', $dependent));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_dependent()
    {
        $dependent = Dependent::factory()->create();

        $response = $this->get(route('dependents.show', $dependent));

        $response
            ->assertOk()
            ->assertViewIs('app.dependents.show')
            ->assertViewHas('dependent');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_dependent()
    {
        $dependent = Dependent::factory()->create();

        $response = $this->get(route('dependents.edit', $dependent));

        $response
            ->assertOk()
            ->assertViewIs('app.dependents.edit')
            ->assertViewHas('dependent');
    }

    /**
     * @test
     */
    public function it_updates_the_dependent()
    {
        $dependent = Dependent::factory()->create();

        $employe = Employe::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'birth' => $this->faker->date,
            'document_cpf' => $this->faker->text(255),
            'kinship' => $this->faker->text(255),
            'dependent_ir' => $this->faker->word(255),
            'employe_id' => $employe->id,
        ];

        $response = $this->put(route('dependents.update', $dependent), $data);

        $data['id'] = $dependent->id;

        $this->assertDatabaseHas('dependents', $data);

        $response->assertRedirect(route('dependents.edit', $dependent));
    }

    /**
     * @test
     */
    public function it_deletes_the_dependent()
    {
        $dependent = Dependent::factory()->create();

        $response = $this->delete(route('dependents.destroy', $dependent));

        $response->assertRedirect(route('dependents.index'));

        $this->assertModelMissing($dependent);
    }
}
