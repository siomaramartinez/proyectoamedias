@extends('layouts.layout2')
@section('content1')
<style>
p{
    color: white;
}
h1{
    color: white;
}
    </style>
<h1> Partidos</h1>
<p>solo una vez wn toda la jornada sera necesario la implementacion de estos campos <p><br>

<form action="{{ route('Partidos.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
{{csrf_field()}}
        @csrf
        <div class="input-group mb-4 col-6">
        <div class="input-group-prepend conl-4">
            <span class="input-group-text" id="basic-addon1">fecha partido</span>
        </div>
        <input type="text" name="Fecha_partido" id="Nequipo" placeholder="Año:Mes:Dia" class="form-control mb4">
    </div>

    <div class="input-group mb-4 col-6">
        <div class="input-group-prepend conl-4">
            <span class="input-group-text" id="basic-addon1">Hora partido</span>
        </div>
        <input type="text" name="Hora_partido" id="Nequipo" placeholder="Hora:Minutos:Segundos" class="form-control mb4">
    </div>
  
    

    <button class="btn btn-primary btn-block col-3" type="submit ">INSERT</button>
</form>
<br>
<br>
<p>Presione INGRESAR GRUPO A Y INGRESAR GRUPO B para la creacion de la tabla de los grupos<p><br>
<p>si anterior mente ya hiso esto no los buelva a precionar<p>
<form action="{{ route('GruposA.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
{{csrf_field()}}
@csrf
   <button class="btn btn-primary btn-block col-3" type="submit ">INGRESAR GRUPO A</button>

</form>
<br><br>
<form action="{{ route('GruposB.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
{{csrf_field()}}
@csrf
   <button class="btn btn-primary btn-block col-3" type="submit ">INGRESAR GRUPO B</button>

</form>

@endsection