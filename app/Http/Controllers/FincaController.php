<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//AGREGAMOS
use App\Models\Finca;

class FincaController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-finca | crear-finca | editar-finca | borrar-finca')->only('index');
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
        $fincas = Finca::paginate(10);
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
        return view('fincas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //protected $fillable = ['codigo','nombre','administracion','idruta'];
        request()->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'administracion' => 'required',
        ]);

        Finca::create($request->all());
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
        return view('fincas.editar', compact('finca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finca $finca)
    {
        //
        request()->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'administracion' => 'required',
        ]);
        $finca->update($request->all());
        return redirect()->route('fincas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finca $finca)
    {
        //
        $finca->delete();
        return redirect()->return('fincas.index');
    }
}
