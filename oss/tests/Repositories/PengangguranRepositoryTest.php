<?php

namespace Tests\Repositories;

use App\Models\Pengangguran;
use App\Repositories\PengangguranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PengangguranRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected PengangguranRepository $pengangguranRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pengangguranRepo = app(PengangguranRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->make()->toArray();

        $createdPengangguran = $this->pengangguranRepo->create($pengangguran);

        $createdPengangguran = $createdPengangguran->toArray();
        $this->assertArrayHasKey('id', $createdPengangguran);
        $this->assertNotNull($createdPengangguran['id'], 'Created Pengangguran must have id specified');
        $this->assertNotNull(Pengangguran::find($createdPengangguran['id']), 'Pengangguran with given id must be in DB');
        $this->assertModelData($pengangguran, $createdPengangguran);
    }

    /**
     * @test read
     */
    public function test_read_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();

        $dbPengangguran = $this->pengangguranRepo->find($pengangguran->id);

        $dbPengangguran = $dbPengangguran->toArray();
        $this->assertModelData($pengangguran->toArray(), $dbPengangguran);
    }

    /**
     * @test update
     */
    public function test_update_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();
        $fakePengangguran = Pengangguran::factory()->make()->toArray();

        $updatedPengangguran = $this->pengangguranRepo->update($fakePengangguran, $pengangguran->id);

        $this->assertModelData($fakePengangguran, $updatedPengangguran->toArray());
        $dbPengangguran = $this->pengangguranRepo->find($pengangguran->id);
        $this->assertModelData($fakePengangguran, $dbPengangguran->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pengangguran()
    {
        $pengangguran = Pengangguran::factory()->create();

        $resp = $this->pengangguranRepo->delete($pengangguran->id);

        $this->assertTrue($resp);
        $this->assertNull(Pengangguran::find($pengangguran->id), 'Pengangguran should not exist in DB');
    }
}
