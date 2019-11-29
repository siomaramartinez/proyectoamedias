@extends('layouts.layout2')
@section('content1')
<style>
  .btn-ghost {
    position: relative;
    display: inline-block;
    border: 2px solid var(--green);
    line-height: 35px;
    width: 150px;
    border-radius: 30px;
    font-size: 1.0em;
  }
  .btn{
    color: white;
    font-family: Century Gothic, sans-serif;
    font-size: 20px;

  }
  h1{
    background-color: #107C10;
    color: white;
    font-family: Century Gothic, sans-serif;
    font-size: 60px;
    margin-bottom: 100px;
    position: relative;
    left: 0px;

    text-align: center;

  }
  .table{
    text-align: center;
  }

  .cab{
    background-color: #107C10;
    font-family: Century Gothic, sans-serif;
    font-size: 25px;
  }
  th,td{
    border: solid 1px black;
    font-family: Century Gothic, sans-serif;
  }

  tr{
    font-size: 20px;
  }

  
  tr:hover td{
    background-color: #107C10;
  }
  .btn-ghost.ingresar{
    background-color: #107C10 ;
    line-height: 35px;
    width: 320px;
    left: 650px;
    color: white;
    font-size: 1.2em;
   
    
  }
  .btn-ghost.ingresar:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost.ingresar:active {
    box-shadow: inset 0 0 20px var(--green);
    
  }
   


</style>


<body>
<h1>PARTIDOS</h1>
<table class="table table-dark">
  <thead class="cab">
    <tr>
      <th scope="col">No PARTIDO</th>
      <th scope="col">RIVAL 1</th>
      <th scope="col">RIVAL 2</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($tabla as $Pint)
    <tr>
      <td><a class="btn btn-link" href="{{route('Partidos.show', $Pint->partido_id)}}">{{$Pint->partido_id}}</td> 
      <td>{{$Pint->equipo_id}}</td>
      <td>{{$Pint->equipo2_id}}</td>
      <?php
      $fecha = $date;
      for($i= 0; $i < 7; $i++){
      $masOchoDias = date ('d-m-Y', strtotime ('+ 7 day', strtotime($date)));
      }
      ?>
     
    </tr>

    @endforeach
  </tbody>
</table>
{{ $tabla->links() }}
@if(Auth::user()->id==1)
  <form action="{{route('Partidos.create') }}">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn-ghost ingresar">CREAR TABLA DE PARTIDOS</button>
  </form>
  @endif
</body>
@endsection