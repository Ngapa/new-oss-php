<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InflasiKota extends Model
{
    public $table = 'inflasi_kota';

    public $fillable = [
        'nama_kota',
        'mtom',
        'ytod',
        'ytoy',
        'total',
        'created'
    ];

    protected $casts = [
        'nama_kota' => 'string',
        'created' => 'date'
    ];

    public static $rules = [
        'nama_kota' => 'required|string',
        'mtom' => 'nullable',
        'ytod' => 'nullable',
        'ytoy' => 'nullable',
        'total' => 'nullable',
        'created' => 'required'
    ];

    
}
