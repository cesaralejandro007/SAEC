<!DOCTYPE html>
<html lang="en">

<?php include_once(COMPONENT.'head.php'); ?>
<link rel="stylesheet" href=<?php echo LIB.'bs-stepper/css/bs-stepper.min.css';?>>
<style>
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
                            <h1>Procesos: Molino - Cotufado - Peletizado</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1" style="background-color: #343a40">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Principal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Parte 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Parte 3</a>
                                </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
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
                                                                    XXXXXX
                                                                </th>
                                                                <th>
                                                                    XXXXXXXX
                                                                </th>
                                                                <th>
                                                                    XXXXXX
                                                                </th>
                                                                <th>
                                                                    XXXXXXXX
                                                                </th>
                                                                <th>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($r1 as $valor) {?>
                                                            <tr>
                                                                <td>
                                                                    XXXXXX
                                                                </td>
                                                                <td class="project_progress">
                                                                    XXXXXXXXXXX
                                                                </td>
                                                                <td>
                                                                    XXXXXX
                                                                </td>
                                                                <td class="project_progress">
                                                                    XXXXXXXXXXX
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
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark card-tabs">
                            <div class="card-header">

                                <h3 class="card-title">Procesos de producción</h3>

                                <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a style="color: black !important;" class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a style="color: black !important;" class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a style="color: black !important;" class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a style="color: black !important;" class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a style="color: black !important;" class="page-link" href="#">&raquo;</a></li>
                                </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th>Jornada</th>
                                    <th>Progreso</th>
                                    <th style="width: 40px">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                    <tr>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">70%</span></td>
                                    </tr>
                                    <tr>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary">30%</span></td>
                                    </tr>
                                    <tr>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">90%</span></td>
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



    <div class="modal fade" id="gestion-propietario">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Molino - Cotufado - Peletizado</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="bs-stepper">
                  <div class="bs-stepper-header" role="tablist">
                    <!-- your steps here -->
                    <div class="step" data-target="#molino-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="molino-part" id="molino-part-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Molino</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#cotufado-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="cotufado-part" id="cotufado-part-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Cotufado</span>
                      </button>
                    </div>
                    <div class="line"></div>
                    <div class="step" data-target="#paletizado-part">
                      <button type="button" class="step-trigger" role="tab" aria-controls="paletizado-part" id="paletizado-part-trigger">
                        <span class="bs-stepper-circle">3</span>
                        <span class="bs-stepper-label">Paletizado</span>
                      </button>
                    </div>
                  </div>
                  <div class="bs-stepper-content">
                    <!-- your steps content here -->
                    <div id="molino-part" class="content" role="tabpanel" aria-labelledby="molino-part-trigger">
                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <img src=<?php echo IMG.'molino-secado.png';?> class="img-fluid" alt="molino-secado">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="nombre">Dato 1</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Dato 1">
                                        <span id="snombre"></span>
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="telefono">Dato 2</label>
                                        <input type="text" class="form-control" id="telefono" placeholder="Dato 2">
                                        <span id="stelefono"></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="correo">Dato 3</label>
                                        <input type="email" class="form-control" id="correo" placeholder="Dato 3">
                                        <span id="scorreo"></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="telefono_1">Dato 4</label>
                                        <input type="text" class="form-control" id="telefono_1" placeholder="Dato 4">
                                        <span id="stelefono_1"></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="dato">Dato 5</label>
                                        <input type="email" class="form-control" id="dato" placeholder="Dato 5">
                                        <span id="sdato"></span>
                                    </div>
                                </div>
                                
                                <button class="btn btn-dark" onclick="stepper.next()">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div id="cotufado-part" class="content" role="tabpanel" aria-labelledby="cotufado-part-trigger">
                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <img src=<?php echo IMG.'cotufado.png';?> class="img-fluid" alt="cotufado">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="">Dato 1</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 1">
                                        <span id="s"></span>
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="">Dato 2</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 2">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 3</label>
                                        <input type="email" class="form-control" id="" placeholder="Dato 3">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 4</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 4">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 5</label>
                                        <input type="email" class="form-control" id="" placeholder="Dato 5">
                                        <span id=""></span>
                                    </div>
                                </div>
                                <button class="btn btn-primary" onclick="stepper.previous()">Atrás</button>
                                <button class="btn btn-dark" onclick="stepper.next()">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div id="paletizado-part" class="content" role="tabpanel" aria-labelledby="paletizado-part-trigger">
                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <img src=<?php echo IMG.'peletizado.png';?> class="img-fluid" alt="peletizado">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="">Dato 1</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 1">
                                        <span id="s"></span>
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="">Dato 2</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 2">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 3</label>
                                        <input type="email" class="form-control" id="" placeholder="Dato 3">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 4</label>
                                        <input type="text" class="form-control" id="" placeholder="Dato 4">
                                        <span id=""></span>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Dato 5</label>
                                        <input type="email" class="form-control" id="" placeholder="Dato 5">
                                        <span id=""></span>
                                    </div>
                                </div>
                                <button class="btn btn-primary" onclick="stepper.previous()">Atrás</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" id="enviar" class="btn btn-primary">Registrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script src=<?php echo VALIDATION.'propietario.js';?>></script>
    <script src=<?php echo LIB.'bs-stepper/js/bs-stepper.min.js';?>></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
  <?php include_once(COMPONENT.'script.php'); ?>
</body>
</html>