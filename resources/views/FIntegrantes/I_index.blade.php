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
  <h1>INTEGRANTES</h1>
  <table class="table table-dark">
    <thead class="cab">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">POSICION</th>
        <th scope="col">EDAD</th>
        <th scope="col">EQUIPO</form>
        <th scope="col">INGRESO</form>
          </form>
        </th>
        

      </tr>
    </thead>
    <tbody>
      @foreach($Integrantes as $inpoint)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$inpoint->Nombre}}&nbsp;{{$inpoint->ApellidoP}}&nbsp;{{$inpoint->ApellidoM}}</td>
        <td>{{$inpoint->Posicion}}</td>
        <td>{{$inpoint->Edad}}</td>
        <td>{{$inpoint->equipo_id}}</td>
        <td>{{$inpoint->registro}}</td>

      </tr>

      @endforeach
    </tbody>
  </table>
  
 
 
  {{$Integrantes->links() }}

</body>
@endsection