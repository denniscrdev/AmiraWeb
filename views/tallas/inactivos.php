<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header mb-2 text-center ">

                    <!-- titulo -->
                    <hr class="mb-3 ">
                    <div class="contenedor-titulo">
                        <h3 class="#">
                            <i class="fa fa-users me-2"></i>Carreras Inactivas
                        </h3>
                    </div>
                    <hr class="mb-3">
                </div>
                <div class="card-body">
                    <div class="bg-secondary rounded h-100">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark text-center" id="tblTallas" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Talla</th>
                                        <th class="text-center">Mensaje</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>