<!-- Header Start -->
<header class="bg-black py-1">
  <div class="container">
    <div class="row align-items-center">

      <!-- Logo -->
      <div class="col-12 col-md-2 text-center text-md-start mb-2 mb-md-0">
        <a href="<?php echo BASE_URL; ?>home/index">
          <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt="Logo" class="img-fluid" style="max-height:100px;">
        </a>
      </div>

      <!-- Categorías + Buscador -->
      <div class="col-12 col-md-7 mb-2 mb-md-0">
        <div class="d-flex">
          <div class="dropdown me-2">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-list"></i> Categorías
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Categoría 1</a></li>
              <li><a class="dropdown-item" href="#">Categoría 2</a></li>
            </ul>
          </div>
          <div class="flex-grow-1">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar...">
              <button class="btn btn-danger"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Carrito -->
      <div class="col-12 col-md-3 d-flex justify-content-md-end justify-content-center">
        <a href="#" class="btn btn-outline-light me-2">
          <i class="bi bi-cart"></i>
        </a>
        <span class="text-white small align-self-center">USD $0</span>
      </div>

    </div>
  </div>
</header>
<!-- Header End -->
