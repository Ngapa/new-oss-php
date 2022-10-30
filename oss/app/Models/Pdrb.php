<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Pdrb",
 *      required={"kategori_id"},
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
 */class Pdrb extends Model
{
    use HasFactory;    public $table = 'pdrb';

    public $fillable = [
        'kategori_id',
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
        'm_n',
        'o',
        'p',
        'q',
        'r_s_t_u',
        'total_pdrb'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'kategori_id' => 'required',
        'a' => 'nullable',
        'b' => 'nullable',
        'c' => 'nullable',
        'd' => 'nullable',
        'e' => 'nullable',
        'f' => 'nullable',
        'g' => 'nullable',
        'h' => 'nullable',
        'i' => 'nullable',
        'j' => 'nullable',
        'k' => 'nullable',
        'l' => 'nullable',
        'm_n' => 'nullable',
        'o' => 'nullable',
        'p' => 'nullable',
        'q' => 'nullable',
        'r_s_t_u' => 'nullable',
        'total_pdrb' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function kategori(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id');
    }
}
