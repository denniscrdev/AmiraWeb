<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header mb-2 text-center ">
                    <!-- Tabs -->
                    <div class="d-flex justify-content-between align-items-center mb-4 py-3 contenedor-usuarios">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <!-- tab-1 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav_listar-tab" data-bs-toggle="pill"
                                    data-bs-target="#nav_listar" type="button" role="tab"
                                    aria-controls="nav_listar" aria-selected="true">Agrupaciones</button>
                            </li>
                            <!-- tab-2 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav_registrar-tab" data-bs-toggle="pill"
                                    data-bs-target="#nav_registrar" type="button" role="tab"
                                    aria-controls="nav_registrar" aria-selected="false">Nuevo</button>
                            </li>
                        </ul>
                        <!-- Enlace meidas inactivos -->
                        <div class="text-end">
                            <a href="<?php echo BASE_URL . 'comparsas/inactivos'; ?>"><i class="fas fa-trash text-danger me-2"></i>Agrupaciones Inactivas</a>
                        </div>
                    </div>
                    <!-- titulo -->
                    <hr class="mb-3 ">
                    <div class="contenedor-titulo">
                        <h3 class="#">
                            <i class="fas fa-graduation-cap me-2"></i>Lista de Agrupaciones
                        </h3>
                    </div>
                    <hr class="mb-3">
                </div>
                <div class="card-body">
                    <div class="bg-secondary rounded h-100">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- PRIMER TAB -->
                            <div class="tab-pane fade active show" id="nav_listar" role="tabpanel" aria-labelledby="nav_listar-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-dark text-center" id="tblComparsas" style="width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">Nombre de la agrupacion</th> <!-- nombre_danza -->
                                                <th class="text-center">Carrera</th> <!-- carrera_id → mostrar nombre -->
                                                <th class="text-center">Categoría de Danza</th> <!-- categoria_id → mostrar nombre -->
                                                <th class="text-center">Responsable</th> <!-- responsable -->
                                                <th class="text-center">Contacto</th> <!-- contacto_responsable -->
                                                <th class="text-center">Integrantes</th> <!-- nro_integrantes / max_integrantes -->
                                                <th class="text-center">Mensaje</th> <!-- mensaje -->
                                                <th class="text-center">Acciones</th> <!-- Editar / Eliminar / Ver integrantes -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- SEGUNDO TAB -->
                            <div class="tab-pane fade" id="nav_registrar" role="tabpanel" aria-labelledby="nav_registrar-tab">
                                <div class="bg-secondary rounded h-100">
                                    <!-- <h6 class="mb-4">Input Group</h6> -->
                                    <form class="p-4" id="formulario" autocomplete="off">
                                        <input type="hidden" id="id" name="id">

                                        <div class="row">

                                            <!-- Nombre de la comparsa -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre_danza" class="form-label mb-2">Nombre de la Comparsa</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="nombre_danza" name="nombre_danza" placeholder="Ingrese nombre de la comparsa">
                                                </div>
                                                <span id="errorNombre" class="text-danger"></span>
                                            </div>

                                            <!-- Carrera -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="carrera_id" class="form-label mb-2">Carrera</label>
                                                <select class="form-select" id="carrera_id" name="carrera_id">
                                                    <option value="">Seleccione una carrera</option>
                                                    <?php foreach ($data['carreras'] as $carrera) { ?>
                                                        <option value="<?php echo $carrera['id']; ?>"><?php echo $carrera['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="errorCarrera" class="text-danger"></span>
                                            </div>

                                            <!-- Categoría de Danza -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="categoria_id" class="form-label mb-2">Categoría de Danza</label>
                                                <select class="form-select" id="categoria_id" name="categoria_id">
                                                    <option value="">Seleccione categoría</option>
                                                    <?php foreach ($data['categorias_danza'] as $categoria) { ?>
                                                        <option value="<?php echo $categoria['id']; ?>">
                                                            <?php echo $categoria['nombre']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <span id="errorCategoria" class="text-danger"></span>
                                            </div>

                                            <!-- Responsable -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="responsable" class="form-label mb-2">Responsable</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                                    <input type="text" class="form-control" id="responsable" name="responsable" placeholder="Nombre del responsable">
                                                </div>
                                                <span id="errorResponsable" class="text-danger"></span>
                                            </div>

                                            <!-- Contacto Responsable -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="contacto_responsable" class="form-label mb-2">Contacto Responsable</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    <input type="text" class="form-control" id="contacto_responsable" name="contacto_responsable" placeholder="Teléfono, correo o WhatsApp">
                                                </div>
                                                <span id="errorContacto_responsable" class="text-danger"></span>
                                            </div>

                                            <!-- Máx. Integrantes -->
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="max_integrantes" class="form-label mb-2">Máx. Integrantes</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                                    <input type="number" class="form-control" id="max_integrantes" name="max_integrantes" placeholder="Número máximo de integrantes">
                                                </div>
                                                <span id="errorIntegrantes" class="text-danger"></span>
                                            </div>

                                            <!-- Mensaje (opcional) -->
                                            <div class="col-lg-12 col-sm-12 mb-3">
                                                <label for="mensaje" class="form-label text-white mb-2">Mensaje (opcional)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                                    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba un mensaje opcional"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-danger" type="button" id="btnNuevo">Nuevo</button>
                                            <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>