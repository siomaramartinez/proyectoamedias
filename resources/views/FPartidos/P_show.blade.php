@extends('layouts.layout3')
@section('content3')
<style>
  root {
    --green: #107C10;
    --white: #FFFFFF;
    --red: #830F10;
    --gr: #212529;
    --blu: #008080;

  }

  h1 {
    color: white;
    text-align: center;
    font-family: Century Gothic, sans-serif;
    font-size: 100px;
  }

  .btn-ghost {
    background-color: green;
    position: relative;
    display: inline-block;
    border: 2px solid var(--green);
    line-height: 35px;
    width: 200px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
    position: relative;
    top: 200px;
    left: 500px;
  }

  .btn-ghost:hover {
    color: white;
    background-color: var(--green);
  }

  .btn-ghost.secundary {
    background-color: white;
    border: 2px solid var(--white);
    color: black;
    line-height: 35px;
    text-align: center;
    width: 200px;
    font-size: 1.5em;
    position: relative;
    top: 250px;
    left: 300px;
  }

  .btn-ghost.cua {
    background-color: white;
    border: 2px solid var(--white);
    color: black;
    line-height: 35px;
    text-align: center;
    width: 200px;
    top: 205px;
    left: 800px;
    font-size: 1.5em;
  }

  .btn-ghost.tre {
    background-color: green;
    position: relative;
    display: inline-block;
    border: 2px solid var(--green);
    line-height: 35px;
    width: 200px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
    position: relative;
    top: 155px;
    left: 1005px;
  }
  .btn-ghost.quin {
    background-color: var(--green);
    position: relative;
    display: inline-block;
    border: 2px solid var(--white);
    line-height: 35px;
    width: 200px;
    top: 500px;
    left: 760px;
    border-radius: 30px;
    font-size: 1.0em;
    color: white;
    text-align: center;
  }
  .btn-ghost.quin:hover {
    color: black;
    background-color: var(--white);
  }
</style>

<body>
  <h1>ENCUENTRO</h1>
  <div>
    @foreach($Equipo as $Pint)

    <div>
      <button type="submit" class="btn-ghost ">Equipo 1</button>
      <a class="btn-ghost secundary" href="{{route('GruposB.show', $Pint->equipo_id)}}">{{$Pint->equipo_id}}</a>
    </div>
    <div>
      <button type="submit" class="btn-ghost tre">Equipo 2</button>
      <a class="btn-ghost cua" href="{{route('GruposA.show', $Pint->equipo2_id)}}">{{$Pint->equipo2_id}}</a>
    </div>

    @endforeach
  </div>
  <a href="home" class="btn-ghost quin" type="submit ">REGRESAR</a>
</body>

@endsection