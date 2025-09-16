let tblIntegrantes;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

//recuperando el id de cada imput
const id = document.querySelector('#id');
const comparsa_id = document.querySelector('#comparsa_id');
const rol_id = document.querySelector('#rol_id');
const nombre = document.querySelector('#nombre');
const contacto = document.querySelector('#contacto'); // 👈 cambiar en tu HTML
const mensaje = document.querySelector('#mensaje');

// Errores
const errorAgrupacion = document.querySelector('#errorAgrupacion');
const errorRol = document.querySelector('#errorRol');
const errorNombre = document.querySelector('#errorNombre');
const errorContacto = document.querySelector('#errorContacto');

document.addEventListener('DOMContentLoaded', function () {
    // cargar datos con DataTable
    tblIntegrantes = $('#tblIntegrantes').DataTable({
        ajax: {
            url: base_url + 'integrantes/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'comparsa' },
            { data: 'rol' },
            { data: 'nombre' },
            { data: 'contacto' },
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
        errorAgrupacion.textContent = '';
        errorRol.textContent = '';
        errorNombre.textContent = '';
        errorContacto.textContent = '';

        if (comparsa_id.value == '') {
            errorAgrupacion.textContent = 'Debe seleccionar una agrupación';
        } else if (rol_id.value == '') {
            errorRol.textContent = 'Debe seleccionar un rol';
        } else if (nombre.value == '') {
            errorNombre.textContent = 'El nombre es requerido';
        } else if (contacto.value == '') {
            errorContacto.textContent = 'Debe ingresar un número de contacto';
        } else {
            const url = base_url + 'integrantes/registrar';
            insertarRegistros(url, this, tblIntegrantes, btnAccion, false);
        }
    });
});

function eliminarIntegrante(idIntegrantes) {
    const url = base_url + 'integrantes/eliminar/' + idIntegrantes;
    eliminarRegistros(url, tblIntegrantes);
}

function editarIntegrante(idIntegrantes) {
    const url = base_url + 'integrantes/editar/' + idIntegrantes;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            comparsa_id.value = res.comparsa_id;
            rol_id.value = res.rol_id;
            nombre.value = res.nombre;
            contacto.value = res.contacto;
            mensaje.value = res.mensaje ?? '';
            btnAccion.textContent = 'Actualizar';

            // 👉 Abrir tab de registro
            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
        }
    }
}
