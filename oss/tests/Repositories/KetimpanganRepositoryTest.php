<?php

namespace Tests\Repositories;

use App\Models\Ketimpangan;
use App\Repositories\KetimpanganRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KetimpanganRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected KetimpanganRepository $ketimpanganRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ketimpanganRepo = app(KetimpanganRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->make()->toArray();

        $createdKetimpangan = $this->ketimpanganRepo->create($ketimpangan);

        $createdKetimpangan = $createdKetimpangan->toArray();
        $this->assertArrayHasKey('id', $createdKetimpangan);
        $this->assertNotNull($createdKetimpangan['id'], 'Created Ketimpangan must have id specified');
        $this->assertNotNull(Ketimpangan::find($createdKetimpangan['id']), 'Ketimpangan with given id must be in DB');
        $this->assertModelData($ketimpangan, $createdKetimpangan);
    }

    /**
     * @test read
     */
    public function test_read_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();

        $dbKetimpangan = $this->ketimpanganRepo->find($ketimpangan->id);

        $dbKetimpangan = $dbKetimpangan->toArray();
        $this->assertModelData($ketimpangan->toArray(), $dbKetimpangan);
    }

    /**
     * @test update
     */
    public function test_update_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();
        $fakeKetimpangan = Ketimpangan::factory()->make()->toArray();

        $updatedKetimpangan = $this->ketimpanganRepo->update($fakeKetimpangan, $ketimpangan->id);

        $this->assertModelData($fakeKetimpangan, $updatedKetimpangan->toArray());
        $dbKetimpangan = $this->ketimpanganRepo->find($ketimpangan->id);
        $this->assertModelData($fakeKetimpangan, $dbKetimpangan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ketimpangan()
    {
        $ketimpangan = Ketimpangan::factory()->create();

        $resp = $this->ketimpanganRepo->delete($ketimpangan->id);

        $this->assertTrue($resp);
        $this->assertNull(Ketimpangan::find($ketimpangan->id), 'Ketimpangan should not exist in DB');
    }
}
