<?php

namespace App\Http\Controllers;
/*AGREGUE*/
use App\Models\Programado;
use App\Models\Solicitude;
use App\Models\Finca;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramadoCreateRequest;
use App\Http\Requests\ProgramadoEditRequest;

/**
 * Class ProgramadoController
 * @package App\Http\Controllers
 */
class ProgramadoController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-programados|crear-programados|editar-programados|borrar-programados')->only('index');
        $this->middleware('permission:crear-programados', ['only'=>['create','store']]);
        $this->middleware('permission:editar-programados', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-programados', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programados = Programado::orderBy('id','desc')->paginate(10);

        return view('programado.index', compact('programados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programado = new Programado();
        $solicitudes = Solicitude::orderBy('fechasolicitada','desc')->get();
        $fincas = Finca::orderBy('nombre')->get();
        $unidades = Unidade::orderBy('placa')->get();

        return view('programado.create', compact('programado','solicitudes','fincas','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramadoCreateRequest $request)
    {
        request()->validate(Programado::$rules);

        $programado = Programado::create($request->all());

        return redirect()->route('programados.index')
            ->with('success', 'Solicitud programada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programado = Programado::find($id);

        return view('programado.show', compact('programado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programado = Programado::find($id);
        $solicitudes = Solicitude::orderBy('fechasolicitada','desc')->get();
        $fincas = Finca::orderBy('nombre')->get();
        $unidades = Unidade::orderBy('placa')->get();

        return view('programado.edit', compact('programado','solicitudes','fincas','unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Programado $programado
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramadoEditRequest $request, Programado $programado)
    {
        //request()->validate(Programado::$rules);

        //$programado->update($request->all());
        $data = $request->only('idsolicitud', 'operador', 'estado','idfinca','idunidad','salida');

        $programado->update($data);

        return redirect()->route('programados.index')
            ->with('success', 'Solicitud programado actualizada con éxito.');
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
                $programado = Programado::find($id)->delete();
                $status = 'Solicitud programada eliminada con éxito';
            } catch (\Illuminate\Database\QueryException $e) {
                $status = 'Registro relacionado, imposible de eliminar';
            }
    
            //Retornar vista
            return redirect()->route('programados.index')
                ->with('success', $status);
    }
}
