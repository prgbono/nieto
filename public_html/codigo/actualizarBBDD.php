<?php
//require_once ('../dompdf/dompdf_config.inc.php');
header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

extract($_POST); 

//echo $_FILES['CSVdoc']['tmp_name'];
//echo $_FILES['CSVdoc']['name'];
//echo $_FILES['CSVdoc']['size'];

$file = $_FILES['CSVdoc']['tmp_name'];
$handle = fopen($file, "r");
$c = 0;
while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
{
	$part_number = $filesop[1];
	$title = $filesop[2];
	$sp_title = $filesop[3];
	$gbp = $filesop[4];

	//$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
	$sql= "DELETE FROM bbdd";
	mysqli_query($link, $sql);
	$sql= "INSERT INTO bbdd (part_number, title, sp_title, gbp) VALUES ('$partNumber', '$title', '$titulo', '$gbp')";
	mysqli_query($link, $sql);
}

if($sql){
	echo "OK";
}else{
	echo "KO";
}
?>