<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ketimpangan;

class KetimpanganApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ketimpangans', $ketimpangan
        );

        $this->assertApiResponse($ketimpangan);
    }

    /**
     * @test
     */
    public function test_read_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ketimpangans/'.$ketimpangan->id
        );

        $this->assertApiResponse($ketimpangan->toArray());
    }

    /**
     * @test
     */
    public function test_update_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();
        $editedKetimpangan = Ketimpangan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ketimpangans/'.$ketimpangan->id,
            $editedKetimpangan
        );

        $this->assertApiResponse($editedKetimpangan);
    }

    /**
     * @test
     */
    public function test_delete_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ketimpangans/'.$ketimpangan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ketimpangans/'.$ketimpangan->id
        );

        $this->response->assertStatus(404);
    }
}
