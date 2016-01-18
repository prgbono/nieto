<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//Obtener la id del user que nos envía jquery
//extract($_REQUEST);
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : NULL; 
        
$cochesCli="select * from pruebas_coches WHERE id_cliente = $cliente";
//$cochesCli="select * from pruebas_coches WHERE id_cliente = '707'";

//Ejecutamos
$result = mysqli_query($link, $cochesCli);

//JSON
$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");
//echo '{"Coches":'.json_encode(array_map('utf8_encode',$output)).'}';
echo '{"Coches":'.json_encode($output).'}';



    

