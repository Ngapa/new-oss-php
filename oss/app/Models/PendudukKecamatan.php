<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="PendudukKecamatan",
 *      required={"kecamatan","lk","pr","total","rasio_jk"},
 *      @OA\Property(
 *          property="kecamatan",
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
 */class PendudukKecamatan extends Model
{
    use HasFactory;    public $table = 'penduduk_kecamatan';

    public $fillable = [
        'kecamatan',
        'lk',
        'pr',
        'total',
        'rasio_jk'
    ];

    protected $casts = [
        'kecamatan' => 'string'
    ];

    public static $rules = [
        'kecamatan' => 'required|string',
        'lk' => 'required',
        'pr' => 'required',
        'total' => 'required',
        'rasio_jk' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
