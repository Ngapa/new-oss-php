<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketimpangan extends Model
{
    public $table = 'ketimpangan';

    public $fillable = [
        'pddk',
        'jumlah',
        'created'
    ];

    protected $casts = [
        'pddk' => 'string',
        'created' => 'date'
    ];

    public static $rules = [
        'pddk' => 'required|string',
        'jumlah' => 'nullable',
        'created' => 'required'
    ];

    
}
