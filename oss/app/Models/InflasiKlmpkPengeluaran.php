<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="InflasiKlmpkPengeluaran",
 *      required={},
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
 */class InflasiKlmpkPengeluaran extends Model
{
    use HasFactory;    public $table = 'inflasi_klmpk_pengeluaran';

    public $fillable = [
        'sembako',
        'sandang',
        'perumahan',
        'perlengkapan',
        'kesehatan',
        'transportasi',
        'informasi',
        'rekreasi',
        'pendidikan',
        'penyedia_pangan',
        'perawatan_pribadi',
        'total_inflasi'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'sembako' => 'nullable',
        'sandang' => 'nullable',
        'perumahan' => 'nullable',
        'perlengkapan' => 'nullable',
        'kesehatan' => 'nullable',
        'transportasi' => 'nullable',
        'informasi' => 'nullable',
        'rekreasi' => 'nullable',
        'pendidikan' => 'nullable',
        'penyedia_pangan' => 'nullable',
        'perawatan_pribadi' => 'nullable',
        'total_inflasi' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
