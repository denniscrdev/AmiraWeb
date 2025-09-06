<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header mb-2 text-center">
                    <h3 class="user"><i class="fa fa-users me-2"></i>Usuarios</h3>
                    <hr class="linea-negra">
                </div>
                <div class="card-body">
                    <div class="text-end">
                        <a href="<?php echo BASE_URL . 'usuarios/inactivos'; ?>"><i class="fas fa-trash text-danger me-2"></i>Usuarios Inactivos</a>
                    </div>
                    <div class="h-100 bg-secondary rounded">
                    </div>
                    <div class="bg-secondary rounded h-100">
                        <!-- <h6 class="mb-4">Pills Navs &amp; Tabs</h6> -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                            <!-- tab-1 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav_listar-tab" data-bs-toggle="pill" data-bs-target="#nav_listar" type="button" role="tab" aria-controls="nav_listar" aria-selected="true">Usuarios</button>
                            </li>
                            <!-- tab-2 -->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav_registrar-tab" data-bs-toggle="pill" data-bs-target="#nav_registrar" type="button" role="tab" aria-controls="nav_registrar" aria-selected="false">Nuevo</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- PRIMER TAB -->
                            <div class="tab-pane fade active show" id="nav_listar" role="tabpanel" aria-labelledby="nav_listar-tab">
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
                            <!-- SEGUNDO TAB -->
                            <div class="tab-pane fade" id="nav_registrar" role="tabpanel" aria-labelledby="nav_registrar-tab">
                                <div class="bg-secondary rounded h-100">
                                    <!-- <h6 class="mb-4">Input Group</h6> -->
                                    <form class="p-4" id="formulario" autocomplete="off">
                                        <input type="hidden" id="id" name="id">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Nombres</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="ingrese su nombre" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorNombre" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Apelido</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorApellido" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Correo</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorCorreo" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Telefono</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorTelefono" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-8 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Dirección</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorDireccion" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Clave</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                                    <input type="password" class="form-control" id="clave" name="clave" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <span id="errorClave" class="text-danger"></span>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <label for="nombre" class="form-label mb-2">Rol</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-person-fill"></i></span>
                                                    <select class="form-select" id="rol" name="rol" aria-label="Example select with button addon">
                                                        <option value="" selected>Escoge un rol</option>
                                                        <option value="1">Administrador</option>
                                                        <option value="2">Vendedor</option>
                                                    </select>
                                                </div>
                                                <span id="errorRol" class="text-danger"></span>
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