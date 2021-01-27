<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="img/png" href="{{ asset ('app_assets/imagenes/map.png') }}" >
    <link href="{{ asset ('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/main.css') }}" rel="stylesheet" >
	<title>BCS Places | Admin</title>
</head>
<body style="background: #2898bf;">

<div class="container mt-5">

    <div class="title">
        <h1 style="color: white; text-align: center;">B.C.S Places</h1>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="contenedor-login">
            
            <div class="mapa-login">
                
                <img src="{{ asset ('app_assets/imagenes/map.png') }}">

            </div>

            <div class="login">
                <label style="color: white;" class="ml-4">Bienvenido, por favor ingresa.</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                @error('email')
                    <span class="invalid-feedback ml-4" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                @error('password')
                <span class="invalid-feedback ml-4" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror    

                <button type="submit" class="btn btn-light">
                        {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
</div>

</body>
</html>


