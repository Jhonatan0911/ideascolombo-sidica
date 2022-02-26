<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | Semillero Investigación - Sena Colombo Aleman</title>
    <!-- Favicon-->
    <link rel="icon" href="img/favicoSENA.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="plugins/materialicons/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/estilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="index.php"><b>Bienvenido</b></a>
            <small>Grupo Semillero De Investigación - SENNOVA</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="form_login">
                    <div class="msg">Inicia sesión para comenzar tu sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" data-toggle="tooltip" data-placement="top" title="Usuario" name="username" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="pass" data-toggle="tooltip" data-placement="top" title="Contraseña" name="password" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-offset-8 col-xs-4">
                            <button id="btn_log" class="btn btn-block bg-pink waves-effect" type="button">Entrar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div id="msj_log" class="col-xs-3 col-xs-push-5">

                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="maxx-width col-xs-6 col-xs-push-5">
                            <a href="restablecer.php">Se te olvidó tu contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
    <script src="js/main.js"></script>
</body>
</html>