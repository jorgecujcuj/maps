<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use App\Models\Unidade;
use Illuminate\Http\Request;

/**
 * Class PilotoController
 * @package App\Http\Controllers
 */
class PilotoController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-piloto|crear-piloto|editar-piloto|borrar-piloto')->only('index');
        $this->middleware('permission:crear-piloto', ['only'=>['create','store']]);
        $this->middleware('permission:editar-piloto', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-piloto', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilotos = Piloto::paginate(10);

        return view('piloto.index', compact('pilotos'))
            ->with('i', (request()->input('page', 1) - 1) * $pilotos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::orderBy('placa')->get();
        $piloto = new Piloto();
        return view('piloto.create', compact('piloto','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Piloto::$rules);

        $piloto = Piloto::create($request->all());

        return redirect()->route('pilotos.index')
            ->with('success', 'Piloto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $piloto = Piloto::find($id);

        return view('piloto.show', compact('piloto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidades = Unidade::orderBy('placa')->get();
        $piloto = Piloto::find($id);

        return view('piloto.edit', compact('piloto','unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Piloto $piloto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piloto $piloto)
    {
        request()->validate(Piloto::$rules);

        $piloto->update($request->all());

        return redirect()->route('pilotos.index')
            ->with('success', 'Piloto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $piloto = Piloto::find($id)->delete();

        return redirect()->route('pilotos.index')
            ->with('success', 'Piloto deleted successfully');
    }
}
