<?php

namespace Tests\Repositories;

use App\Models\Pdrb;
use App\Repositories\PdrbRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PdrbRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected PdrbRepository $pdrbRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pdrbRepo = app(PdrbRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pdrb()
    {
        $pdrb = Pdrb::factory()->make()->toArray();

        $createdPdrb = $this->pdrbRepo->create($pdrb);

        $createdPdrb = $createdPdrb->toArray();
        $this->assertArrayHasKey('id', $createdPdrb);
        $this->assertNotNull($createdPdrb['id'], 'Created Pdrb must have id specified');
        $this->assertNotNull(Pdrb::find($createdPdrb['id']), 'Pdrb with given id must be in DB');
        $this->assertModelData($pdrb, $createdPdrb);
    }

    /**
     * @test read
     */
    public function test_read_pdrb()
    {
        $pdrb = Pdrb::factory()->create();

        $dbPdrb = $this->pdrbRepo->find($pdrb->id);

        $dbPdrb = $dbPdrb->toArray();
        $this->assertModelData($pdrb->toArray(), $dbPdrb);
    }

    /**
     * @test update
     */
    public function test_update_pdrb()
    {
        $pdrb = Pdrb::factory()->create();
        $fakePdrb = Pdrb::factory()->make()->toArray();

        $updatedPdrb = $this->pdrbRepo->update($fakePdrb, $pdrb->id);

        $this->assertModelData($fakePdrb, $updatedPdrb->toArray());
        $dbPdrb = $this->pdrbRepo->find($pdrb->id);
        $this->assertModelData($fakePdrb, $dbPdrb->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pdrb()
    {
        $pdrb = Pdrb::factory()->create();

        $resp = $this->pdrbRepo->delete($pdrb->id);

        $this->assertTrue($resp);
        $this->assertNull(Pdrb::find($pdrb->id), 'Pdrb should not exist in DB');
    }
}
