<?php

namespace App\Repositories;

use App\Models\Kemiskinan;
use App\Repositories\BaseRepository;

class KemiskinanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'pddk_mskn',
        'p0',
        'p1',
        'p2',
        'gk'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Kemiskinan::class;
    }
}
