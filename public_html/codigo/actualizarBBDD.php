<?php
//require_once ('../dompdf/dompdf_config.inc.php');
header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

extract($_POST); 

$sql= "DELETE FROM pruebas_bbdd";
mysqli_query($link, $sql);

$file = $_FILES['CSVdoc']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
{
	$part_number = $filesop[0];
	$title = $filesop[1];
	$sp_title = $filesop[2];
	$gbp = $filesop[3];

	$sql= "INSERT INTO pruebas_bbdd (part_number, title, sp_title, gbp) VALUES ('$part_number', '$title', '$sp_title', '$gbp')";
	mysqli_query($link, $sql);
}


?>
<script language="javascript">
    window.location='http://admin.nietogranturismo.com/';
</script> 
