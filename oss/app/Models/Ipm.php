<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ipm extends Model
{
    public $table = 'ipm';

    public $fillable = [
        'uhh',
        'rls',
        'hls',
        'ppp',
        'ipm',
        'pertumbuhan',
        'created'
    ];

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'uhh' => 'nullable',
        'rls' => 'nullable',
        'hls' => 'nullable',
        'ppp' => 'nullable',
        'ipm' => 'nullable',
        'pertumbuhan' => 'nullable',
        'created' => 'required'
    ];

    
}
