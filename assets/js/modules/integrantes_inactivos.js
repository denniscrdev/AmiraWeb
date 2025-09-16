let tblIntegrantes;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblIntegrantes = $('#tblIntegrantes').DataTable({
        ajax: {
            url: base_url + 'integrantes/listarInactivos',
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
})

//function para restaurar usuario
function restaurarIntegrante(idIntegrantes) {
    const url = base_url + 'integrantes/restaurar/' + idIntegrantes;
    restaurarRegistros(url, tblIntegrantes);
}