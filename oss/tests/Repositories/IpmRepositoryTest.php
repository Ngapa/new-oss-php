<?php

namespace Tests\Repositories;

use App\Models\Ipm;
use App\Repositories\IpmRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IpmRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected IpmRepository $ipmRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ipmRepo = app(IpmRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ipm()
    {
        $ipm = Ipm::factory()->make()->toArray();

        $createdIpm = $this->ipmRepo->create($ipm);

        $createdIpm = $createdIpm->toArray();
        $this->assertArrayHasKey('id', $createdIpm);
        $this->assertNotNull($createdIpm['id'], 'Created Ipm must have id specified');
        $this->assertNotNull(Ipm::find($createdIpm['id']), 'Ipm with given id must be in DB');
        $this->assertModelData($ipm, $createdIpm);
    }

    /**
     * @test read
     */
    public function test_read_ipm()
    {
        $ipm = Ipm::factory()->create();

        $dbIpm = $this->ipmRepo->find($ipm->id);

        $dbIpm = $dbIpm->toArray();
        $this->assertModelData($ipm->toArray(), $dbIpm);
    }

    /**
     * @test update
     */
    public function test_update_ipm()
    {
        $ipm = Ipm::factory()->create();
        $fakeIpm = Ipm::factory()->make()->toArray();

        $updatedIpm = $this->ipmRepo->update($fakeIpm, $ipm->id);

        $this->assertModelData($fakeIpm, $updatedIpm->toArray());
        $dbIpm = $this->ipmRepo->find($ipm->id);
        $this->assertModelData($fakeIpm, $dbIpm->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ipm()
    {
        $ipm = Ipm::factory()->create();

        $resp = $this->ipmRepo->delete($ipm->id);

        $this->assertTrue($resp);
        $this->assertNull(Ipm::find($ipm->id), 'Ipm should not exist in DB');
    }
}
