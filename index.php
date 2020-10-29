<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables PHP</title>
    <!-- Archivos CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="dataTables/dataTables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dataTables/responsive/css/responsive.bootstrap4.css">
    <link rel="stylesheet" href="dataTables/buttons/css/buttons.bootstrap4.css">
    <!-- Archivos para Incluir -->
</head>

<body class="container-fluid">
    <h1>DataTables PHP</h1>
    <table id="countryTable" class="table table-bordered table-sm table-hover table-dark table-striped dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Continente</th>
                <th>Region</th>
                <th>Población</th>
                <th>Expectativa de Vida</th>
                <th>Capital</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- JavaScript -->
    <script src="jquery/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="dataTables/dataTables/js/jquery.dataTables.js"></script>
    <script src="dataTables/dataTables/js/dataTables.bootstrap4.js"></script>
    <script src="dataTables/buttons/js/dataTables.buttons.js"></script>
    <script src="dataTables/buttons/js/buttons.bootstrap4.js"></script>
    <script src="dataTables/JSZip/jszip.js"></script>
    <script src="dataTables/pdfMake/pdfmake.js"></script>
    <script src="dataTables/pdfMake/vfs_fonts.js"></script>
    <script src="dataTables/buttons/js/buttons.html5.js"></script>
    <script src="dataTables/buttons/js/buttons.colVis.js"></script>
    <script src="dataTables/buttons/js/buttons.print.js"></script>
    <script src="dataTables/responsive/js/dataTables.responsive.js"></script>
    <script src="dataTables/responsive/js/responsive.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#countryTable').DataTable({
                'language': {
                    'url': '/dataTables/Spanish.json'
                },
                'lengthMenu': [[10, 25, 50,100,-1], [10, 25, 50,100, 'Todos']],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print',
                    'colvis'
                ],
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
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
    </script>

</html>