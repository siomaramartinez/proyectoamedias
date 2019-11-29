<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Grupoa;
use App\Grupob;
use App\Partido;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PartidosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Administrador',['only'=>['create','store', 'show','edit','update','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabla = \DB::table('equipo_partido')->paginate(7);
        $now = Carbon::now();
        $date = $now;
        //$Partidos = Partido::with('equipos:id,Nombre_Equipo')->paginate(10);
        return view('FPartidos.P_index',compact('tabla','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Equipo  =  Equipo::all();
        return view('FPartidos.P_create', compact('Equipo', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partido = new Partido;
        $now = Carbon::now();

        $EquiposA = Equipo::where('Grupo_id', 1)->get(['id']);
        $EquipoB = Equipo::where('Grupo_id', 2)->get(['id']);

        foreach ($EquiposA as $EA) {
            foreach ($EquipoB as $EB) {
              

                $partido = Partido::create($request->only('Hora_partido','Fecha_partido'));
                //$partido->Fecha_partido = $now;
                //$partido->Hora_partido = $request->Hora_partido;
               // $partido->save();
                $partido->equipos()->attach($EA->id, ['equipo2_id' => $EB->id]);

               
            }
        }
       
        // $partido = Partidos::create($request->only('Hora_partido','Fecha_partido'));
        //$partido->equipos()->attach( $request->ID_Partido);
        //dd( $partido );

        return view('FPartidos.P_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // $Partido = Partido::all();
       $Equipo = \DB::table('equipo_partido')->where('partido_id',$id)->get(); 
     // $Equipo = \DB::select('select * from equipo_partido where partido_id = 14'[$id]);
       //dd($Equipo);
       //$Integrantes = Integrante::all();
       //$tabla = \DB::table('equipo_partido')->get();
       //$Equipo=\DB::findOrfail($id);
       //return view('FPartidos.P_show',compact('Equipo'));
       return view('FPartidos.P_show', compact('Equipo'));
       // return view('FPartidos.P_show',compact('tabla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partido  $partidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partido $partido)
    {
        //
    }
}
