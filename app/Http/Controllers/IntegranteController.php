<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Integrante;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IntegranteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Administrador',['only'=>['create','store','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Integrantes = \DB::table('integrantes')->paginate(10);
       return view('FIntegrantes.I_index',compact('Integrantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Equipos = Equipo::all();
        $Integrantes = Integrante::all();
        return view('FIntegrantes.I_create',compact('Equipos','Integrantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $Integrantes = new Integrante;
        $now = Carbon::now();
        $Integrantes->Nombre = $request->Nombre;
        $Integrantes->ApellidoP = $request->ApellidoP;
        $Integrantes->ApellidoM = $request->ApellidoM;
        $Integrantes->Posicion = $request->Posicion;
        $Integrantes->Edad = $request->Edad;
        $Integrantes->registro = $now;
        $Integrantes->equipo_id = $request->equipo_id;
        $Integrantes->save();
        return redirect('Equipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function show(Integrante $integrante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Integrante = Integrante::findOrfail($id);
        $Equipos = Equipo::all();
        return view('FIntegrantes.I_create',compact('Integrante','Equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $Integrantes = Integrante::findOrFail($id);
        $now = Carbon::now();
        //dd($Puntos);
        $Integrantes->Nombre = $request->Nombre;
        $Integrantes->ApellidoP = $request->ApellidoP;
        $Integrantes->ApellidoM = $request->ApellidoM;
        $Integrantes->Posicion = $request->Posicion;
        $Integrantes->Edad = $request->Edad;
        $Integrantes->registro = $now;
        $Integrantes->equipo_id = $request->equipo_id;
        $Integrantes->save();
       
        return redirect()->route('Equipos.show',  $Integrantes->equipo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Integrante  $integrante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     
        
        $Integrante = Integrante::findOrfail($id);
        //if(Storage ::delete('public/'.$Equipo->Logo)){
            Integrante::destroy($id);
       // }
     
       return redirect()->route('Equipos.show', $Integrante->equipo_id);
    }
}
