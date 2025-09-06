let tblCarreras;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblCarreras = $('#tblCarreras').DataTable({
        ajax: {
            url: base_url + 'carreras/listarInactivos',
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
})

//function para elimnar usuario
function restaurarCarrera(idCarrera) {
    const url = base_url + 'carreras/restaurar/' + idCarrera;
    restaurarRegistros(url, tblCarreras);
}