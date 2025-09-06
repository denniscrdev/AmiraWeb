const dom = "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>";

const buttons = [
    {
        extend: 'excelHtml5',
        footer: true,
        text: '<span class="badge bg-success" data-bs-toggle="tooltip" title="Exportar a Excel"><i class="fas fa-file-excel"></i></span>',
        className: 'dt-btn-animated'
    },
    {
        extend: 'pdfHtml5',
        download: 'open',
        footer: true,
        text: '<span class="badge bg-danger" data-bs-toggle="tooltip" title="Exportar a PDF"><i class="fas fa-file-pdf"></i></span>',
        exportOptions: { columns: [0, ':visible'] },
        className: 'dt-btn-animated'
    },
    {
        extend: 'copyHtml5',
        footer: true,
        text: '<span class="badge bg-primary" data-bs-toggle="tooltip" title="Copiar al portapapeles"><i class="fas fa-copy"></i></span>',
        exportOptions: { columns: [0, ':visible'] },
        className: 'dt-btn-animated'
    },
    {
        extend: 'print',
        footer: true,
        text: '<span class="badge bg-light" data-bs-toggle="tooltip" title="Imprimir"><i class="fas fa-print"></i></span>',
        className: 'dt-btn-animated'
    },
    {
        extend: 'csvHtml5',
        footer: true,
        text: '<span class="badge bg-success" data-bs-toggle="tooltip" title="Exportar a CSV"><i class="fas fa-file-csv"></i></span>',
        className: 'dt-btn-animated'
    },
    {
        extend: 'colvis',
        text: '<span class="badge bg-info" data-bs-toggle="tooltip" title="Mostrar/Ocultar columnas"><i class="fas fa-columns"></i></span>',
        postfixButtons: ['colvisRestore'],
        className: 'dt-btn-animated'
    }
];
