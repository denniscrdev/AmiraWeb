let tblRol_por_cat;
document.addEventListener('DOMContentLoaded', function () {
    //cargar datos con el plugin datatables
    tblRol_por_cat = $('#tblRol_por_cat').DataTable({
        ajax: {
            url: base_url + 'rol_por_cat/listarInactivos',
            dataSrc: ''
        },
        columns: [
            { data: 'categoria' },
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
function restaurarRol_por_cat(idRol_por_cat) {
    const url = base_url + 'rol_por_cat/restaurar/' + idRol_por_cat;
    restaurarRegistros(url, tblRol_por_cat);
}