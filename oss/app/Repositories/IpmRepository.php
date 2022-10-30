<?php

namespace App\Repositories;

use App\Models\Ipm;
use App\Repositories\BaseRepository;

class IpmRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'uhh',
        'rls',
        'hls',
        'ppp',
        'ipm',
        'pertumbuhan'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ipm::class;
    }
}
