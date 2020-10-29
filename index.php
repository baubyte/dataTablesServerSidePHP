<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables PHP</title>
    <!-- Archivos CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="dataTables/dataTables/css/dataTables.bootstrap4.css">
    <!-- Archivos para Incluir -->
</head>

<body class="container-fluid">
    <h1>DataTables PHP</h1>
    <table id="countryTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
    <script src="dataTables/dataTables/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#countryTable').DataTable({
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