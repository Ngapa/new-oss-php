<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Ketimpangan",
 *      required={"pddk"},
 *      @OA\Property(
 *          property="pddk",
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
 */class Ketimpangan extends Model
{
    use HasFactory;    public $table = 'ketimpangan';

    public $fillable = [
        'pddk',
        'jumlah'
    ];

    protected $casts = [
        'pddk' => 'string'
    ];

    public static $rules = [
        'pddk' => 'required|string',
        'jumlah' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
