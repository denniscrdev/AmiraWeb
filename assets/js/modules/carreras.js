let tblCarreras;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const id = document.querySelector('#id');
const nombre = document.querySelector('#nombre');
const sigla = document.querySelector('#sigla');
const delegado = document.querySelector('#delegado');
const contacto = document.querySelector('#contacto');
const mensaje = document.querySelector('#mensaje');

const errorNombre = document.querySelector('#errorNombre');
const errorSigla = document.querySelector('#errorSigla');
const errorDelegado = document.querySelector('#errorDelegado');
const errorContacto = document.querySelector('#errorContacto');

document.addEventListener('DOMContentLoaded', function () {
    tblCarreras = $('#tblCarreras').DataTable({
        ajax: {
            url: base_url + 'carreras/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre' },
            { data: 'sigla' },
            { data: 'delegado' },
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

    btnNuevo.addEventListener('click', function () {
        id.value = '';
        btnAccion.textContent = 'Registrar';
        formulario.reset();
    });

    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        errorNombre.textContent = '';
        errorSigla.textContent = '';
        errorDelegado.textContent = '';
        errorContacto.textContent = '';

        if (nombre.value == '') {
            errorNombre.textContent = 'EL NOMBRE ES REQUERIDO';
        } else if (sigla.value == '') {
            errorSigla.textContent = 'LA SIGLA ES REQUERIDA';
        } else if (delegado.value == '') {
            errorDelegado.textContent = 'EL DELEGADO ES REQUERIDO';
        } else if (contacto.value == '') {
            errorContacto.textContent = 'EL CONTACTO ES REQUERIDO';
        } else {
            const url = base_url + 'carreras/registrar';
            insertarRegistros(url, this, tblCarreras, btnAccion, false);
        }
    });
});

function eliminarCarrera(idCarrera) {
    const url = base_url + 'carreras/eliminar/' + idCarrera;
    eliminarRegistros(url, tblCarreras);
}

function editarCarrera(idCarrera) {
    const url = base_url + 'carreras/editar/' + idCarrera;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            nombre.value = res.nombre;
            sigla.value = res.sigla;
            delegado.value = res.delegado;
            contacto.value = res.contacto;
            mensaje.value = res.mensaje ?? '';
            btnAccion.textContent = 'Actualizar';

            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
            firstTab.show();
        }
    }
}
