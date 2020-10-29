<?php
/**Archivo de Conexiona a la Base de Datos  */
include 'conexion.php';

/**Recibimos lo Valores de DataTable */
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowPerPage = $_POST['length']; // Registros por Pagina
$columnIndex = $_POST['order'][0]['column']; // Índice de columna
$columnName = $_POST['columns'][$columnIndex]['data']; // Nombre de la Columna
$columnSortOrder = $_POST['order'][0]['dir']; // ASC o DESC
$searchValue = mysqli_real_escape_string($conexion,$_POST['search']['value']); // Valor Buscado

/**Si no esta Vació el Valor a Buscar */
$searchQuery="";
if(!empty($searchValue)){
/**Consulta per Buscar los Valores */
   $searchQuery = " AND (Code LIKE '%".$searchValue."%'  OR Name LIKE '%{$searchValue}%' OR Continent LIKE '%{$searchValue}%' OR Region LIKE '%{$searchValue}%' OR Population LIKE '%{$searchValue}%' OR LifeExpectancy LIKE '%{$searchValue}%' OR Capital LIKE '%{$searchValue}%')";
}

/** Número total de registros sin filtrar */
$countQuery = mysqli_query($conexion,"SELECT COUNT(*) AS total_registros FROM country");
$result = mysqli_fetch_assoc($countQuery);
$totalRegistros = $result['total_registros'];

/**Número total de registros con filtro */
$countQueryFilter = mysqli_query($conexion,"SELECT COUNT(*) as total_registros FROM country WHERE 1 ".$searchQuery);
$result = mysqli_fetch_assoc($countQueryFilter);
$totalRegistrosFiltrado = $result['total_registros'];
/**Comprobamos si es -1 es decir mostramos todos */
$limit = ($rowPerPage==-1) ? "" :"LIMIT {$row}, {$rowPerPage}";
/**Obtenemos todos los Registros */
$countryQuery = "SELECT * FROM country WHERE 1 {$searchQuery} ORDER BY {$columnName} {$columnSortOrder} {$limit}";
$countryResult = mysqli_query($conexion, $countryQuery);

/**Array para los Resultados */
$data = array();


/**Armamos los Resultados */
while ($row = mysqli_fetch_assoc($countryResult)) {
   $data[] = array( 
      "Code"=>$row['Code'],
      "Name"=>$row['Name'],
      "Continent"=>$row['Continent'],
      "Region"=>$row['Region'],
      "Population"=>$row['Population'],
      "LifeExpectancy"=>$row['LifeExpectancy'],
      "Capital"=>$row['Capital']
   );
}

/**Armamos el response para el Ajax */
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRegistros,
  "iTotalDisplayRecords" => $totalRegistrosFiltrado,
  "aaData" => $data
);

echo json_encode($response);
?>