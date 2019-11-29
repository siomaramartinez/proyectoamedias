<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Grupob;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrupobController extends Controller
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
        return view('FGrupos.G_juego');
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
       
        $EquiposB = Equipo::where('Grupo_id', 1)->get(['id']);
        
        foreach ($EquiposB as $EB) {
            \DB::table('grupobs')->insert([
                ['equipo_id' => $EB->id],
            ]);
        }
        return view('FPartidos.P_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupob  $grupob
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupob = \DB::table('grupobs')->where('equipo_id',$id)->get(); 
        return view('FGrupos.G_updateB',compact('grupob'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupob  $grupob
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupob $grupob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupob  $grupob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupoB = Grupob::findOrFail($id);
        $now = Carbon::now();
        $Totalg=$grupoB['GO'];
        $tOg=$grupoB['Total'];
        $suma = $request->GolB;
        $Puntos = $suma+$Totalg;
        $grupoB->GO = $Puntos;
        $grupoB->juego = $now;
        if($request->PGB==1){
            $TOTAL= 3;
            $TPGB = $grupoB['PG'];
            $SUMP = $request->PGB;
            $SUMATOTAL = $SUMP +  $TPGB;
            $grupoB->PG = $SUMATOTAL;
          $TotalG=$tOg + $TOTAL;
          $grupoB->Total =  $TotalG;
        }
         if($request->PPB==1){
            $TPPA = $grupoB['PP'];
            $SUMPP = $request->PPB;
            $SUMATOTALPP = $SUMPP +  $TPPA;
            $grupoB->PP = $SUMATOTALPP;
        }
         if($request->PEB==1){
            $TOTALEP = 1;
            $TotalG=$tOg + $TOTALEP ;
            $TPEA = $grupoB['PE'];
            $SUMPE = $request->PEB;
            $SUMATOTALPE = $SUMPE +  $TPEA;
            $grupoB->PE = $SUMATOTALPE;
            $grupoB->Total =  $TotalG;
        }
       

        $grupoB->save();
        return redirect()->route('Partidos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupob  $grupob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupob $grupob)
    {
        //
    }
}
