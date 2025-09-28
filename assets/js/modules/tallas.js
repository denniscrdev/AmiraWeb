let tblTallas;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const id = document.querySelector('#id');
const nombre = document.querySelector('#nombre');
const talla = document.querySelector('#talla');
const descripcion = document.querySelector('#descripcion');

const errorNombre = document.querySelector('#errorNombre');
const errorTalla = document.querySelector('#errorTalla');

document.addEventListener('DOMContentLoaded', function () {
    tblTallas = $('#tblTallas').DataTable({
        ajax: {
            url: base_url + 'tallas/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre' },
            { data: 'talla' },
            { data: 'descripcion' },
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

    btnNuevo.addEventListener('click', function () {
        id.value = '';
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    });

    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorNombre.textContent = '';
        errorTalla.textContent = '';

        if (nombre.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        } else if (talla.value == '') {
            errorTalla.textContent = 'LA TALLA ES REQUERIDA';
        } else {
            const url = base_url + 'tallas/registrar';
            insertarRegistros(url, this, tblTallas, btnAccion, false);
        }
    });
});

// === Funciones para tallas ===
function eliminarTalla(idTallass) {
    const url = base_url + 'tallas/eliminar/' + idTallass;
    eliminarRegistros(url, tblTallas);
}

function editarTalla(idTallas) {
    const url = base_url + 'tallas/editar/' + idTallas;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            nombre.value = res.nombre;
            talla.value = res.talla;
            descripcion.value = res.descripcion; // corregido
            btnAccion.textContent = 'Actualizar';

            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
            firstTab.show();
        }
    }
}