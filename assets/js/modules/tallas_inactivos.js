let tblTallas;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblTallas = $('#tblTallas').DataTable({
        ajax: {
            url: base_url + 'tallas/listarInactivos',
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
})

//function para elimnar usuario
function restaurarTalla(idTallas) {
    const url = base_url + 'tallas/restaurar/' + idTallas;
    restaurarRegistros(url, tblTallas);
}