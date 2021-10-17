<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//AGREGAR spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //tabla fincas
            'ver-finca',
            'crear-finca',
            'editar-finca',
            'borrar-finca',
            //tabla unidad
            'ver-unidad',
            'crear-unidad',
            'editar-unidad',
            'borrar-unidad',
            //tabla piloto
            'ver-piloto',
            'crear-piloto',
            'editar-piloto',
            'borrar-piloto',
            //tabla ruta
            'ver-ruta',
            'crear-ruta',
            'editar-ruta',
            'borrar-ruta',
            //tabla ruta
            'ver-solicitud',
            'crear-solicitud',
            'editar-solicitud',
            'borrar-solicitud'

        ];
        
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
