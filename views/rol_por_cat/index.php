
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
                                    aria-controls="nav_listar" aria-selected="true">Categorias de Danza</button>
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
                            <a href="<?php echo BASE_URL . 'rol_por_cat/inactivos'; ?>"><i class="fas fa-trash text-danger me-2"></i>Categorias Inactivas</a>
                        </div>
                    </div>
                    <!-- titulo -->
                    <hr class="mb-3 ">
                    <div class="contenedor-titulo">
                        <h3 class="#">
                            <i class="fas fa-graduation-cap me-2"></i>Rol por Categoria de Danza
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
                                    <table class="table table-bordered table-striped table-dark text-center" id="tblRol_por_cat" style="width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">Categoria</th>
                                                <th class="text-center">Rol</th>
                                                <th class="text-center">Precio del rol</th>
                                                <th class="text-center">Máx. Integrantes</th>
                                                <th class="text-center">Mensaje</th>
                                                <th class="text-center">Acciones</th>
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

                                            <!-- TODO Categoría de Danza -->
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="id_categoria" class="form-label mb-2">Categoría de Danza <span class="text-danger">*</span></label>
                                                <select id="id_categoria" name="id_categoria" class="form-select">
                                                    <option value="">Seleccione...</option>

                                                    <?php foreach ($data['categorias'] as $cat) { ?>
                                                        <option value="<?php echo $cat['id']; ?>">
                                                            <?php echo $cat['nombre']; ?>
                                                        </option>
                                                    <?php } ?>


                                                </select>
                                                <span id="errorCategoria" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Nombre -->
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="nombre" class="form-label">Nombre del Rol <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Figura, Danzarín">
                                                </div>
                                                <span id="errorNombre" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Precio de rol -->
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="precio" class="form-label mb-2">Precio del rol</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                    <input type="number" step="0.01" min="0.01" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio del rol">
                                                </div>
                                                <span id="errorPrecio" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Máx. Integrantes -->
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="max_integrantes" class="form-label mb-2">Máx. Integrantes</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                                    <input type="number" class="form-control" id="max_integrantes" name="max_integrantes" placeholder="Máximo de integrantes">
                                                </div>
                                                <span id="errorIntegrantes" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Mensaje (opcional) -->
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