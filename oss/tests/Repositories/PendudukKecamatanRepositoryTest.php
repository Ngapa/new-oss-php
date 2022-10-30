<?php

namespace Tests\Repositories;

use App\Models\PendudukKecamatan;
use App\Repositories\PendudukKecamatanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PendudukKecamatanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected PendudukKecamatanRepository $pendudukKecamatanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pendudukKecamatanRepo = app(PendudukKecamatanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->make()->toArray();

        $createdPendudukKecamatan = $this->pendudukKecamatanRepo->create($pendudukKecamatan);

        $createdPendudukKecamatan = $createdPendudukKecamatan->toArray();
        $this->assertArrayHasKey('id', $createdPendudukKecamatan);
        $this->assertNotNull($createdPendudukKecamatan['id'], 'Created PendudukKecamatan must have id specified');
        $this->assertNotNull(PendudukKecamatan::find($createdPendudukKecamatan['id']), 'PendudukKecamatan with given id must be in DB');
        $this->assertModelData($pendudukKecamatan, $createdPendudukKecamatan);
    }

    /**
     * @test read
     */
    public function test_read_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();

        $dbPendudukKecamatan = $this->pendudukKecamatanRepo->find($pendudukKecamatan->id);

        $dbPendudukKecamatan = $dbPendudukKecamatan->toArray();
        $this->assertModelData($pendudukKecamatan->toArray(), $dbPendudukKecamatan);
    }

    /**
     * @test update
     */
    public function test_update_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();
        $fakePendudukKecamatan = PendudukKecamatan::factory()->make()->toArray();

        $updatedPendudukKecamatan = $this->pendudukKecamatanRepo->update($fakePendudukKecamatan, $pendudukKecamatan->id);

        $this->assertModelData($fakePendudukKecamatan, $updatedPendudukKecamatan->toArray());
        $dbPendudukKecamatan = $this->pendudukKecamatanRepo->find($pendudukKecamatan->id);
        $this->assertModelData($fakePendudukKecamatan, $dbPendudukKecamatan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_penduduk_kecamatan()
    {
        $pendudukKecamatan = PendudukKecamatan::factory()->create();

        $resp = $this->pendudukKecamatanRepo->delete($pendudukKecamatan->id);

        $this->assertTrue($resp);
        $this->assertNull(PendudukKecamatan::find($pendudukKecamatan->id), 'PendudukKecamatan should not exist in DB');
    }
}
