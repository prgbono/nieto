<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//Obtener la id del user que nos envía jquery
//extract($_REQUEST);
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : NULL; 
        
//$dirCli="select * from pruebas_direcciones WHERE id_cliente = $cliente";
$dirCli="select * from pruebas_direcciones WHERE id_cliente = '701'";

//Ejecutamos
$result = mysqli_query($link, $dirCli);

//JSON
$output= array();
while ($fila = mysqli_fetch_assoc($result)){
    $output[]=array_map('utf8_encode', $fila);
}

//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");
//echo '{"Coches":'.json_encode(array_map('utf8_encode',$output)).'}';
echo '{"Direcciones":'.json_encode($output).'}';

