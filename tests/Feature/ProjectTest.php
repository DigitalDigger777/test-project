<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * @test
     */
    public function getProjectsTest()
    {
        $response = $this->get('/api/projects');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function getProjectTest()
    {
        $response = $this->get('/api/projects/1');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function createUpdateDeleteProjectTest()
    {
        $fake = Factory::create();

        // create
        $response = $this->post('/api/projects', [
            'client_id' => rand(1, 10),
            'name' => $fake->company,
            'description' => $fake->text(300),
            'statuses' => rand(0, 4)
        ]);
        $response->assertStatus(200);

        $id = $response->json('id');

        // update
        $response = $this->put('/api/projects/' . $id, [
            'name' => $fake->company
        ]);
        $response->assertStatus(200);

        // delete
        $response = $this->delete('/api/projects/' . $id);
        $response->assertStatus(200);
    }
}
