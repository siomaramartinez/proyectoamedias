@extends('layouts.layout3')
@section('content3')
<style>
h1{
  background-color: #008080 ;
  color: white;
  font-family: Century Gothic, sans-serif;
        font-size:50px;
}


  </style>

  <body>
<h1>EQUIPO:{{$Equipo->NombreE}}</h1>
@foreach($Integrantes as $I)
@if($I->equipo_id ==$Equipo->id)
<table class="table table-dark">
    <thead class="cab">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">POSICION</form>
        <th scope="col">EDAD</form>
        <th scope="col">EQUIPO</form>
        <th scope="col">REGISTRO</form>
        </th>
        @if(Auth::user()->id==1)
        <th scope="col">EDITAR</form>
          </form>
        </th>
        <th scope="col"> BORRAR</form>
          </form>
        </th>
        @endif

      </tr>
    </thead>
    <tbody>
      @foreach($Integrantes as $Inte)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$Inte->Nombre}}&nbsp;{{$Inte->ApellidoP}}&nbsp;{{$Inte->ApellidoM}}</td>
        <td>{{$Inte->Posicion}}</td>
        <td>{{$Inte->Edad}}</td>
        <td>{{$Inte->equipo->id}}</td>
        <td>{{$Inte->registro}}</td>
        @if(Auth::user()->id==1)
        <td>
          <a href="{{route('Integrantes.edit', $Inte->id)}}" class="btn-ghost ">Editar</a>
        </td>
        <td>
          <form method="post" action="{{route('Integrantes.destroy',$Inte->id) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn-ghost secundary" onclick="return confirm('Borrar?');">Borrar</button>
          </form>
        </td>
        @endif

      </tr>

      @endforeach
    </tbody>
  </table>
  @if(Auth::user()->id==1)
  <form action="{{route('Integrantes.create') }}">
    {{csrf_field()}}
    <button type="submit" class="btn-ghost ingresar">INGRESAR INTEGRANTE</button>
  </form>
  @endif
  
@endif
@endforeach
<form action="{{url('Equipos')}}">
        <button type="submit" class="btn-ghost secun">REGRESAR</button>
    </form>
  </body>
    @endsection