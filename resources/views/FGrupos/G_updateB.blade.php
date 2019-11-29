@extends('layouts.layout3')
@section('content3')
<style>
    :root {
    --green: #107C10;
    --white: #FFFFFF;
    --red: #830F10;
    --gr:#212529;
    --blu:#008080;

  }
    .btn-ghost {
        background-color: var(--blu);
    position: relative;
    display: inline-block;
    border: 2px solid var(--blu);
    line-height: 35px;
    width: 200px;
    top: 50px;
    left: 550px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
  }
  .btn-ghost:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost:active {
    box-shadow: inset 0 0 20px var(--blu);
  }
  .btn-ghost.segundo {
    background-color: green;
    position: relative;
    display: inline-block;
    border: 2px solid var(--white);
    line-height: 35px;
    width: 200px;
    top: 100px;
    left: 300px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
  }
  .btn-ghost.segundo:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost.segundo:active {
    box-shadow: inset 0 0 20px var(--green);
  }
 
  .btn-ghost.ter {
    background-color: var(--red);
    position: relative;
    display: inline-block;
    border: 2px solid var(--white);
    line-height: 35px;
    width: 200px;
    top: 60px;
    left: 600px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
  }
  .btn-ghost.ter:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost.ter:active {
    box-shadow: inset 0 0 20px var(--red);
  }
  .btn-ghost.cuar {
    background-color: var(--gr);
    position: relative;
    display: inline-block;
    border: 2px solid var(--white);
    line-height: 35px;
    width: 200px;
    top: 20px;
    left: 900px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
  }
  .btn-ghost.cuar:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost.cuar:active {
    box-shadow: inset 0 0 20px var(--white);
  }
  .btn-ghost.quin {
    background-color: var(--gr);
    position: relative;
    display: inline-block;
    border: 2px solid var(--white);
    line-height: 35px;
    width: 200px;
    top: 100px;
    left: 900px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
  }
  
  p{
    background-color: #107C10;
       font-family: Century Gothic, sans-serif;
        font-size:50px;
        text-align: center;
      color: white;

  }
  input[type="text"] {
        position: relative;
        border: none;
        border-bottom: 1px solid white;
        background: white;
        outline: none;
        height: 40px;
        color: black;
        font-size: 16px;
        top: 50px;
        left: 550px;
        font-family: Century Gothic, sans-serif;
        font-size:23px;
    }

    </style>
<body>
<div>
@foreach($grupob as $gb)
<p>{{$gb->equipo_id}}</p>
<form action="{{ route('GruposB.update', $gb->id) }}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    {{method_field('PATCH')}}
<input type="text" name="GolB" id="Nequipo" placeholder="GOL" >
<button  class="btn-ghost " type="submit ">INSERT</button>
</form>

<form action="{{ route('GruposB.update', $gb->id) }}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    {{method_field('PATCH')}}
<input type="text" name="PGB" id="Nequipo" placeholder="Nombre de equipo" class="form-control mb4" value="1" readonly="readonly" style="display:none">
<button  class="btn-ghost segundo " type="submit ">GANADOR</button>
</form>

<form action="{{ route('GruposB.update', $gb->id) }}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    {{method_field('PATCH')}}
<input type="text" name="PPB" id="Nequipo" placeholder="Nombre de equipo" class="form-control mb4" value="1" readonly="readonly" style="display:none">
<button class="btn-ghost ter"  type="submit ">PERDIDO</button>
</form>

<form action="{{ route('GruposB.update', $gb->id) }}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    {{method_field('PATCH')}}
<input type="text" name="PEB" id="Nequipo" placeholder="Nombre de equipo" class="form-control mb4" value="1" readonly="readonly" style="display:none">
<button class="btn-ghost cuar" type="submit ">EMPATADO</button>
</form>
@endforeach
</div>
<form action="{{ route('Partidos.show', $gb->id) }}" enctype="multipart/form-data">
<button class="btn-ghost quin" type="submit ">REGRESAR</button>
</form>
</body>
@endsection