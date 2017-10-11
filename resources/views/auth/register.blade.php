<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Acceso Denegado</title>
    
        <style>
            body {
                font-family: "Open Sans", sans-serif;
                height: 100vh;
                background: url({{ asset('plugins/login/img/acceso.jpg') }}) no-repeat fixed;
                background-size: cover;
                color:#ffffff;
            }
            a{
                text-decoration:none;
                color: #ffffff;
            }
            #padre {
                margin-left: 50%; 
                margin-top: 5;
            }
            #hijo {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 50%;
                height: 30%;
                margin: auto;
            }
        </style>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
        </script>
    </head>
<body>
    <div id="padre">
        <div id="hijo">
            <center>
                <h1>ACCESO DENEGADO</h1>
                <h3>Pongase en contacto con el administrador del Sistema</h3>
                <h2><a href="{{ url('/login') }}">Iniciar Sesión</a></h2>
            </center>
        </div>
    </div>
</body>
</html>

