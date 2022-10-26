<?php

namespace App\Repositories;

use App\Models\Pdrb;
use App\Repositories\BaseRepository;

class PdrbRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'kategori_id',
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
        'm_n',
        'o',
        'p',
        'q',
        'r_s_t_u',
        'total_pdrb',
        'created'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Pdrb::class;
    }
}
