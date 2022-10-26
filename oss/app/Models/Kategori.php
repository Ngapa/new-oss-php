<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public $table = 'kategoris';

    public $fillable = [
        'nama',
        'deskripsi'
    ];

    protected $casts = [
        'nama' => 'string',
        'deskripsi' => 'string'
    ];

    public static $rules = [
        'nama' => 'required|string',
        'deskripsi' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function inflasis(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Inflasi::class, 'kategori_id');
    }

    public function pdrbs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Pdrb::class, 'kategori_id');
    }
}
