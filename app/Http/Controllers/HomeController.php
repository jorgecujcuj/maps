<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**AGREGUE*/
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Ruta;
use App\Models\Finca;
use App\Models\Unidade;
use App\Models\Piloto;
use App\Models\Solicitude;
use App\Models\Programado;
use App\Models\Confirmacione;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cant_usuarios = User::count();
        $cant_roles = Role::count();
        $cant_rutas = Ruta::count();
        $cant_fincas = Finca::count();
        $cant_unidades = Unidade::count();
        $cant_pilotos = Piloto::count();
        $cant_solicitude = Solicitude::count();
        $cant_programado = Programado::count();
        $cant_confirmacion = Confirmacione::count();
        return view('home', compact('cant_usuarios','cant_roles','cant_rutas','cant_fincas',
        'cant_unidades','cant_pilotos','cant_solicitude','cant_programado','cant_confirmacion'));
        //return $cant_usuarios;
    }
}
