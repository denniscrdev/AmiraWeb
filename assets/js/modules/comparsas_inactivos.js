let tblComparsas;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblComparsas = $('#tblComparsas').DataTable({
        ajax: {
            url: base_url + 'comparsas/listarInactivos',
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
        order: [[0, 'asc']],
    });
})

//function para elimnar usuario
function restaurarComparsa(idComparsas) {
    const url = base_url + 'comparsas/restaurar/' + idComparsas;
    restaurarRegistros(url, tblComparsas);
}
