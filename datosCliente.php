<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//Obtener la id del user que nos envía jquery
//extract($_REQUEST);
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : NULL; 
        
//sql
//$datosCli="select * from pruebas_clientes WHERE id_cliente = $cliente";
$datosCli="SELECT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad, pruebas_coches.modelo, pruebas_coches.bastidor, pruebas_coches.anio FROM pruebas_clientes INNER JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente AND pruebas_clientes.id_cliente = '349'";
//$datosCli="select * from pruebas_clientes WHERE id_cliente = '635'";

//$cochesCli="select * from pruebas_coches WHERE id_cliente = $cliente";
//$cochesCli="select * from pruebas_coches WHERE id_cliente = '635'";

//$dirCli="select * from pruebas_direcciones WHERE id_cliente = $cliente";
//$dirCli="select * from pruebas_direcciones WHERE id_cliente = '635'";

//ejecutamos
$result = mysqli_query($link, $datosCli);
$fila= mysqli_fetch_assoc($result);

/*$result1 = mysqli_query($link, $cochesCli);
$fila1= mysqli_fetch_assoc($result1);

$result2 = mysqli_query($link, $dirCli);
$fila2= mysqli_fetch_assoc($result2);

*/

//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo json_encode(array_map('utf8_encode',$fila));




