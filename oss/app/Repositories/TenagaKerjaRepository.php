<?php

namespace App\Repositories;

use App\Models\TenagaKerja;
use App\Repositories\BaseRepository;

class TenagaKerjaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'angkatan_kerja',
        'pengangguran',
        'bkn_angkatan_kerja',
        'sekolah',
        'urus_ruta',
        'tpak',
        'tkk',
        'tpt',
        'lainnya',
        'gender',
        'created'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TenagaKerja::class;
    }
}
