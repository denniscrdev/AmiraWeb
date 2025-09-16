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
                                    aria-controls="nav_listar" aria-selected="true">Integrantes</button>
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
                            <a href="<?php echo BASE_URL . 'integrantes/inactivos'; ?>"><i class="fas fa-trash text-danger me-2"></i>Integrantes inactivos</a>
                        </div>
                    </div>
                    <!-- titulo -->
                    <hr class="mb-3 ">
                    <div class="contenedor-titulo">
                        <h3 class="#">
                            <i class="fas fa-graduation-cap me-2"></i>Integrantes por agrupacion
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
                                    <table class="table table-bordered table-striped table-dark text-center" id="tblIntegrantes" style="width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">Comparsa</th>
                                                <th class="text-center">Rol</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Contacto</th>
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

                                            <!-- TODO comparsa a la que pertenece -->
                                            <div class="col-lg-2 col-sm-6">
                                                <label for="id_categoria" class="form-label mb-2">Agrupacion <span class="text-danger">*</span></label>
                                                <select id="comparsa_id" name="comparsa_id" class="form-select">
                                                    <option value="">Seleccionar</option>
                                                    <?php foreach ($data['comparsas'] as $comparsa) { ?>
                                                        <option value="<?php echo $comparsa['id']; ?>"><?php echo $comparsa['nombre_danza']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="errorAgrupacion" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Relación con el rol (Danzarín, Guía, Banda, etc.) -->
                                            <div class="col-lg-2 col-sm-6">
                                                <label for="id_categoria" class="form-label mb-2">Rol <span class="text-danger">*</span></label>
                                                <select id="rol_id" name="rol_id" class="form-select">
                                                    <option value="">Seleccionar</option>
                                                    <?php foreach ($data['roles_categoria'] as $rol) { ?>
                                                        <option value="<?php echo $rol['id']; ?>"><?php echo $rol['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="errorRol" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Nombre -->
                                            <div class="col-lg-5 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Nombre del integrante</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre">
                                                </div>
                                                <span id="errorNombre" class="text-danger"></span>
                                            </div>

                                            <!-- TODO Teléfono o medio de contacto -->
                                            <div class="col-lg-3 col-sm-6">
                                                <label for="contacto" class="form-label mb-2">Contacto</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                                    <input type="number" class="form-control" id="contacto" name="contacto" placeholder="Número máximo de integrantes">
                                                </div>
                                                <span id="errorContacto" class="text-danger"></span>
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