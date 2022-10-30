<?php

namespace Tests\Repositories;

use App\Models\InflasiKlmpkPengeluaran;
use App\Repositories\InflasiKlmpkPengeluaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InflasiKlmpkPengeluaranRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected InflasiKlmpkPengeluaranRepository $inflasiKlmpkPengeluaranRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->inflasiKlmpkPengeluaranRepo = app(InflasiKlmpkPengeluaranRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->make()->toArray();

        $createdInflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepo->create($inflasiKlmpkPengeluaran);

        $createdInflasiKlmpkPengeluaran = $createdInflasiKlmpkPengeluaran->toArray();
        $this->assertArrayHasKey('id', $createdInflasiKlmpkPengeluaran);
        $this->assertNotNull($createdInflasiKlmpkPengeluaran['id'], 'Created InflasiKlmpkPengeluaran must have id specified');
        $this->assertNotNull(InflasiKlmpkPengeluaran::find($createdInflasiKlmpkPengeluaran['id']), 'InflasiKlmpkPengeluaran with given id must be in DB');
        $this->assertModelData($inflasiKlmpkPengeluaran, $createdInflasiKlmpkPengeluaran);
    }

    /**
     * @test read
     */
    public function test_read_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();

        $dbInflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepo->find($inflasiKlmpkPengeluaran->id);

        $dbInflasiKlmpkPengeluaran = $dbInflasiKlmpkPengeluaran->toArray();
        $this->assertModelData($inflasiKlmpkPengeluaran->toArray(), $dbInflasiKlmpkPengeluaran);
    }

    /**
     * @test update
     */
    public function test_update_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();
        $fakeInflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->make()->toArray();

        $updatedInflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepo->update($fakeInflasiKlmpkPengeluaran, $inflasiKlmpkPengeluaran->id);

        $this->assertModelData($fakeInflasiKlmpkPengeluaran, $updatedInflasiKlmpkPengeluaran->toArray());
        $dbInflasiKlmpkPengeluaran = $this->inflasiKlmpkPengeluaranRepo->find($inflasiKlmpkPengeluaran->id);
        $this->assertModelData($fakeInflasiKlmpkPengeluaran, $dbInflasiKlmpkPengeluaran->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inflasi_klmpk_pengeluaran()
    {
        $inflasiKlmpkPengeluaran = InflasiKlmpkPengeluaran::factory()->create();

        $resp = $this->inflasiKlmpkPengeluaranRepo->delete($inflasiKlmpkPengeluaran->id);

        $this->assertTrue($resp);
        $this->assertNull(InflasiKlmpkPengeluaran::find($inflasiKlmpkPengeluaran->id), 'InflasiKlmpkPengeluaran should not exist in DB');
    }
}
