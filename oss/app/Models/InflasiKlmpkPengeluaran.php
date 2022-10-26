<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InflasiKlmpkPengeluaran extends Model
{
    public $table = 'inflasi_klmpk_pengeluaran';

    public $fillable = [
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

    
}
