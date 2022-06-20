<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Transport;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransportTest extends TestCase
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
    public function it_gets_transports_list()
    {
        $transports = Transport::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.transports.index'));

        $response->assertOk()->assertSee($transports[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_transport()
    {
        $data = Transport::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.transports.store'), $data);

        $this->assertDatabaseHas('transports', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_transport()
    {
        $transport = Transport::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'active' => $this->faker->word(1),
        ];

        $response = $this->putJson(
            route('api.transports.update', $transport),
            $data
        );

        $data['id'] = $transport->id;

        $this->assertDatabaseHas('transports', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_transport()
    {
        $transport = Transport::factory()->create();

        $response = $this->deleteJson(
            route('api.transports.destroy', $transport)
        );

        $this->assertModelMissing($transport);

        $response->assertNoContent();
    }
}
