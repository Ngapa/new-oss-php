<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * @OA\Schema(
 *      schema="Penduduk",
 *      required={"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","total"},
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
 */class Penduduk extends Model
{
    use HasFactory;    public $table = 'penduduk';

    public $fillable = [
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
        'm',
        'n',
        'o',
        'p',
        'total'
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        'a' => 'required',
        'b' => 'required',
        'c' => 'required',
        'd' => 'required',
        'e' => 'required',
        'f' => 'required',
        'g' => 'required',
        'h' => 'required',
        'i' => 'required',
        'j' => 'required',
        'k' => 'required',
        'l' => 'required',
        'm' => 'required',
        'n' => 'required',
        'o' => 'required',
        'p' => 'required',
        'total' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
