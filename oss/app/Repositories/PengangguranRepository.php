<?php

namespace App\Repositories;

use App\Models\Pengangguran;
use App\Repositories\BaseRepository;

class PengangguranRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tpak',
        'tpt'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Pengangguran::class;
    }
}
