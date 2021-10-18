<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGAMOS
use App\Models\Finca;
use App\Models\Ruta;
use App\Http\Requests\FincaCreateReques;
use App\Http\Requests\FincaEditReques;

class FincaController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-finca|crear-finca|editar-finca|borrar-finca')->only('index');
        $this->middleware('permission:crear-finca', ['only'=>['create','store']]);
        $this->middleware('permission:editar-finca', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-finca', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fincas = Finca::orderBy('nombre')->paginate(10);

        return view('fincas.index', compact('fincas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rutas = Ruta::orderBy('nombre')->get();

        return view('fincas.crear', compact('rutas'));
        //return $ruta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FincaCreateReques $request)
    {
        //
        $finca = Finca::create($request->only('codigo', 'nombre', 'administracion','idruta'));

        return redirect()->route('fincas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Finca $finca)
    {
        //
        $rutas = Ruta::orderBy('nombre')->get();

        return view('fincas.editar', compact('finca','rutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FincaEditReques $request, Finca $finca)
    {
        //
        $data = $request->only('codigo', 'nombre', 'administracion','idruta');

        $finca->update($data);

        return redirect()->route('fincas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$finca->delete();
        //return redirect()->route('fincas.index');
        try {
            //Eliminar registro
            $finca = Finca::find($id)->delete();
            $status = 'Finca eliminada con éxito';
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }

        //Retornar vista
        return redirect()->route('fincas.index')
            ->with('success', $status);

    }
}
