<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function getClientsTest()
    {
        $response = $this->get('/api/clients');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function getClientTest()
    {
        $response = $this->get('/api/clients/1');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function createAndDeleteClient()
    {
        $fake = Factory::create();
        // create
        $response = $this->post('/api/clients', [
            'email' => $fake->email,
            'first_name' => $fake->firstName,
            'last_name' => $fake->lastName,
            'password' => bcrypt($fake->password)
        ]);

        $response->assertStatus(200);
        $id = $response->json('id');

        // update
        $response = $this->put('/api/clients/' . $id, [
            'last_name' => $fake->lastName
        ]);
        $response->assertStatus(200);

        // delete
        $response = $this->delete('/api/clients/' . $id);
        $response->assertStatus(200);
    }
}
