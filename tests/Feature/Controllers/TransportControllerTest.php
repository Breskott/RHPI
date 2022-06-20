<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Transport;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransportControllerTest extends TestCase
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
    public function it_displays_index_view_with_transports()
    {
        $transports = Transport::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('transports.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.transports.index')
            ->assertViewHas('transports');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_transport()
    {
        $response = $this->get(route('transports.create'));

        $response->assertOk()->assertViewIs('app.transports.create');
    }

    /**
     * @test
     */
    public function it_stores_the_transport()
    {
        $data = Transport::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('transports.store'), $data);

        $this->assertDatabaseHas('transports', $data);

        $transport = Transport::latest('id')->first();

        $response->assertRedirect(route('transports.edit', $transport));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_transport()
    {
        $transport = Transport::factory()->create();

        $response = $this->get(route('transports.show', $transport));

        $response
            ->assertOk()
            ->assertViewIs('app.transports.show')
            ->assertViewHas('transport');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_transport()
    {
        $transport = Transport::factory()->create();

        $response = $this->get(route('transports.edit', $transport));

        $response
            ->assertOk()
            ->assertViewIs('app.transports.edit')
            ->assertViewHas('transport');
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

        $response = $this->put(route('transports.update', $transport), $data);

        $data['id'] = $transport->id;

        $this->assertDatabaseHas('transports', $data);

        $response->assertRedirect(route('transports.edit', $transport));
    }

    /**
     * @test
     */
    public function it_deletes_the_transport()
    {
        $transport = Transport::factory()->create();

        $response = $this->delete(route('transports.destroy', $transport));

        $response->assertRedirect(route('transports.index'));

        $this->assertModelMissing($transport);
    }
}
