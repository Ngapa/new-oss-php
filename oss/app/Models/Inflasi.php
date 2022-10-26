<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inflasi extends Model
{
    public $table = 'inflasi';

    public $fillable = [
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

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'kategori_id' => 'required',
        'sembako' => 'nullable',
        'sandang' => 'nullable',
        'perumahan' => 'nullable',
        'perlengkapan' => 'nullable',
        'kesehatan' => 'nullable',
        'transportasi' => 'nullable',
        'informasi' => 'nullable',
        'rekreasi' => 'nullable',
        'pendidikan' => 'nullable',
        'penyedia_pangan' => 'nullable',
        'perawatan_pribadi' => 'nullable',
        'total_inflasi' => 'nullable',
        'created' => 'required'
    ];

    public function kategori(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id');
    }
}
