<!DOCTYPE html>
<html lang="en">

<?php include_once(COMPONENT.'head.php'); ?>
<link rel="stylesheet" href=<?php echo LIB.'bs-stepper/css/bs-stepper.min.css';?>>


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
<link rel="stylesheet" href=<?php echo LIB.'datatables-bs4/css/dataTables.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-responsive/css/responsive.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'datatables-buttons/css/buttons.bootstrap4.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'select2/css/select2.min.css';?>>
<link rel="stylesheet" href=<?php echo LIB.'select2-bootstrap4-theme/select2-bootstrap4.min.css';?>>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once(COMPONENT.'panel_nav.php'); ?>
        <?php include_once(COMPONENT.'header.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ventas</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1" style="background-color: #343a40">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Generar Venta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Ventas realizadas</a>
                                </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="container">
                                                <input type="hidden" id="accion">
                                                <input type="hidden" id="id">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="codigo">Código de Factura</label>
                                                            <input type="text" class="form-control" id="codigo" value="A-001" disabled>
                                                            <span id="scodigo"></span>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="fecha">Fecha</label>
                                                            <input type="date" class="form-control" id="fecha" value="" placeholder="">
                                                            <span id="sfecha"></span>
                                                        </div>
                                                        <div class="form-group col-md-10">
                                                            <label>Cliente</label>
                                                            <select class="form-control select2" id="listado_clientes" style="width: 100%;">
                                                            </select>
                                                            <span id="slistado_clientes"></span>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for=""></label>
                                                            <button class="form-control btn btn-dark" onclick="nuevo_cliente()"><i class="fas fa-plus"></i> Nuevo Cliente</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card-header">
                                                                <div class="col-md-12 text-center">
                                                                    <button class="btn btn-dark" id="nueva_receta"><i class="fas fa-plus"></i> Buscar receta</button>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <table id="menu" class="table table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Receta</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Precio $</th>
                                                                            <th>SubTotal</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="detalledeventa">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="form-group col-md-4">
                                                            <label for="observacion">Total a pagar</label>
                                                            <input type="text" value="0.00" id="total" class="form-control">
                                                            <span id="total"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="form-group col-md-12">
                                                            <label for="observacion">Observación</label>
                                                            <textarea class="form-control" name="" id="observacion" cols="30" rows="10"></textarea>
                                                            <span id="sobservacion"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-6 text-center">
                                                            <button type="button" id="limpiar" class="btn btn-danger">Limpiar</button>
                                                        </div>
                                                        <div class="col-md-6 text-center">
                                                            <button type="button" id="enviar" class="btn btn-primary">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <div class="">
                                            <div class="card-header">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table id="inventario" class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Código</th>
                                                            <th>Cliente</th>
                                                            <th>Monto factura</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="listado_ventas">
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Código</th>
                                                            <th>Cliente</th>
                                                            <th>Monto factura</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                        </tfoot>
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
                </div>
            </section>
        </div>
        <?php include_once(COMPONENT.'footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <div class="modal fade" id="gestion-cliente">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <input type="hidden" id="accion_cliente">
                        <input type="hidden" id="id_cliente">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="identificacion">Identificación</label>
                                    <input type="text" class="form-control" id="identificacion" placeholder="">
                                    <span id="sidentificacion"></span>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="nombre_cliente">Nombre o Razón Social</label>
                                    <input type="text" class="form-control" id="nombre_cliente" placeholder="">
                                    <span id="snombre_cliente"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" placeholder="">
                                <span id="sdireccion"></span>
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
                    <button type="button" id="enviar_cliente" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>  

        <div class="modal fade" id="gestion-receta">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Recetas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table id="recetas" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Receta</th>
                            <th>Precio $</th>
                            <th>Disponible</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="listadorecetas">
                                                                    
                        </tbody>
                    </table>
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

        <div class="modal fade" id="gestion-ingredientes">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Ingredientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <ul id="ingredientes">
                    </ul>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>



    <?php include_once(COMPONENT.'script.php'); ?>
    <script src=<?php echo LIB.'bs-stepper/js/bs-stepper.min.js';?>></script>
    <script src=<?php echo LIB.'datatables/jquery.dataTables.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-bs4/js/dataTables.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-responsive/js/dataTables.responsive.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/dataTables.buttons.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.bootstrap4.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/pdfmake.min.js';?>></script>
    <script src=<?php echo LIB.'pdfmake/vfs_fonts.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.html5.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.print.min.js';?>></script>
    <script src=<?php echo LIB.'datatables-buttons/js/buttons.colVis.min.js';?>></script>
    <script src=<?php echo LIB.'select2/js/select2.full.min.js';?>></script>
    <script src=<?php echo VALIDATION.'venta.js';?>></script>
    <script>
        $(function () {
            $('.select2').select2();
            $("#inventario").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#inventario_wrapper .col-md-6:eq(0)');
        });
        
    </script>

</body>
</html>