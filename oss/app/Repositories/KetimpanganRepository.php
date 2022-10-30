<?php

namespace App\Repositories;

use App\Models\Ketimpangan;
use App\Repositories\BaseRepository;

class KetimpanganRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'pddk',
        'jumlah'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ketimpangan::class;
    }
}
