<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header text-center">
                    <h3 class="py-2"><i class="fa fa-users me-2"></i>Usuarios Inactivos</h3>
                </div>
                <div class="card-body py-1">
                    <div class="h-100 bg-secondary rounded">
                    </div>
                    <div class="bg-secondary rounded h-100">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-dark text-center" id="tblUsuarios" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Correo</th>
                                        <th class="text-center">Telefono</th>
                                        <th class="text-center">Dirección</th>
                                        <th class="text-center">Rol</th>
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