<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Pengangguran",
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
 */class Pengangguran extends Model
{
    use HasFactory;    public $table = 'pengangguran';

    public $fillable = [
        'tpak',
        'tpt'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'tpak' => 'nullable',
        'tpt' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
