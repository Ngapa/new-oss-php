<?php

namespace App\Repositories;

use App\Models\Kategori;
use App\Repositories\BaseRepository;

class KategoriRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama',
        'deskripsi'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Kategori::class;
    }
}
