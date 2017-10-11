<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Iniciar Sesion</title>

        <link rel="stylesheet" href="{{ asset('plugins/login/css/normalize.css') }}"/>
        <link rel="stylesheet" href="{{ asset('plugins/login/css/login.css') }}"/>
        <script src="{{ asset('plugins/login/js/prefixfree.min.js') }}"></script>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
        </script>
    </head>
<body>
    <div class="wrapper">
        <form class="login" action="{{ url('/login') }}" method="POST">
            {{ csrf_field() }}
            <center>
                <img src="{{ asset('plugins/login/img/logo.jpg') }}" alt="Imagen de la Empresa"></img>
            </center>
            <p class="title">Seguimiento y Monitoreo de Proyectos</p>

            @if ($errors->has('us_cuenta'))
                <span class="help-block">
                    <strong style="color:red; font-size:10px;">{{ $errors->first('us_cuenta') }}</strong>
                </span>
            @endif
            <input type="text" placeholder="Usuario" name="us_cuenta" value="{{ old('us_cuenta') }}" autofocus/>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong style="color:red; font-size:10px;">{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="password" placeholder="Contraseña" name="password" />
            <input type="submit" class="spinner" value="Ingresar" />
            <input type="checkbox" id="c2" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="c2"><span></span> Recordar mi cuenta</label>
            <br/>
            <a href="{{ url('/password/reset') }}"> Olvidaste tú contraseña?</a>
        </form>
    </div>
</body>
</html>
