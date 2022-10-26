<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengangguran extends Model
{
    public $table = 'pengangguran';

    public $fillable = [
        'tpak',
        'tpt',
        'created'
    ];

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'tpak' => 'nullable',
        'tpt' => 'nullable',
        'created' => 'required'
    ];

    
}
