<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Kemiskinan;

class KemiskinanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/kemiskinans', $kemiskinan
        );

        $this->assertApiResponse($kemiskinan);
    }

    /**
     * @test
     */
    public function test_read_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/kemiskinans/'.$kemiskinan->id
        );

        $this->assertApiResponse($kemiskinan->toArray());
    }

    /**
     * @test
     */
    public function test_update_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();
        $editedKemiskinan = Kemiskinan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/kemiskinans/'.$kemiskinan->id,
            $editedKemiskinan
        );

        $this->assertApiResponse($editedKemiskinan);
    }

    /**
     * @test
     */
    public function test_delete_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/kemiskinans/'.$kemiskinan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/kemiskinans/'.$kemiskinan->id
        );

        $this->response->assertStatus(404);
    }
}
