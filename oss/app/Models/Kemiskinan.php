<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kemiskinan extends Model
{
    public $table = 'kemiskinan';

    public $fillable = [
        'pddk_mskn',
        'p0',
        'p1',
        'p2',
        'gk',
        'created'
    ];

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'pddk_mskn' => 'nullable',
        'p0' => 'nullable',
        'p1' => 'nullable',
        'p2' => 'nullable',
        'gk' => 'nullable',
        'created' => 'required'
    ];

    
}
