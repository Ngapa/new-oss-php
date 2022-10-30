<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\InflasiKota;

class InflasiKotaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inflasi-kotas', $inflasiKota
        );

        $this->assertApiResponse($inflasiKota);
    }

    /**
     * @test
     */
    public function test_read_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inflasi-kotas/'.$inflasiKota->id
        );

        $this->assertApiResponse($inflasiKota->toArray());
    }

    /**
     * @test
     */
    public function test_update_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();
        $editedInflasiKota = InflasiKota::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inflasi-kotas/'.$inflasiKota->id,
            $editedInflasiKota
        );

        $this->assertApiResponse($editedInflasiKota);
    }

    /**
     * @test
     */
    public function test_delete_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inflasi-kotas/'.$inflasiKota->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inflasi-kotas/'.$inflasiKota->id
        );

        $this->response->assertStatus(404);
    }
}
