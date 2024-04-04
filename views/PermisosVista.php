<!DOCTYPE html>
<html lang="en">
<?php include_once(COMPONENT.'head.php'); ?>
<style>
.error-input {
border: 1px solid red;
}

.error-message {
    color: red;
    font-size: 12px;
}
    .product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
    .product-image{max-width:100%;height:auto;width:100%}.product-image-thumbs{-ms-flex-align:stretch;align-items:stretch;display:-ms-flexbox;display:flex;margin-top:2rem}.product-image-thumb{box-shadow:0 1px 2px rgba(0,0,0,.075);border-radius:.25rem;background-color:#fff;border:1px solid #dee2e6;display:-ms-flexbox;display:flex;margin-right:1rem;max-width:7rem;padding:.5rem}.product-image-thumb img{max-width:100%;height:auto;-ms-flex-item-align:center;align-self:center}.product-image-thumb:hover{opacity:.5}.product-share a{margin-right:.5rem}.projects td{vertical-align:middle}
</style>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once(COMPONENT.'panel_nav.php'); ?>
        <?php include_once(COMPONENT.'header.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Seguridad</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-7">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1" style="background-color: #343a40">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Entornos</a>
                                </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="">
                                            <div class="card-header">
                                                <button type="button" id="nuevo_rol" class="btn btn-default">
                                                    <i class="fa fa-plus"></i>  
                                                </button>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" >
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Nombre
                                                                </th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($roles as $valor) {?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $valor['nombre']; ?>
                                                                </td>
                                                                <td class="project-actions text-right">
                                                                    <button class="btn btn-primary btn-sm"  onclick="cargar_datos(<?=$valor['id'];?>);">
                                                                        <i class="fas fa-lock">
                                                                        </i>
                                                                    </buton>
                                                                    <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id'];?>, 'roles');">
                                                                        <i class="fas fa-pencil-alt">
                                                                        </i>
                                                                    </buton>
                                                                    <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id'];?>, 'roles');">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                    </buton>
                                                                </td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <div class="">
                                            <div class="card-header">
                                                <button type="button" id="nuevo_usuario" class="btn btn-default">
                                                    <i class="fa fa-plus"></i>  
                                                </button>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" >
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Correo
                                                                </th>
                                                                <th>
                                                                    Telefono
                                                                </th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($r1 as $valor) {?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $valor['correo']; ?>
                                                                </td>
                                                                <td class="project_progress">
                                                                    <?php echo $valor['telefono']; ?>
                                                                </td>
                                                                <td class="project-actions text-right">
                                                                    <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id'];?>, 'usuarios');">
                                                                        <i class="fas fa-pencil-alt">
                                                                        </i>
                                                                    </buton>
                                                                    <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id'];?>, 'usuarios');">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                    </buton>
                                                                </td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                        <div class="">
                                            <div class="card-header">
                                                <button type="button" id="nuevo" class="btn btn-default">
                                                    <i class="fa fa-plus"></i>  
                                                </button>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" >
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Correo
                                                                </th>
                                                                <th>
                                                                    Telefono
                                                                </th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($r1 as $valor) {?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $valor['correo']; ?>
                                                                </td>
                                                                <td class="project_progress">
                                                                    <?php echo $valor['telefono']; ?>
                                                                </td>
                                                                <td class="project-actions text-right">
                                                                    <button class="btn btn-info btn-sm"  onclick="cargar_datos(<?=$valor['id'];?>);">
                                                                        <i class="fas fa-pencil-alt">
                                                                        </i>
                                                                    </buton>
                                                                    <button class="btn btn-danger btn-sm"  onclick="eliminar(<?=$valor['id'];?>);">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                    </buton>
                                                                </td>
                                                            </tr>
                                                            <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card-dark card-tabs">
                            <div class="card-header">

                                <h3 class="card-title"> Bitácora</h3>
                                

                                <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a  style="color: black !important;" class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a  style="color: black !important;" class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a  style="color: black !important;" class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a  style="color: black !important;" class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a  style="color: black !important;" class="page-link" href="#">&raquo;</a></li>
                                </ul>
                                </div>
                            </div>
                            <button type="button" id="buscar_bitacora" class="btn btn-default">
                                <i class="fa fa-search"> Buscar</i>
                            </button>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Proceso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>11/01/2023</td>
                                        <td>Maria Diaz</td>
                                        <td><span class="badge bg-success">Registro de Producción</span></td>
                                    </tr>
                                    <tr>
                                        <td>11/01/2023</td>
                                        <td>Maria Diaz</td>
                                        <td><span class="badge bg-danger">Eliminación de Producto</span></td>
                                    </tr>
                                    <tr>
                                        <td>11/01/2023</td>
                                        <td>Maria Diaz</td>
                                        <td><span class="badge bg-primary">Modificación de Inventario</span></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </div>
        <?php include_once(COMPONENT.'footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>



    <div class="modal fade" id="gestion-usuario">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title">Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <input type="hidden" id="accion">
                <input type="hidden" id="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre y Apellido</label>
                    <input type="text" class="form-control" id="nombre" placeholder="">
                    <span id="snombre"></span>
                  </div>
                  <div class="form-group">
                    <label for="clave">Clave</label>
                    <input type="text" class="form-control" id="clave" placeholder="">
                    <span id="sclave"></span>
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" placeholder="">
                    <span id="scorreo"></span>
                  </div>
                  <div class="form-group">
                    <label for="telefono">Número de teléfono</label>
                    <input type="text" class="form-control" id="telefono" placeholder="">
                    <span id="stelefono"></span>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar_usuario" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="gestion-rol">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title">Rol</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <input type="hidden" id="accion">
                <input type="hidden" id="id">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre_rol">Nombre</label>
                    <input type="text" class="form-control" id="nombre_rol" placeholder="">
                    <span id="snombre_rol"></span>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar_rol" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php include_once(COMPONENT.'script.php'); ?>
    <script src=<?php echo VALIDATION.'permisos.js';?>></script>
</body>
</html>