<?php

namespace App\Repositories;

use App\Models\PendudukKecamatan;
use App\Repositories\BaseRepository;

class PendudukKecamatanRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'kecamatan',
        'lk',
        'pr',
        'total',
        'rasio_jk'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PendudukKecamatan::class;
    }
}
