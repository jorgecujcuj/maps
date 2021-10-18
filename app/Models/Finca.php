<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    use HasFactory;
    protected $fillable = ['codigo','nombre','administracion','idruta'];

    /**
     *@return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programado()
    {
        return $this->hasMany('App\Models\Programado', 'idfinca','id');
    }

}

   