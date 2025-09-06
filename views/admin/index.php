<?php include_once 'views/templates/header.php'; ?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-12">
            <div class="card bg-secondary text-white">
                <div class="card-header text-center">
                    <h3 class="user"><i class="fa fa-users me-2"></i>Datos de la Empresa</h3>
                    <hr class="linea-negra">
                </div>
                <div class="card-body">
                    <div class="h-100 bg-secondary rounded">
                    </div>
                    <div class="bg-secondary rounded h-100">
                        <form class="p-4" id="formulario" autocomplete="off">
                            <input type="hidden" id="id" name="id" value="<?php echo $data['empresa']['id']; ?>">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Nit <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control" id="ruc" name="ruc" value="<?php echo $data['empresa']['ruc']; ?>" placeholder="ingrese su nombre" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span id="errorRuc" class="text-danger"></span>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Nombre <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data['empresa']['nombre']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span id="errorNombre" class="text-danger"></span>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Telefono <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $data['empresa']['telefono']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span id="errorTelefono" class="text-danger"></span>
                                </div>
                                 <div class="col-lg-8 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Dirección <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $data['empresa']['direccion']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span id="errorDireccion" class="text-danger"></span>
                                </div>
                                 <div class="col-lg-4 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Correo <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data['empresa']['correo']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <span id="errorCorreo" class="text-danger"></span>
                                </div>
                                 <div class="col-lg-8 col-sm-6">
                                    <label for="nombre" class="form-label text-white mb-2">Mensaje (opcional)</label>
                                    <div class="form-group">                                        
                                        <textarea id="mensaje" class="form-control" name="mensaje" rows="3" placeholder="Mensaje de Agradecimiento"><?php echo $data['empresa']['mensaje']; ?></textarea>
                                    </div>                                   
                                </div>                               
                                <div class="col-lg-4 col-sm-6">
                                    <label for="nombre" class="form-label mb-2">Impuesto (opcional)</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-percent"></i></span>
                                        <input type="number" class="form-control" id="impuesto" name="impuesto" class="form-control" value="<?php echo $data['empresa']['impuesto']; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>                                
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit" id="btnAccion">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/templates/footer.php'; ?>