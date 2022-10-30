<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Kemiskinan",
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
 */class Kemiskinan extends Model
{
    use HasFactory;    public $table = 'kemiskinan';

    public $fillable = [
        'pddk_mskn',
        'p0',
        'p1',
        'p2',
        'gk'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'pddk_mskn' => 'nullable',
        'p0' => 'nullable',
        'p1' => 'nullable',
        'p2' => 'nullable',
        'gk' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
