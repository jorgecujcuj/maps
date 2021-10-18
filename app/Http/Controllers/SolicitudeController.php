<?php

namespace App\Http\Controllers;
/*AGREGUE*/
use App\Models\Solicitude;
use App\Models\Unidade;
use App\Models\Finca;
use App\Models\Piloto;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudCreateRequest;
use App\Http\Requests\SolicitudEditRequest;

/**
 * Class SolicitudeController
 * @package App\Http\Controllers
 */
class SolicitudeController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-solicitud|crear-solicitud|editar-solicitud|borrar-solicitud')->only('index');
        $this->middleware('permission:crear-solicitud', ['only'=>['create','store']]);
        $this->middleware('permission:editar-solicitud', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-solicitud', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Solicitude::orderBy('id','desc')->paginate(10);

        return view('solicitude.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fincas = Finca::orderBy('nombre')->get();
        $pilotos = Piloto::orderBy('nombre')->get();
        $solicitude = new Solicitude();
        return view('solicitude.create', compact('solicitude','fincas','pilotos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudCreateRequest $request)
    {
        request()->validate(Solicitude::$rules);

        $solicitude = Solicitude::create($request->all());

        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitude = Solicitude::find($id);

        return view('solicitude.show', compact('solicitude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fincas = Finca::orderBy('nombre')->get();
        $pilotos = Piloto::orderBy('nombre')->get();
        $solicitude = Solicitude::find($id);

        //return $solicitude;

        return view('solicitude.edit', compact('solicitude','fincas','pilotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Solicitude $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(SolicitudEditRequest $request, Solicitude $solicitude)
    {
        //request()->validate(Solicitude::$rules);

        //$solicitude->update($request->all());
        $data = $request->only('idfinca', 'idpiloto', 'fechasolicitada','telefono','observacion');

        $solicitude->update($data);

        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud actualizada con éxito.');
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
            $solicitude = Solicitude::find($id)->delete();
            $status = 'Solicitud eliminada con éxito';
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }

        //Retornar vista
        return redirect()->route('solicitudes.index')
            ->with('success', $status);

    }
}
