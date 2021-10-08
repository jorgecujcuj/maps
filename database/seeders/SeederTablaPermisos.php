<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            //tabla fincas
            'ver-finca',
            'crear-finca',
            'editar-finca',
            'borrar-finca',
        ];
        
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
