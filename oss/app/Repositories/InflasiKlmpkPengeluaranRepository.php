<?php

namespace App\Repositories;

use App\Models\InflasiKlmpkPengeluaran;
use App\Repositories\BaseRepository;

class InflasiKlmpkPengeluaranRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'sembako',
        'sandang',
        'perumahan',
        'perlengkapan',
        'kesehatan',
        'transportasi',
        'informasi',
        'rekreasi',
        'pendidikan',
        'penyedia_pangan',
        'perawatan_pribadi',
        'total_inflasi',
        'created'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return InflasiKlmpkPengeluaran::class;
    }
}
