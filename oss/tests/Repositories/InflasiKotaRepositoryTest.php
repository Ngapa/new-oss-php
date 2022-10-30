<?php

namespace Tests\Repositories;

use App\Models\InflasiKota;
use App\Repositories\InflasiKotaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InflasiKotaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected InflasiKotaRepository $inflasiKotaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->inflasiKotaRepo = app(InflasiKotaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->make()->toArray();

        $createdInflasiKota = $this->inflasiKotaRepo->create($inflasiKota);

        $createdInflasiKota = $createdInflasiKota->toArray();
        $this->assertArrayHasKey('id', $createdInflasiKota);
        $this->assertNotNull($createdInflasiKota['id'], 'Created InflasiKota must have id specified');
        $this->assertNotNull(InflasiKota::find($createdInflasiKota['id']), 'InflasiKota with given id must be in DB');
        $this->assertModelData($inflasiKota, $createdInflasiKota);
    }

    /**
     * @test read
     */
    public function test_read_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();

        $dbInflasiKota = $this->inflasiKotaRepo->find($inflasiKota->id);

        $dbInflasiKota = $dbInflasiKota->toArray();
        $this->assertModelData($inflasiKota->toArray(), $dbInflasiKota);
    }

    /**
     * @test update
     */
    public function test_update_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();
        $fakeInflasiKota = InflasiKota::factory()->make()->toArray();

        $updatedInflasiKota = $this->inflasiKotaRepo->update($fakeInflasiKota, $inflasiKota->id);

        $this->assertModelData($fakeInflasiKota, $updatedInflasiKota->toArray());
        $dbInflasiKota = $this->inflasiKotaRepo->find($inflasiKota->id);
        $this->assertModelData($fakeInflasiKota, $dbInflasiKota->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inflasi_kota()
    {
        $inflasiKota = InflasiKota::factory()->create();

        $resp = $this->inflasiKotaRepo->delete($inflasiKota->id);

        $this->assertTrue($resp);
        $this->assertNull(InflasiKota::find($inflasiKota->id), 'InflasiKota should not exist in DB');
    }
}
