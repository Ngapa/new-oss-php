<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Inflasi;

class InflasiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_inflasi()
    {
        $inflasi = Inflasi::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inflasis', $inflasi
        );

        $this->assertApiResponse($inflasi);
    }

    /**
     * @test
     */
    public function test_read_inflasi()
    {
        $inflasi = Inflasi::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inflasis/'.$inflasi->id
        );

        $this->assertApiResponse($inflasi->toArray());
    }

    /**
     * @test
     */
    public function test_update_inflasi()
    {
        $inflasi = Inflasi::factory()->create();
        $editedInflasi = Inflasi::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inflasis/'.$inflasi->id,
            $editedInflasi
        );

        $this->assertApiResponse($editedInflasi);
    }

    /**
     * @test
     */
    public function test_delete_inflasi()
    {
        $inflasi = Inflasi::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inflasis/'.$inflasi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inflasis/'.$inflasi->id
        );

        $this->response->assertStatus(404);
    }
}
