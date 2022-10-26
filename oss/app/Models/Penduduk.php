<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    public $table = 'penduduk';

    public $fillable = [
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
        'm',
        'n',
        'o',
        'p',
        'total',
        'created'
    ];

    protected $casts = [
        'created' => 'date'
    ];

    public static $rules = [
        'a' => 'required',
        'b' => 'required',
        'c' => 'required',
        'd' => 'required',
        'e' => 'required',
        'f' => 'required',
        'g' => 'required',
        'h' => 'required',
        'i' => 'required',
        'j' => 'required',
        'k' => 'required',
        'l' => 'required',
        'm' => 'required',
        'n' => 'required',
        'o' => 'required',
        'p' => 'required',
        'total' => 'required',
        'created' => 'required'
    ];

    
}
