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
</style>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once(COMPONENT.'panel_nav.php'); ?>
        <?php include_once(COMPONENT.'header.php'); ?>
        <link rel="stylesheet" href=<?php echo LIB.'datatables-bs4/css/dataTables.bootstrap4.min.css';?>>
        <link rel="stylesheet" href=<?php echo LIB.'datatables-responsive/css/responsive.bootstrap4.min.css';?>>
        <link rel="stylesheet" href=<?php echo LIB.'datatables-buttons/css/buttons.bootstrap4.min.css';?>>
        <link rel="stylesheet" href=<?php echo LIB.'select2/css/select2.min.css';?>>
        <link rel="stylesheet" href=<?php echo LIB.'select2-bootstrap4-theme/select2-bootstrap4.min.css';?>>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Almacén</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Inventario</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary" id="nueva_materia"><i class="fas fa-plus"></i> Nueva Materia Prima</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="inventario" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Stock mínimo</th>
                                    <th>Stock máximo</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Carne</td>
                                    <td>4 Kg.</td>
                                    <td>1</td>
                                    <td>20</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carne</td>
                                    <td>4 Kg.</td>
                                    <td>1</td>
                                    <td>20</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carne</td>
                                    <td>4 Kg.</td>
                                    <td>1</td>
                                    <td>20</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Stock mínimo</th>
                                    <th>Stock máximo</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7">
                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Compras</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary" id="nueva_compra"><i class="fas fa-plus"></i> Nueva Compra</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="compra" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Factura Nro.</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Total $</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>A-001</td>
                                    <td>04-04-2024</td>
                                    <td>Maria Diaz</td>
                                    <td>250</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A-001</td>
                                    <td>04-04-2024</td>
                                    <td>Maria Diaz</td>
                                    <td>250</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>A-001</td>
                                    <td>04-04-2024</td>
                                    <td>Maria Diaz</td>
                                    <td>250</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Factura Nro.</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-5">
                        <div class="card card-dark">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Proveedores</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary" id="nuevo_proveedor"><i class="fas fa-plus"></i> Nuevo Proveedor</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="proveedor" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>26.197.135</td>
                                    <td>Maria Diaz
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>26.197.135</td>
                                    <td>Maria Diaz
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>26.197.135</td>
                                    <td>Maria Diaz
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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


    <div class="modal fade" id="gestion-materia">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title">Materia Prima</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <input type="hidden" id="accion_inventario">
                <input type="hidden" id="id">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombre_materia">Nombre</label>
                            <input type="text" class="form-control" id="nombre_materia" placeholder="">
                            <span id="snombre_materia"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="caracteristica">Caracteristica</label>
                            <select class="form-control" name="caracteristica" id="caracteristica">
                                <option value="0" disabled selected>Seleccione</option>
                                <option value="Kilogramos">Kilogramos</option>
                                <option value="Litros">Litros</option>
                                <option value="Unidad">Unidad</option>
                            </select>
                            <span id="scaracteristica"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" placeholder="">
                            <span id="scantidad"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="stock-min">Stock Minimo</label>
                            <input type="text" class="form-control" id="stock_min" placeholder="">
                            <span id="sstock_min"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="stock-max">Stock Máximo</label>
                            <input type="text" class="form-control" id="stock_max" placeholder="">
                            <span id="sstock_max"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0" disabled selected>Seleccione</option>
                                <option value="Habilitado">Habilitado</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                            </select>
                            <span id="sstatus"></span>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar_materia" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="gestion-compra">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Compra</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="accion_compra">
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
                                <input type="date" class="form-control" id="fecha" placeholder="">
                                <span id="sfecha"></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Proveedor</label>
                                <select class="form-control select2" id="idproveedor" style="width: 100%;">
                                    <option value='0' selected='selected' disabled>Seleccione</option>    
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                                <span id="sidproveedor"></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar_compra" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

        <div class="modal fade" id="gestion-proveedor">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <input type="hidden" id="accion_proveedor">
                        <input type="hidden" id="id">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" class="form-control" id="cedula" placeholder="">
                                    <span id="scedula"></span>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="nombre_proveedor">Nombre o Razón Social</label>
                                    <input type="text" class="form-control" id="nombre_proveedor" placeholder="">
                                    <span id="snombre_proveedor"></span>
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
                    <button type="button" id="enviar_proveedor" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>  

        <?php include_once(COMPONENT.'script.php'); ?>
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
    <script src=<?php echo VALIDATION.'almacen.js';?>></script>
    <script>
  $(function () {
    $('.select2').select2();
    $("#inventario").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#inventario_wrapper .col-md-6:eq(0)');
    $("#proveedor").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "pdf", "print"]
    }).buttons().container().appendTo('#proveedor_wrapper .col-md-6:eq(0)');
    $("#compra").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "pdf", "print"]
    }).buttons().container().appendTo('#compra_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>