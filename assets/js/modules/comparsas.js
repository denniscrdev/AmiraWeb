let tblComparsas;
const btnAccion = document.querySelector('#btnAccion');
const btnNuevo = document.querySelector('#btnNuevo');
const formulario = document.querySelector('#formulario');

const id = document.querySelector('#id');
const nombre_danza = document.querySelector('#nombre_danza');
const carrera_id = document.querySelector('#carrera_id');
const categoria_id = document.querySelector('#categoria_id');
const responsable = document.querySelector('#responsable');
const contacto_responsable = document.querySelector('#contacto_responsable');
const max_integrantes = document.querySelector('#max_integrantes');
const mensaje = document.querySelector('#mensaje');

const errorNombre = document.querySelector('#errorNombre');
const errorCarrera = document.querySelector('#errorCarrera');
const errorCategoria = document.querySelector('#errorCategoria');
const errorResponsable = document.querySelector('#errorResponsable');
const errorContacto_responsable = document.querySelector('#errorContacto_responsable');
const errorIntegrantes = document.querySelector('#errorIntegrantes');

document.addEventListener('DOMContentLoaded', function () {
    tblComparsas = $('#tblComparsas').DataTable({
        ajax: {
            url: base_url + 'comparsas/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombre_danza' },
            { data: 'carrera' },
            { data: 'categoria' },
            { data: 'responsable' },
            { data: 'contacto_responsable' },
            { data: 'nro_integrantes' },
            { data: 'mensaje' },
            { data: 'acciones' }
        ],
        language: {
            url: base_url + 'assets/js/espanol.json'
        },
        dom,
        buttons,
        responsive: true,
        order: [[0, 'asc']]
    });

    btnNuevo.addEventListener('click', function () {
        id.value = '';
        formulario.reset();
        btnAccion.textContent = 'Registrar';
    });
//  enviar datos
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        errorNombre.textContent = '';
        errorCarrera.textContent = '';
        errorCategoria.textContent = '';
        errorResponsable.textContent = '';
        errorContacto_responsable.textContent = '';
        errorIntegrantes.textContent = '';

        if (nombre_danza.value == '') {
            errorNombre.textContent = 'Debe ingresar nombre de la comparsa';
        } else if (carrera_id.value == '') {
            errorCarrera.textContent = 'Debe seleccionar una carrera';
        } else if (categoria_id.value == '') {
            errorCategoria.textContent = 'Debe seleccionar una categoría';
        } else if (responsable.value == '') {
            errorResponsable.textContent = 'Debe ingresar un responsable';
        } else if (contacto_responsable.value == '') {
            errorContacto_responsable.textContent = 'Debe ingresar un contacto';
        } else if (max_integrantes.value == '' || max_integrantes.value <= 0) {
            errorIntegrantes.textContent = 'Debe ingresar un número válido de integrantes';
        } else {
            const url = base_url + 'comparsas/registrar';
            insertarRegistros(url, this, tblComparsas, btnAccion, false);
        }
    });
});

function eliminarComparsa(idComparsas) {
    const url = base_url + 'comparsas/eliminar/' + idComparsas;
    eliminarRegistros(url, tblComparsas);
}

function editarComparsa(idComparsas) {
    const url = base_url + 'comparsas/editar/' + idComparsas;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            id.value = res.id;
            nombre_danza.value = res.nombre_danza;
            carrera_id.value = res.carrera_id;
            categoria_id.value = res.categoria_id;
            responsable.value = res.responsable;
            contacto_responsable.value = res.contacto_responsable;
            max_integrantes.value = res.nro_integrantes;
            mensaje.value = res.mensaje;
            btnAccion.textContent = 'Actualizar';
            
            // 👉 Abrir tab de registro
            let tab = new bootstrap.Tab(document.querySelector('#nav_registrar-tab'));
            tab.show();
            
        }
    }
}
