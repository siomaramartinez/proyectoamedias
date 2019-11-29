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
 .login-box {
     background-color: #212529;
        width: 1050px;
        height: 800px;
        top: 5%;
        left: 20%;
        position: absolute;
        padding: 70px 30px;
    }
    .login-box label {
        position: relative;
        margin: 0;
        padding: 0;
        font-weight: bold;
        display: block;
        color: white;
        top: -55px;
        font-size: 1.30em;
    }
    .login-box input {
        width: 100%;
        margin-bottom: 30px;
    }
    .login-box input[type="text"] {
        position: relative;
        border: none;
        border-bottom: 1px solid white;
        background: transparent;
        outline: none;
        height: 40px;
        color: white;
        font-size: 16px;
        top: -50px;
        font-family: Century Gothic, sans-serif;
        font-size:23px;
    }


    h1{
       background-color: #107C10;
       font-family: Century Gothic, sans-serif;
        font-size:50px;
        position: relative;
        top: -70px;
       right: 30px;
       width: 800px;

     }

     .btn-ghost {
    background-color: var(--green);
    position: relative;
    display: inline-block;
    border: 2px solid var(--green);
    line-height: 35px;
    width: 150px;
    border-radius: 30px;
    font-size: 1.2em;
    color: white;
    width: 320px;
    left: 650px;
  }
  .btn-ghost:hover {
   
    color: white;
    background-color: var(--green);
  }

  .btn-ghost.secun{
      color: white;
      background-color: var(--blu);
    border: 2px solid var(--blu);
    width: 320px;
    top: -35px;
    left: 20px;

  }
    </style>



<div class="login-box">
<h1>INTEGRANTE</h1>




@if(isset($Integrante))

<form action="{{ route('Integrantes.update',  $Integrante->id) }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    @else
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                 <li>{{$error}}</li>
                 @endforeach
            </ul>
        </div>
    @endif

    @if(session('mensaje'))
        <div class="alert alert-success">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    <form action="{{ route('Integrantes.store')}}" method="post" enctype="multipart/form-data" , files='true' value>
        {{csrf_field()}}
        @endif
        @csrf
        <br><br>
        <label for="username">NOMBRE</label>
        <div class="input-group mb-4 col-6">
            <input type="text" name="Nombre" id="Nequipo" placeholder="Nombre " class="form-control mb4" value="{{$Integrante->Nombre ?? ''}}">
        </div>
        <label for="username">APELLIDO PATERNO</label>
        <div class="input-group mb-4 col-8">
            <input type="text" name="ApellidoP" id="NDT" placeholder="Apellido Paterno" class="form-control mb2" value="{{$Integrante->ApellidoP ?? ''}}">
        </div>
        <label for="username">APELLIDO MATERNO </label>
        <div class="input-group mb-4 col-8">
            <input type="text" name="ApellidoM" id="NDT" placeholder="Apellido Materno" class="form-control mb2" value="{{$Integrante->ApellidoM ?? ''}}">
        </div>
        <label for="username">POSICION </label>
        <div class="input-group mb-4 col-8">
            <input type="text" name="Posicion" id="NDT" placeholder="Apellido Materno" class="form-control mb2" value="{{$Integrante->Posicion ?? ''}}">
        </div>
        <label for="username">EDAD </label>
        <div class="input-group mb-4 col-8">
            <input type="text" name="Edad" id="NDT" placeholder="Apellido Materno" class="form-control mb2" value="{{$Integrante->Edad ?? ''}}">
        </div>
        @if(isset($Integrante))
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Equipo</span>
            </div>
            <select class="custom-select col-2" id="inputGroupSelect01" name="equipo_id" value="{{$Integrante->equipo_id ?? ''}}">
            @foreach($Equipos as $Ei)
                <option value="{{$Ei['id']}}">{{$Ei['NombreE'] ?? ''}}</option>
                @endforeach
            </select>
        </div>

        @else
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">PAGO REALIZADO</span>
            </div>
            <select class="custom-select col-2" id="inputGroupSelect01" name="equipo_id">
                <option selected>Choose...</option>
                @foreach($Equipos as $Ei)
                <option value="{{$Ei['id']}}">{{$Ei['NombreE']}}</option>
                @endforeach
            </select>
            
        </div>
        
        @endif


        @if(isset($Equipo))
        <button class="btn-ghost">EDITAR</button>

        @else
        <br>
        <button class="btn-ghost" type="submit ">INSERT</button>
        <br>
        @endif
    </form>
    <form action="{{url('Equipos')}}">
        <button type="submit" class="btn-ghost secun">REGRESAR</button>
    </form>
</div>


@endsection