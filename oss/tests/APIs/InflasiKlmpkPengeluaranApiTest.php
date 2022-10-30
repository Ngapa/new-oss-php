<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\InflasiKlmpkPengeluaran;

class InflasiKlmpkPengeluaranApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/inflasi-klmpk-pengeluarans', $inflasiKlmpkPengeluaran
        );

        $this->assertApiResponse($inflasiKlmpkPengeluaran);
    }

    /**
     * @test
     */
    public function test_read_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/inflasi-klmpk-pengeluarans/'.$inflasiKlmpkPengeluaran->id
        );

        $this->assertApiResponse($inflasiKlmpkPengeluaran->toArray());
    }

    /**
     * @test
     */
    public function test_update_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();
        $editedInflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/inflasi-klmpk-pengeluarans/'.$inflasiKlmpkPengeluaran->id,
            $editedInflasiKlmpkPengeluaran
        );

        $this->assertApiResponse($editedInflasiKlmpkPengeluaran);
    }

    /**
     * @test
     */
    public function test_delete_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/inflasi-klmpk-pengeluarans/'.$inflasiKlmpkPengeluaran->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/inflasi-klmpk-pengeluarans/'.$inflasiKlmpkPengeluaran->id
        );

        $this->response->assertStatus(404);
    }
}
