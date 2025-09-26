let tblRol_por_cat;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const id = document.querySelector('#id');
const id_categoria = document.querySelector('#id_categoria');
const nombre = document.querySelector('#nombre');
const precio = document.querySelector('#precio');
const max_integrantes = document.querySelector('#max_integrantes');
const mensaje = document.querySelector('#mensaje');

const errorCategoria = document.querySelector('#errorCategoria');
const errorNombre = document.querySelector('#errorNombre');
const errorPrecio = document.querySelector('#errorPrecio');
const errorIntegrantes = document.querySelector('#errorIntegrantes');

document.addEventListener('DOMContentLoaded', function () {
    // Cargar DataTable
    tblRol_por_cat = $('#tblRol_por_cat').DataTable({
        ajax: {
            url: base_url + 'rol_por_cat/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'categoria' },
            { data: 'nombre' },
            { data: 'precio' },
            { data: 'max_integrantes' },
            { data: 'mensaje' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons,
        responsive: true,
        order: [[0, 'asc']],
    });

    // Botón Nuevo
    btnNuevo.addEventListener('click', function () {
        id.value = '';
        formulario.reset();
        btnAccion.textContent = 'Registrar';
    });

    // Enviar Formulario
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        // Reset errores
        errorCategoria.textContent = '';
        errorNombre.textContent = '';
        errorPrecio.textContent = '';
        errorIntegrantes.textContent = '';

        if (id_categoria.value === '') {
            errorCategoria.textContent = 'Debe seleccionar una categoría';
        } else if (nombre.value.trim() === '') {
            errorNombre.textContent = 'El nombre es requerido';
        } else if (precio.value.trim() === '') {
            errorPrecio.textContent = 'La descripción es requerida';
        } else if (max_integrantes.value === '' || max_integrantes.value <= 0) {
            errorIntegrantes.textContent = 'Debe ingresar un número mayor a 0';
        } else {
            const url = base_url + 'rol_por_cat/registrar';
            insertarRegistros(url, this, tblRol_por_cat, btnAccion, false);
        }
    });
});

// Eliminar
function eliminarRol_por_cat(idRol_por_cat) {
    const url = base_url + 'rol_por_cat/eliminar/' + idRol_por_cat;
    eliminarRegistros(url, tblRol_por_cat);
}

// Editar
function editarRol_por_cat(idRol_por_cat) {
    const url = base_url + 'rol_por_cat/editar/' + idRol_por_cat;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            id_categoria.value = res.id_categoria;
            nombre.value = res.nombre;
            precio.value = res.precio;
            max_integrantes.value = res.max_integrantes;
            mensaje.value = res.mensaje;
            btnAccion.textContent = 'Actualizar';

            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
        }
    }
}
