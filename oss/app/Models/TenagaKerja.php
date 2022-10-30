<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="TenagaKerja",
 *      required={"gender"},
 *      @OA\Property(
 *          property="gender",
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
 */class TenagaKerja extends Model
{
    use HasFactory;    public $table = 'tenaga_kerja';

    public $fillable = [
        'angkatan_kerja',
        'pengangguran',
        'bkn_angkatan_kerja',
        'sekolah',
        'urus_ruta',
        'tpak',
        'tkk',
        'tpt',
        'lainnya',
        'gender'
    ];

    protected $casts = [
        'gender' => 'string'
    ];

    public static $rules = [
        'angkatan_kerja' => 'nullable',
        'pengangguran' => 'nullable',
        'bkn_angkatan_kerja' => 'nullable',
        'sekolah' => 'nullable',
        'urus_ruta' => 'nullable',
        'tpak' => 'nullable',
        'tkk' => 'nullable',
        'tpt' => 'nullable',
        'lainnya' => 'nullable',
        'gender' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
