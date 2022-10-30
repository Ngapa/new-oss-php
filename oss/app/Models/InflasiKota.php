<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="InflasiKota",
 *      required={"nama_kota"},
 *      @OA\Property(
 *          property="nama_kota",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class InflasiKota extends Model
{
    use HasFactory;    public $table = 'inflasi_kota';

    public $fillable = [
        'nama_kota',
        'mtom',
        'ytod',
        'ytoy',
        'total'
    ];

    protected $casts = [
        'nama_kota' => 'string'
    ];

    public static $rules = [
        'nama_kota' => 'required|string',
        'mtom' => 'nullable',
        'ytod' => 'nullable',
        'ytoy' => 'nullable',
        'total' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
