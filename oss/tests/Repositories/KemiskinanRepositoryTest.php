<?php

namespace Tests\Repositories;

use App\Models\Kemiskinan;
use App\Repositories\KemiskinanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KemiskinanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected KemiskinanRepository $kemiskinanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->kemiskinanRepo = app(KemiskinanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->make()->toArray();

        $createdKemiskinan = $this->kemiskinanRepo->create($kemiskinan);

        $createdKemiskinan = $createdKemiskinan->toArray();
        $this->assertArrayHasKey('id', $createdKemiskinan);
        $this->assertNotNull($createdKemiskinan['id'], 'Created Kemiskinan must have id specified');
        $this->assertNotNull(Kemiskinan::find($createdKemiskinan['id']), 'Kemiskinan with given id must be in DB');
        $this->assertModelData($kemiskinan, $createdKemiskinan);
    }

    /**
     * @test read
     */
    public function test_read_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();

        $dbKemiskinan = $this->kemiskinanRepo->find($kemiskinan->id);

        $dbKemiskinan = $dbKemiskinan->toArray();
        $this->assertModelData($kemiskinan->toArray(), $dbKemiskinan);
    }

    /**
     * @test update
     */
    public function test_update_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();
        $fakeKemiskinan = Kemiskinan::factory()->make()->toArray();

        $updatedKemiskinan = $this->kemiskinanRepo->update($fakeKemiskinan, $kemiskinan->id);

        $this->assertModelData($fakeKemiskinan, $updatedKemiskinan->toArray());
        $dbKemiskinan = $this->kemiskinanRepo->find($kemiskinan->id);
        $this->assertModelData($fakeKemiskinan, $dbKemiskinan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_kemiskinan()
    {
        $kemiskinan = Kemiskinan::factory()->create();

        $resp = $this->kemiskinanRepo->delete($kemiskinan->id);

        $this->assertTrue($resp);
        $this->assertNull(Kemiskinan::find($kemiskinan->id), 'Kemiskinan should not exist in DB');
    }
}
