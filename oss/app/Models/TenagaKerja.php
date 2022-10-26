<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    public $table = 'tenaga_kerja';

    public $fillable = [
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

    protected $casts = [
        'gender' => 'string',
        'created' => 'date'
    ];

    public static $rules = [
        'angkatan_kerja' => 'nullable',
        'pengangguran' => 'nullable',
        'bkn_angkatan_kerja' => 'nullable',
        'sekolah' => 'nullable',
        'urus_ruta' => 'nullable',
        'tpak' => 'nullable',
        'tkk' => 'nullable',
        'tpt' => 'nullable',
        'lainnya' => 'nullable',
        'gender' => 'required|string',
        'created' => 'required'
    ];

    
}
