<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pdrb;

class PdrbApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pdrb()
    {
        $pdrb = Pdrb::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pdrbs', $pdrb
        );

        $this->assertApiResponse($pdrb);
    }

    /**
     * @test
     */
    public function test_read_pdrb()
    {
        $pdrb = Pdrb::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pdrbs/'.$pdrb->id
        );

        $this->assertApiResponse($pdrb->toArray());
    }

    /**
     * @test
     */
    public function test_update_pdrb()
    {
        $pdrb = Pdrb::factory()->create();
        $editedPdrb = Pdrb::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pdrbs/'.$pdrb->id,
            $editedPdrb
        );

        $this->assertApiResponse($editedPdrb);
    }

    /**
     * @test
     */
    public function test_delete_pdrb()
    {
        $pdrb = Pdrb::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pdrbs/'.$pdrb->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pdrbs/'.$pdrb->id
        );

        $this->response->assertStatus(404);
    }
}
