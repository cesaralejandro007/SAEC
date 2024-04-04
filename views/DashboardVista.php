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
            <section class="content">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="container">
                        <!-- Small Box (Stat card) -->
                        <h5 class="mb-2 mt-4">Menú Principal</h5>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Compras</h3>

                                    <p>Materia Prima</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Proveedores<sup style="font-size: 20px"></sup></h3>

                                    <p>Guardados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Ventas</h3>

                                    <p>De recetas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-check-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Clientes</h3>

                                    <p>Guardados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Pagos</h3>

                                    <p>Costos Fijos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Almacén<sup style="font-size: 20px"></sup></h3>

                                    <p>Materia Prima</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-paste"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Recetas</h3>

                                    <p>Para la venta</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Archivo</h3>

                                    <p>Registros</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Reportes<sup style="font-size: 20px"></sup></h3>

                                    <p>Materia Prima</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Seguridad</h3>

                                        <p>Configuraciones</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-unlock-alt"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                        <!-- /.row -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once(COMPONENT.'footer.php'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>


  <?php include_once(COMPONENT.'script.php'); ?>
</body>
</html>