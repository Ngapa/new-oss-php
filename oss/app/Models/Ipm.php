<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Ipm",
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
 */class Ipm extends Model
{
    use HasFactory;    public $table = 'ipm';

    public $fillable = [
        'uhh',
        'rls',
        'hls',
        'ppp',
        'ipm',
        'pertumbuhan'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'uhh' => 'nullable',
        'rls' => 'nullable',
        'hls' => 'nullable',
        'ppp' => 'nullable',
        'ipm' => 'nullable',
        'pertumbuhan' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
