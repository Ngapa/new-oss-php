<?php

namespace App\Repositories;

use App\Models\Penduduk;
use App\Repositories\BaseRepository;

class PendudukRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'total'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Penduduk::class;
    }
}
