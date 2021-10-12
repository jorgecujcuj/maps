<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $latitud
 * @property $longitud
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ruta extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'nombre' => 'required',
		'latitud' => 'required|numeric',
		'longitud' => 'required|numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','latitud','longitud'];



}
