let tblCate_danza;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblCate_danza = $('#tblCate_danza').DataTable({
        ajax: {
            url: base_url + 'cate_danza/listarInactivos',
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
})

//function para elimnar usuario
function restaurarCate_danza(idCate_danza) {
    const url = base_url + 'cate_danza/restaurar/' + idCate_danza;
    restaurarRegistros(url, tblCate_danza);
}