let tblCate_danza;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const id = document.querySelector('#id');
const nombre = document.querySelector('#nombre');
const descripcion = document.querySelector('#descripcion');
const max_integrantes = document.querySelector('#max_integrantes');
const mensaje = document.querySelector('#mensaje');

// Errores
const errorNombre = document.querySelector('#errorNombre');
const errorDescripcion = document.querySelector('#errorDescripcion');
const errorIntegrantes = document.querySelector('#errorIntegrantes');

document.addEventListener('DOMContentLoaded', function () {
    // cargar datos con DataTable
    tblCate_danza = $('#tblCate_danza').DataTable({
        ajax: {
            url: base_url + 'cate_danza/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre' },
            { data: 'descripcion' },
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
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    });

    // Enviar formulario
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        // reset errores
        errorNombre.textContent = '';
        errorDescripcion.textContent = '';
        errorIntegrantes.textContent = '';

        if (nombre.value.trim() === '') {
            errorNombre.textContent = 'El nombre es requerido';
        } else if (descripcion.value.trim() === '') {
            errorDescripcion.textContent = 'La descripción es requerida';
        } else if (max_integrantes.value === '' || max_integrantes.value <= 0) {
            errorIntegrantes.textContent = 'Debe ingresar un número mayor a 0';
        } else {
            const url = base_url + 'cate_danza/registrar';
            insertarRegistros(url, this, tblCate_danza, btnAccion, false);
        }
    });
});

function eliminarCate_danza(idCate_danza) {
    const url = base_url + 'cate_danza/eliminar/' + idCate_danza;
    eliminarRegistros(url, tblCate_danza);
}

function editarCate_danza(idCate_danza) {
    const url = base_url + 'cate_danza/editar/' + idCate_danza;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            nombre.value = res.nombre;
            descripcion.value = res.descripcion;
            max_integrantes.value = res.max_integrantes;
            mensaje.value = res.mensaje ?? '';
            btnAccion.textContent = 'Actualizar';

            // 👉 Abrir tab de registro
            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
            firstTab.show();
        }
    }
}
