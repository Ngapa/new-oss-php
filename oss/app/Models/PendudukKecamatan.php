<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendudukKecamatan extends Model
{
    public $table = 'penduduk_kecamatan';

    public $fillable = [
        'kecamatan',
        'lk',
        'pr',
        'total',
        'rasio_jk',
        'created'
    ];

    protected $casts = [
        'kecamatan' => 'string',
        'created' => 'date'
    ];

    public static $rules = [
        'kecamatan' => 'required|string',
        'lk' => 'required',
        'pr' => 'required',
        'total' => 'required',
        'rasio_jk' => 'required',
        'created' => 'required'
    ];

    
}
