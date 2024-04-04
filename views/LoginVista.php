<!DOCTYPE html>
<html lang="en">
    <?php include_once(COMPONENT.'head.php'); ?>

    <body class="hold-transition login-page">
        <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>SAEC</b></a>
            </div>
            <div class="card-body">
            <p class="login-box-msg">Ingrese sus datos para acceder al sistema</p>

            <form action="../../index3.html" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Usuario">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Contraseña">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <a href="proceso-1" type="ingresar" class="btn btn-primary btn-block">Ingresar</a >
                </div>
                <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mt-3">
                <a href="forgot-password.html">Olvidé la contraseña</a>
            </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </body>
</html>