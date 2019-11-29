<?php


namespace App\Http\Controllers;

use App\Equipo;
use App\Grupo;
use App\Integrante;
use Illuminate\Http\Request;

class EquiposController extends Controller
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
        $equipo = \DB::table('equipos')->paginate(10);
        return view('FEquipos.E_index', compact('equipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = Grupo::all();
        return view('FEquipos.E_create', compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'NombreE'=>'required',
            'Nombre'=>'required',
            'ApellidoP'=>'required',
            'ApellidoM'=>'required',
            'ApellidoP'=>'required',
         ]);
        $datos = new Equipo;
        $EquiposA = Equipo::where('Grupo_id', 1)->get(['id']);
      
        foreach ($datos as $id) {
            if ($datos['id'] % 2 == 1) {
                $datos->NombreE = $request->NombreE;
                $datos->Nombre = $request->Nombre;
                $datos->ApellidoP = $request->ApellidoP;
                $datos->ApellidoM = $request->ApellidoM;
                $datos->Pago = $request->Pago;
                if ($request->hasFile('Logo')) {
                    $datos['Logo'] = $request->file('Logo')->store('uploads', 'public');
                }
                $datos->Grupo_id = 1;
                $datos->save();
            } else {
                $datos->NombreE = $request->NombreE;
                $datos->Nombre = $request->Nombre;
                $datos->ApellidoP = $request->ApellidoP;
                $datos->ApellidoM = $request->ApellidoM;
                $datos->Pago = $request->Pago;
                if ($request->hasFile('Logo')) {
                    $datos['Logo'] = $request->file('Logo')->store('uploads', 'public');
                }
                $datos->Grupo_id = 2;
                $datos->save();
            }
        }
        
        return back()->with('mensaje','Equipo ingresado correctamente');
       // return redirect('Equipos');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $Integrantes = Integrante::all();
        $Equipo=\App\Equipo::findOrfail($id);
        return view('FEquipos.E_show',compact('Equipo','Integrantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Equipo = Equipo::findOrfail($id);
        return view('FEquipos.E_create',compact('Equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       
        $DatosDeEquipo=request()->except(['_token','_method']);
         //dd($DatosDeEquipo);
        if($request->hasFile('Logo')){
            $Equipo = Equipo::findOrfail($id);
           Storage ::delete('public/'.$Equipo->Logo);
            $DatosDeEquipo['Logo']=$request->file('Logo')->store('uploads','public');
        }

        Equipo::where('id','=',$id)->update($DatosDeEquipo);
        $Equipo = Equipo::findOrfail($id);
        
        return view('FEquipos.E_create',compact('Equipo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Equipo = Equipo::findOrfail($id);
        //if(Storage ::delete('public/'.$Equipo->Logo)){
            Equipo::destroy($id);
       // }
     
        return redirect('Equipos');
    }
    }

