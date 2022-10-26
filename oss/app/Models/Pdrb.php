<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdrb extends Model
{
    public $table = 'pdrb';

    public $fillable = [
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

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'kategori_id' => 'required',
        'a' => 'nullable',
        'b' => 'nullable',
        'c' => 'nullable',
        'd' => 'nullable',
        'e' => 'nullable',
        'f' => 'nullable',
        'g' => 'nullable',
        'h' => 'nullable',
        'i' => 'nullable',
        'j' => 'nullable',
        'k' => 'nullable',
        'l' => 'nullable',
        'm_n' => 'nullable',
        'o' => 'nullable',
        'p' => 'nullable',
        'q' => 'nullable',
        'r_s_t_u' => 'nullable',
        'total_pdrb' => 'nullable',
        'created' => 'required'
    ];

    public function kategori(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id');
    }
}
