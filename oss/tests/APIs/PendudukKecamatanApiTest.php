<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PendudukKecamatan;

class PendudukKecamatanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/penduduk-kecamatans', $pendudukKecamatan
        );

        $this->assertApiResponse($pendudukKecamatan);
    }

    /**
     * @test
     */
    public function test_read_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/penduduk-kecamatans/'.$pendudukKecamatan->id
        );

        $this->assertApiResponse($pendudukKecamatan->toArray());
    }

    /**
     * @test
     */
    public function test_update_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();
        $editedPendudukKecamatan = PendudukKecamatan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/penduduk-kecamatans/'.$pendudukKecamatan->id,
            $editedPendudukKecamatan
        );

        $this->assertApiResponse($editedPendudukKecamatan);
    }

    /**
     * @test
     */
    public function test_delete_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/penduduk-kecamatans/'.$pendudukKecamatan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/penduduk-kecamatans/'.$pendudukKecamatan->id
        );

        $this->response->assertStatus(404);
    }
}
