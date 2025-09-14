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
                            <i class="fa fa-users me-2"></i>Comparsas Inactivas
                        </h3>
                    </div>
                    <hr class="mb-3">
                </div>
                <div class="card-body">
                    <div class="bg-secondary rounded h-100">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark text-center" id="tblComparsas" style="width: 100%;">
                                <thead class="thead-light">
                                    <th class="text-center">Nombre de la Comparsa</th> <!-- nombre_danza -->
                                    <th class="text-center">Carrera</th> <!-- carrera_id → mostrar nombre -->
                                    <th class="text-center">Categoría de Danza</th> <!-- categoria_id → mostrar nombre -->
                                    <th class="text-center">Responsable</th> <!-- responsable -->
                                    <th class="text-center">Contacto</th> <!-- contacto_responsable -->
                                    <th class="text-center">Integrantes</th> <!-- nro_integrantes / max_integrantes -->
                                    <th class="text-center">Mensaje</th> <!-- mensaje -->
                                    <th class="text-center">Acciones</th> <!-- Editar / Eliminar / Ver integrantes -->
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