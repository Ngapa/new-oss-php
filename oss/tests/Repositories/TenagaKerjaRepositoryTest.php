<?php

namespace Tests\Repositories;

use App\Models\TenagaKerja;
use App\Repositories\TenagaKerjaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TenagaKerjaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected TenagaKerjaRepository $tenagaKerjaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tenagaKerjaRepo = app(TenagaKerjaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->make()->toArray();

        $createdTenagaKerja = $this->tenagaKerjaRepo->create($tenagaKerja);

        $createdTenagaKerja = $createdTenagaKerja->toArray();
        $this->assertArrayHasKey('id', $createdTenagaKerja);
        $this->assertNotNull($createdTenagaKerja['id'], 'Created TenagaKerja must have id specified');
        $this->assertNotNull(TenagaKerja::find($createdTenagaKerja['id']), 'TenagaKerja with given id must be in DB');
        $this->assertModelData($tenagaKerja, $createdTenagaKerja);
    }

    /**
     * @test read
     */
    public function test_read_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();

        $dbTenagaKerja = $this->tenagaKerjaRepo->find($tenagaKerja->id);

        $dbTenagaKerja = $dbTenagaKerja->toArray();
        $this->assertModelData($tenagaKerja->toArray(), $dbTenagaKerja);
    }

    /**
     * @test update
     */
    public function test_update_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();
        $fakeTenagaKerja = TenagaKerja::factory()->make()->toArray();

        $updatedTenagaKerja = $this->tenagaKerjaRepo->update($fakeTenagaKerja, $tenagaKerja->id);

        $this->assertModelData($fakeTenagaKerja, $updatedTenagaKerja->toArray());
        $dbTenagaKerja = $this->tenagaKerjaRepo->find($tenagaKerja->id);
        $this->assertModelData($fakeTenagaKerja, $dbTenagaKerja->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tenaga_kerja()
    {
        $tenagaKerja = TenagaKerja::factory()->create();

        $resp = $this->tenagaKerjaRepo->delete($tenagaKerja->id);

        $this->assertTrue($resp);
        $this->assertNull(TenagaKerja::find($tenagaKerja->id), 'TenagaKerja should not exist in DB');
    }
}
