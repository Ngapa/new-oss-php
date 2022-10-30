<?php

namespace App\Repositories;

use App\Models\InflasiKota;
use App\Repositories\BaseRepository;

class InflasiKotaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama_kota',
        'mtom',
        'ytod',
        'ytoy',
        'total'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return InflasiKota::class;
    }
}
