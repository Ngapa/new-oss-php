<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TenagaKerja;

class TenagaKerjaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tenaga-kerjas', $tenagaKerja
        );

        $this->assertApiResponse($tenagaKerja);
    }

    /**
     * @test
     */
    public function test_read_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tenaga-kerjas/'.$tenagaKerja->id
        );

        $this->assertApiResponse($tenagaKerja->toArray());
    }

    /**
     * @test
     */
    public function test_update_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();
        $editedTenagaKerja = TenagaKerja::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tenaga-kerjas/'.$tenagaKerja->id,
            $editedTenagaKerja
        );

        $this->assertApiResponse($editedTenagaKerja);
    }

    /**
     * @test
     */
    public function test_delete_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tenaga-kerjas/'.$tenagaKerja->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tenaga-kerjas/'.$tenagaKerja->id
        );

        $this->response->assertStatus(404);
    }
}
