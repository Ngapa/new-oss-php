<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ipm;

class IpmApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ipm()
    {
        $ipm = Ipm::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ipms', $ipm
        );

        $this->assertApiResponse($ipm);
    }

    /**
     * @test
     */
    public function test_read_ipm()
    {
        $ipm = Ipm::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ipms/'.$ipm->id
        );

        $this->assertApiResponse($ipm->toArray());
    }

    /**
     * @test
     */
    public function test_update_ipm()
    {
        $ipm = Ipm::factory()->create();
        $editedIpm = Ipm::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ipms/'.$ipm->id,
            $editedIpm
        );

        $this->assertApiResponse($editedIpm);
    }

    /**
     * @test
     */
    public function test_delete_ipm()
    {
        $ipm = Ipm::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ipms/'.$ipm->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ipms/'.$ipm->id
        );

        $this->response->assertStatus(404);
    }
}
