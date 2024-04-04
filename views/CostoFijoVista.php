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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once(COMPONENT.'panel_nav.php'); ?>
        <?php include_once(COMPONENT.'header.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Costo Fijo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Costo Fijo</li>
                        </ol>
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-secondary" id="nuevo"><i class="fas fa-plus"></i> Nuevo tipo</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Pago de</th>
                                        <th>Cantidad</th>
                                        <th>Precio $</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>04-04-2024</td>
                                        <td>Wifi</td>
                                        <td>1</td>
                                        <td>25</td>
                                        <td>25</td>
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
                                        <td>04-04-2024</td>
                                        <td>Wifi</td>
                                        <td>1</td>
                                        <td>25</td>
                                        <td>25</td>
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
                                        <td>04-04-2024</td>
                                        <td>Wifi</td>
                                        <td>1</td>
                                        <td>25</td>
                                        <td>25</td>
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
                                        <th>Fecha</th>
                                        <th>Pago de</th>
                                        <th>Cantidad</th>
                                        <th>Precio $</th>
                                        <th>Total</th>
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
            </section>
        </div>


        <?php include_once(COMPONENT.'footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <div class="modal fade" id="gestion">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                    <h4 class="modal-title">Costo Fijo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <input type="hidden" id="accion_costo_fijo">
                        <input type="hidden" id="id_costo_fijo">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" placeholder="">
                                    <span id="sfecha"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="id_tipo">Caracteristica</label>
                                    <select name="" class="form-control" id="id_tipo">
                                        <option value="" seleted disabled>Seleccione</option>
                                        <option value="">Wifi</option>
                                        <option value="">Agua</option>
                                        <option value="">Alquiler</option>
                                        <option value="">Salario</option>
                                    </select>
                                    <span id="sid_tipo"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion_costo" cols="20" rows="5"></textarea>
                                    <span id="sdescripcion_costo"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" placeholder="">
                                    <span id="scantidad"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="precio_costo">Precio</label>
                                    <input type="text" class="form-control" id="precio_costo" placeholder="">
                                    <span id="sprecio_costo"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total</label>
                                    <p>xx $</p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="enviar_costo" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>  
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
    <script src=<?php echo VALIDATION.'tipo_costo.js';?>></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>