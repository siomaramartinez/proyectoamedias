<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">


    <title>Soccer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<!-- Styles -->
<style>
    body {
        margin: 0;
        padding: 0;
        background: url(../admintLTE/img/Inicio3.jpg) no-repeat center top;
        background-size: cover;
        font-family: sans-serif;
        height: 100vh;
    }

    .login-box {
        width: 320px;
        height: 320px;
        top: 47%;
        left: 20%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 20px black, 0px 0px 40px white;
        padding: 70px 30px;
    }

    .login-box h1 {
        margin: 0;
        padding: 0 0 20px;

        font-size: 30px;
        color: white;
    }

    .login-box label {
        margin: 0;
        padding: 0;
        font-weight: bold;
        display: block;
        color: white;
    }

    .login-box input {
        width: 100%;
        margin-bottom: 30px;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
    }

    .login-box input[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        background: #44AD28;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
    }

    .login-box a {
        text-decoration: none;
        text-align: center;
        font-size: 12px;
        line-height: 20px;
        color: darkgrey;

    }

    .login-box a:hover {
        color: #fff;

    }

    @media screen and (max-width:750px) {


        .login-box {
            transition: 1s;
            width: 95%;
            margin-top: 10px;
            left: 50%;

        }


    }
</style>

<body>

    <div class="login-box">
        <h1>Usuario</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- USERNAME INPUT -->
            <label for="username">Nombre de Usuario</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Introdusca usuario" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Introdusca contraseña">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <input type="submit" value="Iniciar sesión">

            <a class="btn btn-link" href="{{ route('password.request') }}">Perdistes tu contraseña?</a>
            <br>
            <a href="register">No tienes una cuenta?</a>
        </form>
    </div>
    </form>

</body>

</html>