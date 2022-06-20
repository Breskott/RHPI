<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Dependent;

use App\Models\Employe;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DependentTest extends TestCase
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
    public function it_gets_dependents_list()
    {
        $dependents = Dependent::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.dependents.index'));

        $response->assertOk()->assertSee($dependents[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_dependent()
    {
        $data = Dependent::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.dependents.store'), $data);

        $this->assertDatabaseHas('dependents', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.dependents.update', $dependent),
            $data
        );

        $data['id'] = $dependent->id;

        $this->assertDatabaseHas('dependents', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_dependent()
    {
        $dependent = Dependent::factory()->create();

        $response = $this->deleteJson(
            route('api.dependents.destroy', $dependent)
        );

        $this->assertModelMissing($dependent);

        $response->assertNoContent();
    }
}
