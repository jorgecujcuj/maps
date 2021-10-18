<?php

namespace App\Http\Controllers;
/*AGREGUE*/
use App\Models\Confirmacione;
use App\Models\Programado;
use Illuminate\Http\Request;
use App\Http\Requests\ConfirmacioneCreateRequest;
use App\Http\Requests\ConfirmacioneEditRequest;


/**
 * Class ConfirmacioneController
 * @package App\Http\Controllers
 */
class ConfirmacioneController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-confirmacion|crear-confirmacion|editar-confirmacion|borrar-confirmacion')->only('index');
        $this->middleware('permission:crear-confirmacion', ['only'=>['create','store']]);
        $this->middleware('permission:editar-confirmacion', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-confirmacion', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmaciones = Confirmacione::orderBy('id','desc')->paginate(10);

        return view('confirmacione.index', compact('confirmaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $confirmaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $confirmacione = new Confirmacione();
        $programados = Programado::orderBy('id','desc')->get();

        return view('confirmacione.create', compact('confirmacione','programados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConfirmacioneCreateRequest $request)
    {
        request()->validate(Confirmacione::$rules);

        $confirmacione = Confirmacione::create($request->all());

        return redirect()->route('confirmaciones.index')
            ->with('success', 'Confirmacione creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confirmacione = Confirmacione::find($id);

        return view('confirmacione.show', compact('confirmacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $confirmacione = Confirmacione::find($id);
        $programados = Programado::orderBy('id','desc')->get();

        return view('confirmacione.edit', compact('confirmacione','programados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Confirmacione $confirmacione
     * @return \Illuminate\Http\Response
     */
    public function update(ConfirmacioneEditRequest $request, Confirmacione $confirmacione)
    {
        //
        $data = $request->only('idprogramado', 'latitud', 'longitud','abastecida','descripcion');

        $confirmacione->update($data);

        return redirect()->route('confirmaciones.index')
            ->with('success', 'Confirmacion actualizada con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $confirmacione = Confirmacione::find($id)->delete();

        return redirect()->route('confirmaciones.index')
            ->with('success', 'Confirmacion eliminada con éxito.');
    }
}
