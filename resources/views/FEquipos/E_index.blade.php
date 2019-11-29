@extends('layouts.layout2')
@section('content1')
<style>
  :root {
    --green: #107C10;
    --white: #FFFFFF;
    --red: #830F10;
    --gr:#212529;
    --blu:#008080;

  }



  .btn-ghost {
    position: relative;
    display: inline-block;
    border: 2px solid var(--green);
    line-height: 35px;
    width: 150px;
    border-radius: 30px;
    font-size: 1.0em;
  }

  .btn-ghost:hover {
    color: white;
    background-color: var(--green);
  }

  .btn-ghost:active {
    box-shadow: inset 0 0 20px var(--white);
  }

  .btn-ghost.secundary {
    background-color: transparent;
    border: 2px solid var(--red);
    color: white;
  }

  .btn-ghost.secundary:hover {
    color: white;
    background-color: var(--red);
  }

  .btn-ghost.secundary:active {
    box-shadow: inset 0 0 20px var(--white);
  }

  .btn-ghost.ingresar{
    background-color: #107C10 ;
    line-height: 35px;
    width: 320px;
    left: 30px;
    color: white;
    font-size: 1.5em;
   
    
  }
  .btn-ghost.ingresar:hover {
    color: white;
    background-color: transparent;
  }
  .btn-ghost.ingresar:active {
    box-shadow: inset 0 0 20px var(--green);
    
  }



  .btn {
    color: white;
    font-family: Century Gothic, sans-serif;
    font-size: 20px;

  }

  h1 {
    background-color: #107C10;
    color: white;
    font-family: Century Gothic, sans-serif;
    font-size: 60px;
    margin-bottom: 100px;

    text-align: center;

  }

  .table {
    text-align: center;
  }

  .cab {
    background-color: #107C10;
    font-family: Century Gothic, sans-serif;
    font-size: 25px;
  }

  th,
  td {
    border: solid 1px black;
    font-family: Century Gothic, sans-serif;
  }

  tr {
    font-size: 20px;
  }


  tr:nth-child(even) {
    background-color: #2C3034;
  }


  .bo {
    padding: 20px, 20px;
  }
</style>


<body>
  <h1>EQUIPOS</h1>
  <table class="table table-dark">
    <thead class="cab">
      <tr>
        <th scope="col">#</th>
        <th scope="col">LOGO</th>
        <th scope="col">EQUIPO</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">PAGO</form>
          </form>
        </th>
        <th scope="col"> GRUPO</form>
          </form>
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
      @foreach($equipo as $equipoint)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td><img src="{{asset('storage').'/'.$equipoint->Logo}}" alt="" width="150"></td>
        <td><a class="btn btn-link" href="{{route('Equipos.show', $equipoint->id)}}">{{$equipoint->NombreE}}</td>
        <td>{{$equipoint->Nombre}}&nbsp;{{$equipoint->ApellidoP}}&nbsp;{{$equipoint->ApellidoM}}</td>
        <td>{{$equipoint->Pago}}</td>
        <td>{{$equipoint->Grupo_id}}</td>
        @if(Auth::user()->id==1)
        <td>
          <a href="{{route('Equipos.edit', $equipoint->id)}}" class="btn-ghost ">Editar</a>
        </td>
        <td>
        
          <form method="post" action="{{route('Equipos.destroy',$equipoint->id) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn-ghost secundary" onclick="return confirm('Borrar?');">Borrar</button>
          </form>
          @endif
        </td>

      </tr>

      @endforeach
    </tbody>
  </table>
  @if(Auth::user()->id==1)
  <form action="{{route('Equipos.create') }}">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn-ghost ingresar">INGRESAR EQUIPO</button>
  </form>
  @endif
  {{$equipo->links() }}

</body>
@endsection