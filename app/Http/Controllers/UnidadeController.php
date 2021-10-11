<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGAMOS
use App\Models\Unidade;

/**
 * Class UnidadeController
 * @package App\Http\Controllers
 */
class UnidadeController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-unidad|crear-unidad|editar-unidad|borrar-unidad')->only('index');
        $this->middleware('permission:crear-unidad', ['only'=>['create','store']]);
        $this->middleware('permission:editar-unidad', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-unidad', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidade::paginate(10);

        return view('unidade.index', compact('unidades'))
            ->with('i', (request()->input('page', 1) - 1) * $unidades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidade = new Unidade();
        return view('unidade.create', compact('unidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Unidade::$rules);

        $unidade = Unidade::create($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidade = Unidade::find($id);

        return view('unidade.show', compact('unidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidade = Unidade::find($id);

        return view('unidade.edit', compact('unidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Unidade $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        request()->validate(Unidade::$rules);

        $unidade->update($request->all());

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unidade = Unidade::find($id)->delete();

        return redirect()->route('unidades.index')
            ->with('success', 'Unidade deleted successfully');
    }
}
