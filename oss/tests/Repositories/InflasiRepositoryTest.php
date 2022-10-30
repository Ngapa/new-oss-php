<?php

namespace Tests\Repositories;

use App\Models\Inflasi;
use App\Repositories\InflasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InflasiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected InflasiRepository $inflasiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->inflasiRepo = app(InflasiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_inflasi()
    {
        $inflasi = Inflasi::factory()->make()->toArray();

        $createdInflasi = $this->inflasiRepo->create($inflasi);

        $createdInflasi = $createdInflasi->toArray();
        $this->assertArrayHasKey('id', $createdInflasi);
        $this->assertNotNull($createdInflasi['id'], 'Created Inflasi must have id specified');
        $this->assertNotNull(Inflasi::find($createdInflasi['id']), 'Inflasi with given id must be in DB');
        $this->assertModelData($inflasi, $createdInflasi);
    }

    /**
     * @test read
     */
    public function test_read_inflasi()
    {
        $inflasi = Inflasi::factory()->create();

        $dbInflasi = $this->inflasiRepo->find($inflasi->id);

        $dbInflasi = $dbInflasi->toArray();
        $this->assertModelData($inflasi->toArray(), $dbInflasi);
    }

    /**
     * @test update
     */
    public function test_update_inflasi()
    {
        $inflasi = Inflasi::factory()->create();
        $fakeInflasi = Inflasi::factory()->make()->toArray();

        $updatedInflasi = $this->inflasiRepo->update($fakeInflasi, $inflasi->id);

        $this->assertModelData($fakeInflasi, $updatedInflasi->toArray());
        $dbInflasi = $this->inflasiRepo->find($inflasi->id);
        $this->assertModelData($fakeInflasi, $dbInflasi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_inflasi()
    {
        $inflasi = Inflasi::factory()->create();

        $resp = $this->inflasiRepo->delete($inflasi->id);

        $this->assertTrue($resp);
        $this->assertNull(Inflasi::find($inflasi->id), 'Inflasi should not exist in DB');
    }
}
