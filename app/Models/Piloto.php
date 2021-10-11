<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Piloto
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Piloto extends Model
{
    
    static $rules = [
		'codigo' => 'required|unique:pilotos,codigo',
		'nombre' => 'required|unique:pilotos,nombre',
    'idunidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','idunidad'];



}
