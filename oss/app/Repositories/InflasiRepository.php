<?php

namespace App\Repositories;

use App\Models\Inflasi;
use App\Repositories\BaseRepository;

class InflasiRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'kategori_id',
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
        return Inflasi::class;
    }
}
