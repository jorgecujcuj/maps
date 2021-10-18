<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGAMOS
use App\Models\Ruta;
use App\Http\Requests\RutaCreateReques;
use App\Http\Requests\RutaEditReques;
/**
 * Class RutaController
 * @package App\Http\Controllers
 */
class RutaController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-ruta|crear-ruta|editar-ruta|borrar-ruta')->only('index');
        $this->middleware('permission:crear-ruta', ['only'=>['create','store']]);
        $this->middleware('permission:editar-ruta', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-ruta', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $texto = trim($request->get('texto'));
        $rutas=Ruta::where('nombre','LIKE','%'.$texto.'%')
        ->orderBy('nombre')
        ->paginate(10);

        return view('ruta.index', compact('rutas','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta = new Ruta();
        return view('ruta.create', compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RutaCreateReques $request)
    {
        request()->validate(Ruta::$rules);

        $ruta = Ruta::create($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::find($id);

        return view('ruta.show', compact('ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta = Ruta::find($id);

        return view('ruta.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ruta $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(RutaEditReques $request, Ruta $ruta)
    {
        //request()->validate(Ruta::$rules);

        //$ruta->update($request->all());
        $data = $request->only('codigo', 'nombre', 'latitud', 'longitud');

        $ruta->update($data);

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta actualizada con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        try {
            //Eliminar registro
            $ruta = Ruta::find($id)->delete();
            $status = 'Ruta eliminada con éxito';
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }

        //Retornar vista
        return redirect()->route('rutas.index')
            ->with('success', $status);
    }
}
