<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Employe;
use App\Models\Dependent;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeDependentsTest extends TestCase
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
    public function it_gets_employe_dependents()
    {
        $employe = Employe::factory()->create();
        $dependents = Dependent::factory()
            ->count(2)
            ->create([
                'employe_id' => $employe->id,
            ]);

        $response = $this->getJson(
            route('api.employes.dependents.index', $employe)
        );

        $response->assertOk()->assertSee($dependents[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_employe_dependents()
    {
        $employe = Employe::factory()->create();
        $data = Dependent::factory()
            ->make([
                'employe_id' => $employe->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.employes.dependents.store', $employe),
            $data
        );

        $this->assertDatabaseHas('dependents', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $dependent = Dependent::latest('id')->first();

        $this->assertEquals($employe->id, $dependent->employe_id);
    }
}
