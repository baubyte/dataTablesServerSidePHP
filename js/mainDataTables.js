$(document).ready(function() {
            $('#countryTable').DataTable({
                'language': {
                    'url': '/dataTables/Spanish.json'
                },
                'lengthMenu': [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'Todos']
                ],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B> <'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    {
                        //Botón para Excel
                        extend: 'excelHtml5',
                        title: 'Excel',
                        filename: 'ExportExcel',
                        className:'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i>'
                    },
                    {
                        //Botón para CSV
                        extend: 'csvHtml5',
                        title: 'CSV',
                        filename: 'ExportCSV',
                        className:'btn btn-warning',
                        text: '<i class="fas fa-file-csv"></i>'
                    },
                    {
                        //Botón para PDF
                        extend: 'pdfHtml5',
                        title: 'PDF',
                        filename: 'ExportPDF',
                        className:'btn btn-danger',
                        text: '<i class="far fa-file-pdf"></i>'
                    },
                    {
                        //Botón para Copiar a Portapapeles
                        extend: 'copyHtml5',
                        title: 'Portapapeles',
                        className:'btn btn-secondary',
                        text: '<i class="fas fa-copy"></i>'
                    },
                    {
                        //Botón para Imprimir
                        extend: 'print',
                        title: 'Imprimir',
                        className:'btn btn-dark',
                        text: '<i class="fas fa-print"></i>'
                    },
                    {
                        //Botón para Ocultar Columnas
                        extend: 'colvis',
                        title: 'Ocultar',
                        className:'btn btn-info',
                        text: '<i class="fas fa-eye-slash"></i>'
                    }
                ],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'POST',
                'ajax': {
                    'url': 'ajaxCountry.php'
                },
                'columns': [{
                        data: 'Code'
                    },
                    {
                        data: 'Name'
                    },
                    {
                        data: 'Continent'
                    },
                    {
                        data: 'Region'
                    },
                    {
                        data: 'Population'
                    },
                    {
                        data: 'LifeExpectancy'
                    },
                    {
                        data: 'Capital'
                    },
                ]
            });
        });