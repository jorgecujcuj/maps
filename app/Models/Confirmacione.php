<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Confirmacione
 *
 * @property $id
 * @property $idprogramado
 * @property $latitud
 * @property $longitud
 * @property $abastecida
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Confirmacione extends Model
{
    
    static $rules = [
		'idprogramado' => 'required',
		'latitud' => 'required',
		'longitud' => 'required',
		'abastecida' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idprogramado','latitud','longitud','abastecida','descripcion','created_at'];



}
