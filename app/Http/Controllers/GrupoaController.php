<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Grupoa;
use App\Grupob;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrupoaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Administrador',['only'=>['index','create','store','show','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FGrupos.G_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FPartidos.P_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $GA = new Grupoa;
        $EquiposA = Equipo::where('Grupo_id', 2)->get(['id']);
        
        foreach ($EquiposA as $EA) {
            \DB::table('grupoas')->insert([
                ['equipo_id' => $EA->id],
            ]);
        }
       
        return view('FPartidos.P_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupoa  $grupoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupoa = \DB::table('grupoas')->where('equipo_id',$id)->get(); 
        return view('FGrupos.G_updateA',compact('grupoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupoa  $grupoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupoa  $grupoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $grupoA = Grupoa::findOrFail($id);
        $now = Carbon::now();
        $Totalg=$grupoA['GO'];
        $tOg=$grupoA['Total'];
        $suma = $request->GolA;
        $Puntos = $suma+$Totalg;
        $grupoA->GO = $Puntos;
        $grupoA->juegos = $now;
        if($request->PGA==1){
            $TOTAL= 3;
            $TPGA = $grupoA['PG'];
            $SUMP = $request->PGA;
            $SUMATOTAL = $SUMP +  $TPGA;
            $grupoA->PG = $SUMATOTAL;
          $TotalG=$tOg + $TOTAL;
            $grupoA->Total =  $TotalG;
        }
         if($request->PPA==1){
            $TPPA = $grupoA['PP'];
            $SUMPP = $request->PPA;
            $SUMATOTALPP = $SUMPP +  $TPPA;
            $grupoA->PP = $SUMATOTALPP;
        }
         if($request->PEA==1){
            $TOTALEP = 1;
            $TotalG=$tOg + $TOTALEP ;
            $TPEA = $grupoA['PE'];
            $SUMPE = $request->PEA;
            $SUMATOTALPE = $SUMPE +  $TPEA;
            $grupoA->PE = $SUMATOTALPE;
            $grupoA->Total =  $TotalG;
        }
       

        $grupoA->save();
        return redirect()->route('Partidos.index');
        //dd($Puntos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupoa  $grupoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupoa $grupoa)
    {
        //
    }
}
