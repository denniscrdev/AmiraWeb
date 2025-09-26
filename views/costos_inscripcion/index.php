<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header mb-2 text-center">
                    <!-- Tabs -->
                    <div class="d-flex justify-content-between align-items-center mb-4 py-3">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <!-- tab-1 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav_listar-tab" data-bs-toggle="pill"
                                    data-bs-target="#nav_listar" type="button" role="tab"
                                    aria-controls="nav_listar" aria-selected="true">Costos</button>
                            </li>
                            <!-- tab-2 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav_registrar-tab" data-bs-toggle="pill"
                                    data-bs-target="#nav_registrar" type="button" role="tab"
                                    aria-controls="nav_registrar" aria-selected="false">Nuevo</button>
                            </li>
                        </ul>
                        <!-- Enlace inactivos -->
                        <div class="text-end">
                            <a href="<?php echo BASE_URL . 'costos_inscripcion/inactivos'; ?>">
                                <i class="fas fa-trash text-danger me-2"></i>Costos Inactivos
                            </a>
                        </div>
                    </div>
                    <hr class="mb-3 ">
                    <div class="contenedor-titulo">
                        <h3>
                            <i class="fas fa-dollar-sign me-2"></i>Listado de Costos de Inscripción
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
                                    <table class="table table-bordered table-striped table-dark text-center" id="tblCostos" style="width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">Categoría</th>
                                                <th class="text-center">Rol</th>
                                                <th class="text-center">Monto</th>
                                                <th class="text-center">Descripción</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <!-- SEGUNDO TAB -->
                            <div class="tab-pane fade" id="nav_registrar" role="tabpanel" aria-labelledby="nav_registrar-tab">
                                <div class="bg-secondary rounded h-100">
                                    <form class="p-4" id="formulario" autocomplete="off">
                                        <input type="hidden" id="id" name="id">

                                        <div class="row">

                                            <!-- Categoría -->
                                            <div class="col-lg-6 col-sm-6">
                                                <label for="categoria_id" class="form-label mb-2">Categoría</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                                    <select id="categoria_id" name="categoria_id" class="form-select">
                                                        <option value="">Seleccione...</option>
                                                        <?php foreach ($data['categorias'] as $cat) { ?>
                                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nombre']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span id="errorCategoria" class="text-danger"></span>
                                            </div>

                                            <!-- Rol -->
                                            <div class="col-lg-6 col-sm-6">
                                                <label for="rol_id" class="form-label mb-2">Rol (opcional)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                    <select id="rol_id" name="rol_id" class="form-select">
                                                        <option value="">General</option>
                                                        <?php foreach ($data['roles'] as $rol) { ?>
                                                            <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Monto -->
                                            <div class="col-lg-6 col-sm-6">
                                                <label for="monto" class="form-label mb-2">Monto</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                    <input type="number" step="0.01" class="form-control" id="monto" name="monto" placeholder="Ej: 50.00">
                                                </div>
                                                <span id="errorMonto" class="text-danger"></span>
                                            </div>

                                            <!-- Descripción -->
                                            <div class="col-lg-12 col-sm-12 mb-3">
                                                <label for="descripcion" class="form-label text-white mb-2">Descripción</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba un mensaje opcional"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <button class="btn btn-danger" type="button" id="btnNuevo">Nuevo</button>
                                            <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- fin segundo tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>
