<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pengangguran;

class PengangguranApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/penganggurans', $pengangguran
        );

        $this->assertApiResponse($pengangguran);
    }

    /**
     * @test
     */
    public function test_read_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/penganggurans/'.$pengangguran->id
        );

        $this->assertApiResponse($pengangguran->toArray());
    }

    /**
     * @test
     */
    public function test_update_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();
        $editedPengangguran = Pengangguran::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/penganggurans/'.$pengangguran->id,
            $editedPengangguran
        );

        $this->assertApiResponse($editedPengangguran);
    }

    /**
     * @test
     */
    public function test_delete_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/penganggurans/'.$pengangguran->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/penganggurans/'.$pengangguran->id
        );

        $this->response->assertStatus(404);
    }
}
