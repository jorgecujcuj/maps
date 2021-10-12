<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidade
 *
 * @property $id
 * @property $codigo
 * @property $placa
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidade extends Model
{
    
    static $rules = [
		'codigo' => 'required|unique:unidades,codigo',
		'placa' => 'required|unique:unidades,placa',
		'capacidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','placa','capacidad'];

    /**
     *@return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function piloto()
    {
        return $this->hasMany('App\Models\Piloto', 'idunidad','id');
    }

}
